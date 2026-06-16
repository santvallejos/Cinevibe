<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShowTime extends Model
{
    use HasFactory;

    protected $table = 'showtimes';

    protected $fillable = ['datetime', 'theater_id', 'movie_id'];

    protected $casts = [
        'datetime' => 'datetime',
    ];

    /**
     * Un ShowTime pertenece a una sala.
     */
    public function theater()
    {
        return $this->belongsTo(Theater::class, 'theater_id');
    }

    /**
     * Un ShowTime pertenece a una película.
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }

    /**
     * Un ShowTime tiene muchos tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'showtime_id');
    }
}
