<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = [
        'user_id',
        'funcion_id',
        'asiento',
        'precio',
        'estado',
        'codigo_qr',
        'metodo_pago',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
    ];

    // -------------------------------------------------------
    // RELACIONES
    // -------------------------------------------------------

    /** La entrada pertenece a un usuario (cliente) */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** La entrada pertenece a una función */
    public function funcion()
    {
        return $this->belongsTo(Funcion::class);
    }

    // -------------------------------------------------------
    // SCOPES
    // -------------------------------------------------------

    /** Entradas confirmadas */
    public function scopeConfirmadas($query)
    {
        return $query->where('estado', 'confirmado');
    }

    /** Entradas pendientes */
    public function scopePendientes($query)
    {
        return $query->where('estado', 'pendiente');
    }

    /** Entradas canceladas */
    public function scopeCanceladas($query)
    {
        return $query->where('estado', 'cancelado');
    }
}