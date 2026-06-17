<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Theater extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    /**
     * Una sala tiene muchos horarios/funciones.
     */
    public function showtimes()
    {
        return $this->hasMany(ShowTime::class, 'theater_id');
    }

    /**
     * Una sala tiene muchos asientos/butacas físicas.
     */
    public function seats()
    {
        return $this->hasMany(Seat::class, 'theater_id');
    }
}
