<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'state', 'description', 'duration', 'category',
        'datepremire', 'image_url', 'trailer_url', 'showtime_id',
    ];

    protected $casts = [
        'datepremire' => 'date',
    ];

    /**
     * Una película tiene muchos horarios.
     */
    public function showtimes()
    {
        return $this->hasMany(ShowTime::class, 'movie_id');
    }

    /**
     * Showtime "principal" referenciado directamente en el modelo.
     */
    public function showtime()
    {
        return $this->belongsTo(ShowTime::class, 'showtime_id');
    }

    /**
     * Una película tiene muchos tickets.
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'pelicula_id');
    }
}
