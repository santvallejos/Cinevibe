<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\TemporaryReservation;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SeatApiController extends Controller
{
    /** Duración del bloqueo temporal en minutos. */
    const RESERVATION_MINUTES = 10;

    /**
     * GET /api/seats/status
     *
     * Retorna estado de todas las butacas para un showtime dado:
     *  - "occupied": tickets confirmados en BD
     *  - "reserved": reservas temporales activas de OTROS usuarios
     *  - "mine": reservas activas del usuario actual (para restaurar selección)
     */
    public function status(Request $request): JsonResponse
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
        ]);

        $showtimeId = $request->showtime_id;
        $userId     = Auth::id();

        // Limpiar reservas expiradas antes de retornar estado
        TemporaryReservation::expired()->delete();

        $occupied = Ticket::where('showtime_id', $showtimeId)
            ->pluck('amchair')
            ->toArray();

        $reservations = TemporaryReservation::where('showtime_id', $showtimeId)
            ->active()
            ->get(['user_id', 'amchair', 'expires_at']);

        $reserved = $reservations->where('user_id', '!=', $userId)->pluck('amchair')->toArray();
        $mine     = $reservations->where('user_id', $userId)->map(fn($r) => [
            'amchair'    => $r->amchair,
            'expires_at' => $r->expires_at->toIso8601String(),
        ])->values()->toArray();

        return response()->json([
            'occupied' => $occupied,
            'reserved' => $reserved,
            'mine'     => $mine,
        ]);
    }

    /**
     * POST /api/seats/reserve
     *
     * Bloquea una butaca temporalmente para el usuario autenticado.
     * Valida en DB que no esté vendida ni reservada por otro usuario.
     * Usa transacción + lock pesimista (lockForUpdate) para evitar race conditions.
     */
    public function reserve(Request $request): JsonResponse
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchair'     => 'required|string|max:10',
        ]);

        $showtimeId = $request->showtime_id;
        $amchair    = strtoupper(trim($request->amchair));
        $userId     = Auth::id();

        try {
            $result = DB::transaction(function () use ($showtimeId, $amchair, $userId) {
                // Verificar que no existe ticket confirmado para esta butaca
                $alreadySold = Ticket::where('showtime_id', $showtimeId)
                    ->where('amchair', $amchair)
                    ->exists();

                if ($alreadySold) {
                    return ['success' => false, 'message' => 'Este asiento ya fue vendido.'];
                }

                // Buscar reserva existente con lock pesimista para evitar condiciones de carrera
                $existingReservation = TemporaryReservation::where('showtime_id', $showtimeId)
                    ->where('amchair', $amchair)
                    ->lockForUpdate()
                    ->first();

                if ($existingReservation) {
                    // Si la reserva expiró, se puede tomar
                    if ($existingReservation->expires_at->isPast()) {
                        $existingReservation->update([
                            'user_id'    => $userId,
                            'expires_at' => now()->addMinutes(self::RESERVATION_MINUTES),
                        ]);

                        return [
                            'success'    => true,
                            'expires_at' => now()->addMinutes(self::RESERVATION_MINUTES)->toIso8601String(),
                        ];
                    }

                    // Si la reserva es del mismo usuario, renovar tiempo
                    if ($existingReservation->user_id === $userId) {
                        $existingReservation->update([
                            'expires_at' => now()->addMinutes(self::RESERVATION_MINUTES),
                        ]);

                        return [
                            'success'    => true,
                            'expires_at' => now()->addMinutes(self::RESERVATION_MINUTES)->toIso8601String(),
                        ];
                    }

                    // Reservada por otro usuario activamente
                    return ['success' => false, 'message' => 'Este asiento ya está siendo reservado por otro usuario.'];
                }

                // Crear reserva nueva
                $reservation = TemporaryReservation::create([
                    'showtime_id' => $showtimeId,
                    'user_id'     => $userId,
                    'amchair'     => $amchair,
                    'expires_at'  => now()->addMinutes(self::RESERVATION_MINUTES),
                ]);

                return [
                    'success'    => true,
                    'expires_at' => $reservation->expires_at->toIso8601String(),
                ];
            });

            if ($result['success']) {
                return response()->json($result, 200);
            }

            return response()->json(['message' => $result['message']], 409);

        } catch (\Throwable $e) {
            return response()->json(['message' => 'Error al procesar la reserva.'], 500);
        }
    }

    /**
     * POST /api/seats/release
     *
     * Libera una butaca reservada temporalmente por el usuario autenticado.
     * Solo puede liberar sus propias reservas.
     */
    public function release(Request $request): JsonResponse
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
            'amchair'     => 'required|string|max:10',
        ]);

        $showtimeId = $request->showtime_id;
        $amchair    = strtoupper(trim($request->amchair));
        $userId     = Auth::id();

        TemporaryReservation::where('showtime_id', $showtimeId)
            ->where('amchair', $amchair)
            ->where('user_id', $userId)
            ->delete();

        return response()->json(['success' => true]);
    }

    /**
     * POST /api/seats/release-all
     *
     * Libera todas las reservas activas del usuario para un showtime dado.
     * Útil si el usuario navega fuera de la página de selección.
     */
    public function releaseAll(Request $request): JsonResponse
    {
        $request->validate([
            'showtime_id' => 'required|exists:showtimes,id',
        ]);

        TemporaryReservation::where('showtime_id', $request->showtime_id)
            ->where('user_id', Auth::id())
            ->delete();

        return response()->json(['success' => true]);
    }
}
