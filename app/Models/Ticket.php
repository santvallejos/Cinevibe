<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Ticket extends Model
{
    use HasFactory, HasUuids;

    // PK es UUID (guid), no auto-increment
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id', 'pelicula_id', 'showtime_id', 'theater_id',
        'price', 'amchair', 'date', 'movie',
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
     * Ticket puede estar en una línea de venta (retail_sale).
     */
    public function retailSale()
    {
        return $this->hasOne(RetailSale::class, 'ticket_id');
    }
}
