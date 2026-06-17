<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Seat extends Model
{
    use HasFactory;

    protected $fillable = [
        'theater_id',
        'row_letter',
        'seat_number',
        'is_premium',
        'is_active'
    ];

    protected $casts = [
        'is_premium' => 'boolean',
        'is_active' => 'boolean',
        'seat_number' => 'integer',
    ];

    /**
     * Un asiento pertenece a una sala (theater).
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    /**
     * Un asiento tiene muchos tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'seat_id');
    }



    /**
     * Accesor para obtener el código del asiento (ej: "A1", "C5").
     */
    public function getCodeAttribute(): string
    {
        return $this->row_letter . $this->seat_number;
    }
}
