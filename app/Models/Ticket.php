<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'pelicula_id', 'showtime_id', 'theater_id', 'seat_id',
        'price', 'amchair', 'date', 'movie', 'retail_sale_id',
    ];

    protected $casts = [
        'date' => 'datetime',
        'price' => 'double',
    ];

    /**
     * Ticket pertenece a una película.
     */
    public function pelicula()
    {
        return $this->belongsTo(Movie::class, 'pelicula_id');
    }

    /**
     * Ticket pertenece a un showtime.
     */
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'showtime_id');
    }

    /**
     * Ticket pertenece a una sala.
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    /**
     * Ticket pertenece a una butaca física específica.
     */
    public function seat()
    {
        return $this->belongsTo(Seat::class, 'seat_id');
    }

    /**
     * Ticket pertenece a una línea de venta (retail_sale).
     */
    public function retailSale()
    {
        return $this->belongsTo(RetailSale::class, 'retail_sale_id');
    }
}
