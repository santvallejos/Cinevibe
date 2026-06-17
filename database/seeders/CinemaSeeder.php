<?php

namespace Database\Seeders;

use App\Models\Theater;
use App\Models\Movie;
use App\Models\ShowTime;
use App\Models\Seat;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
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

        // --- Asientos de las Salas ---
        // Sala 1 - VIP (5 filas, 8 asientos por fila = 40 asientos)
        $vipRows = ['A', 'B', 'C', 'D', 'E'];
        foreach ($vipRows as $row) {
            for ($num = 1; $num <= 8; $num++) {
                Seat::create([
                    'theater_id'  => $sala1->id,
                    'row_letter'  => $row,
                    'seat_number' => $num,
                    'is_premium'  => true,
                    'is_active'   => true,
                ]);
            }
        }

        // Sala 2 - Standard (8 filas, 12 asientos por fila = 96 asientos)
        $standardRows = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H'];
        foreach ($standardRows as $row) {
            for ($num = 1; $num <= 12; $num++) {
                Seat::create([
                    'theater_id'  => $sala2->id,
                    'row_letter'  => $row,
                    'seat_number' => $num,
                    'is_premium'  => false,
                    'is_active'   => true,
                ]);
            }
        }

        // Sala 3 - 3D (8 filas, 12 asientos por fila = 96 asientos)
        foreach ($standardRows as $row) {
            for ($num = 1; $num <= 12; $num++) {
                Seat::create([
                    'theater_id'  => $sala3->id,
                    'row_letter'  => $row,
                    'seat_number' => $num,
                    'is_premium'  => false,
                    'is_active'   => true,
                ]);
            }
        }

        // --- Películas ---
        $movie1 = Movie::create([
            'name'        => 'EL DIABLO VISTE A LA MODA 2',
            'state'       => 'Estreno',
            'description' => 'Casi veinte años después de dar vida a los icónicos personajes Miranda, Andy, Emily y Nigel, Meryl Streep, Anne Hathaway, Emily Blunt y Stanley Tucci regresan a las elegantes calles de Nueva York y a las sofisticadas oficinas de la revista Runway en la esperada secuela del fenómeno de 2006 que marcó a toda una generación. La película reúne al reparto principal original con el director David Frankel y la guionista Aline Brosh McKenna, e introduce una nueva pasarela de personajes interpretados por Kenneth Branagh, Simone Ashley, Justin Theroux, Lucy Liu, Patrick Brammall, Caleb Hearon, Helen J. Shen, Pauline Chalamet, B.J. Novak y Conrad Ricamora. Tracie Thoms y Tibor Feldman también retoman sus papeles como “Lily” e “Irv” de la primera película.',
            'duration'    => '2h',
            'category'    => 'Comedia',
            'datepremire' => '2026-04-30',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00011675.jpg?updatedAt=1780686291704',
            'trailer_url' => 'https://youtu.be/aXdjJbVrJeg?si=hRu7dlEOr54i30A1',
        ]);

        $movie2 = Movie::create([
            'name'        => 'BACKROOMS',
            'state'       => 'Estreno',
            'description' => 'Surgieron como una leyenda urbana en foros de internet: un espacio infinito de oficinas vacías al que podrías caer si, por accidente, “te sales de la realidad”. Un lugar sin reglas claras, sin salida evidente, donde el tiempo y la lógica dejan de funcionar. Lo que empezó como creepypasta evolucionó en un fenómeno global impulsado por videos virales, narrativas de analog horror y comunidades enteras obsesionadas con sus niveles, criaturas y ocultas teorías.',
            'duration'    => '1h 50m',
            'category'    => 'Terror',
            'datepremire' => '2026-05-28',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012193.jpg?updatedAt=1780686290856',
            'trailer_url' => 'https://youtu.be/j6xBUJSm_S8?si=XXy9pKbT3b8BVoX0',
        ]);

        $movie3 = Movie::create([
            'name'        => 'SCARY MOVIE TERRORÍFICAMENTE INCORRECTA',
            'state'       => 'Estreno',
            'description' => 'Veintiséis años después de escapar de un asesino enmascarado sospechosamente familiar ("Ghostface"), los Cuatro del Núcleo están de vuelta en la mira del asesino y ninguna propiedad intelectual del cine de terror está a salvo. Marlon Wayans ("Shorty"), Shawn Wayans ("Ray"), Anna Faris ("Cindy") y Regina Hall ("Brenda") se reúnen en Scary Movie junto a los favoritos que regresan y caras nuevas para abrirse paso a través de reinicios, remakes, secuelas, precuelas, secuelas, spin-offs, terror elevado, historias de origen, cualquier cosa que tenga la palabra legado en ella, y cada "capítulo final" que no sea absolutamente definitivo. Nada es sagrado. Ningún tropo sobrevive. Cada línea se cruza. Los Wayans están de vuelta para cancelar la Cultura de la Cancelación.',
            'duration'    => '1h 35m',
            'category'    => 'Comedia/Terror',
            'datepremire' => '2026-06-04',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012371.jpg?updatedAt=1780686291677',
            'trailer_url' => 'https://youtu.be/HMTKiPCKgpw?si=SQTcEMSHffWOfmey',
        ]);

        $movie4 = Movie::create([
            'name'        => 'OBSESIÓN',
            'state'       => 'Estreno',
            'description' => 'El anhelo romántico desesperado de un chico por su amor platónico de toda la vida desencadena un siniestro hechizo: Niki se vuelve irracionalmente obsesiva hasta convertirse en la sombra de Bear. Una fantasía aparentemente inofensiva que se convertirá en una perturbadora pesadilla. Potente metáfora sobre la cosificación de las relaciones románticas y de los límites a los que estamos dispuestos a llegar movidos por el deseo de ser correspondidos.',
            'duration'    => '1h 48m',
            'category'    => 'Thriller',
            'datepremire' => '2026-05-14',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012194.jpg',
            'trailer_url' => 'https://youtu.be/ub_xgY87z7g?si=w4mUvf76XizjjnB4',
        ]);

        $movie5 = Movie::create([
            'name'        => 'THE MANDALORIAN AND GROGU',
            'state'       => 'Estreno',
            'description' => 'El cruel Imperio ha caído, pero los señores de la guerra imperiales siguen dispersos por toda la Galaxia. La incipiente Nueva República trabaja para proteger las conquistas de la Rebelión con la ayuda del legendario cazarrecompensas mandaloriano, Din Djarin (Pedro Pascal), y su joven aprendiz, Grogu.',
            'duration'    => '2h 12m',
            'category'    => 'Ciencia Ficción/Aventuras',
            'datepremire' => '2026-05-21',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012218.jpg?updatedAt=1780686291501',
            'trailer_url' => 'https://youtu.be/Zu46yZrGVhQ?si=s-YTFbpUuawtvXE_',
        ]);

        $movie6 = Movie::create([
            'name'        => 'MINIONS & MONSTRUOS',
            'state'       => 'Proximamente',
            'description' => 'Esta es la historia desenfrenada, ridícula y totalmente real de cómo los Minions conquistaron Hollywood, se convirtieron en estrellas de cine, perdieron todo, desataron monstruos sobre el mundo y luego unieron fuerzas para intentar salvar al planeta del caos que ellos mismos crearon.',
            'duration'    => '1h 30m',
            'category'    => 'Animación/Aventuras',
            'datepremire' => '2026-07-01',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012477.jpg?updatedAt=1780878120171',
            'trailer_url' => 'https://youtu.be/KG9wqUZYrMo?si=RE58jXZ3naHmHZMn',
        ]);

        $movie7 = Movie::create([
            'name'        => 'LA ODISEA',
            'state'       => 'Proximamente',
            'description' => 'Una epopeya mitológica que sigue la historia de Odiseo y su largo viaje a casa, de 10 años de duración, tras la guerra de Troya.',
            'duration'    => '2h 52m',
            'category'    => 'Aventuras',
            'datepremire' => '2026-07-16',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012195.jpg?updatedAt=1780878119971',
            'trailer_url' => 'https://youtu.be/kx3pmGx24Tg?si=JmBwbCcvkJKI6dS0',
        ]);

        $movie8 = Movie::create([
            'name'        => 'SPIDER-MAN: UN NUEVO DÍA',
            'state'       => 'Proximamente',
            'description' => 'Tras el éxito mundial sin precedentes de Spider-Man: Sin regreso a casa, Spider-Man: Un nuevo día marca un capítulo completamente nuevo para Peter Parker y Spider-Man. Han pasado cuatro años desde los acontecimientos de Sin regreso a casa, y Peter ahora es un adulto que vive completamente solo, habiéndose borrado voluntariamente de la vida y los recuerdos de sus seres queridos. Combatiendo el crimen en una Nueva York que ya no lo conoce, se ha dedicado por completo a proteger su ciudad —un Spider-Man a tiempo completo—, pero a medida que las exigencias se intensifican, la presión desencadena una sorprendente evolución física que amenaza su existencia, al tiempo que un nuevo y extraño patrón de crímenes da lugar a una de las amenazas más poderosas a las que se ha enfrentado jamás.',
            'duration'    => '2h 30m',
            'category'    => 'Aventuras/Acción',
            'datepremire' => '2026-07-30',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012196.jpg?updatedAt=1780878120492',
            'trailer_url' => 'https://youtu.be/Pw1X-57Ms-8?si=Bw0kz0MFdPqbdkRW',
        ]);

        $movie9 = Movie::create([
            'name'        => 'MOANA (2026)',
            'state'       => 'Proximamente',
            'description' => 'Vaiana (Catherine Lagaʻaia) responde a la llamada del océano y, por primera vez, viaja más allá del arrecife de su isla de Motunui con el semidiós Maui (Dwayne Johnson) en un viaje inolvidable para devolver la prosperidad a su pueblo.',
            'duration'    => '2h',
            'category'    => 'Aventuras/Familia',
            'datepremire' => '2026-07-09',
            'image_url'   => 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012233.jpg?updatedAt=1780878120148',
            'trailer_url' => 'https://youtu.be/u3ZqySuR-Z0?si=SFJ0AJJvN259FcAC',
        ]);

        // --- ShowTimes (funciones) ---
        // Movie 1: EL DIABLO VISTE A LA MODA 2
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
            'datetime'   => now()->addDays(2)->setTime(16, 0),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie1->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(2)->setTime(21, 0),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie1->id,
        ]);

        // Movie 2: BACKROOMS
        ShowTime::create([
            'datetime'   => now()->addDays(2)->setTime(20, 30),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie2->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(1)->setTime(22, 0),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie2->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(3)->setTime(19, 30),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie2->id,
        ]);

        // Movie 3: SCARY MOVIE TERRORÍFICAMENTE INCORRECTA
        ShowTime::create([
            'datetime'   => now()->addDays(3)->setTime(16, 0),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie3->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(2)->setTime(18, 30),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie3->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(4)->setTime(20, 0),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie3->id,
        ]);

        // Movie 4: OBSESIÓN
        ShowTime::create([
            'datetime'   => now()->addDays(1)->setTime(20, 0),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie4->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(3)->setTime(22, 30),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie4->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(4)->setTime(15, 30),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie4->id,
        ]);

        // Movie 5: THE MANDALORIAN AND GROGU
        ShowTime::create([
            'datetime'   => now()->addDays(2)->setTime(14, 0),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie5->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(3)->setTime(17, 30),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie5->id,
        ]);

        ShowTime::create([
            'datetime'   => now()->addDays(4)->setTime(18, 0),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie5->id,
        ]);

        // Movie 6: MINIONS & MONSTRUOS
        ShowTime::create([
            'datetime'   => now()->addDays(5)->setTime(15, 0),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie6->id,
        ]);

        // Movie 7: LA ODISEA
        ShowTime::create([
            'datetime'   => now()->addDays(5)->setTime(19, 0),
            'theater_id' => $sala2->id,
            'movie_id'   => $movie7->id,
        ]);

        // Movie 8: SPIDER-MAN: UN NUEVO DÍA
        ShowTime::create([
            'datetime'   => now()->addDays(6)->setTime(21, 30),
            'theater_id' => $sala3->id,
            'movie_id'   => $movie8->id,
        ]);

        // Movie 9: MOANA (2026)
        ShowTime::create([
            'datetime'   => now()->addDays(6)->setTime(16, 30),
            'theater_id' => $sala1->id,
            'movie_id'   => $movie9->id,
        ]);
    }
}
