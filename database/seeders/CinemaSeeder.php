<?php

namespace Database\Seeders;

use App\Models\Theater;
use App\Models\Movie;
use App\Models\ShowTime;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Siembra salas, películas y funciones de ejemplo para desarrollo.
     */
    public function run(): void
    {
        // --- Salas ---
        $sala1 = Theater::create([
            'name'        => 'Sala 1 - VIP',
            'description' => 'Sala con butacas premium y sonido Dolby Atmos.',
            'price'       => '2500',
        ]);

        $sala2 = Theater::create([
            'name'        => 'Sala 2 - Standard',
            'description' => 'Sala estándar con gran pantalla.',
            'price'       => '1800',
        ]);

        $sala3 = Theater::create([
            'name'        => 'Sala 3 - 3D',
            'description' => 'Sala equipada con tecnología 3D.',
            'price'       => '2200',
        ]);

        // --- Películas ---
        $movie1 = Movie::create([
            'name'        => 'El Diablo',
            'description' => 'Un thriller de acción sin precedentes.',
            'duration'    => '2h 10min',
            'category'    => 'Acción',
            'datepremire' => '2026-06-01',
            'image_url'   => null,
            'trailer_url' => null,
        ]);

        $movie2 = Movie::create([
            'name'        => 'Mortal Kombat',
            'description' => 'La batalla de los campeones del mundo.',
            'duration'    => '1h 50min',
            'category'    => 'Acción/Fantasía',
            'datepremire' => '2026-05-15',
            'image_url'   => null,
            'trailer_url' => null,
        ]);

        $movie3 = Movie::create([
            'name'        => 'El Mago del Kremlin',
            'description' => 'Drama político de intriga internacional.',
            'duration'    => '2h 30min',
            'category'    => 'Drama',
            'datepremire' => '2026-06-10',
            'image_url'   => null,
            'trailer_url' => null,
        ]);

        // --- ShowTimes (funciones) ---
        ShowTime::create([
            'datetime'   => now()->addDays(1)->setTime(14, 30),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie1->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(1)->setTime(18, 0),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie1->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(2)->setTime(20, 30),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie2->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(3)->setTime(16, 0),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie3->id,
        ]);
    }
}
