<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TemporaryReservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'showtime_id',
        'user_id',
        'amchair',
        'expires_at',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
    ];

    /**
     * Pertenece a una función.
     */
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'showtime_id');
    }

    /**
     * Pertenece al usuario que hizo la reserva.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * Solo reservas activas (no expiradas).
     */
    public function scopeActive($query)
    {
        return $query->where('expires_at', '>', now());
    }

    /**
     * Reservas expiradas, para limpieza.
     */
    public function scopeExpired($query)
    {
        return $query->where('expires_at', '<=', now());
    }
}
