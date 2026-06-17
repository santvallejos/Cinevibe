-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-06-2026 a las 00:44:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo16`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `name`, `email`, `subject`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 'vallejos santiago', 'vallejossantiago1412@gmail.com', 'Entradas y Reservas', 'sadasp´dasd.pádmop', 1, '2026-06-17 21:37:42', '2026-06-18 00:37:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headboard_sales`
--

CREATE TABLE `headboard_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `retail_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `state` varchar(255) NOT NULL DEFAULT 'pending',
  `total` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `headboard_sales`
--

INSERT INTO `headboard_sales` (`id`, `user_id`, `retail_sale_id`, `state`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'confirmed', 2500, '2026-06-17 21:42:19', '2026-06-17 21:42:21'),
(2, 1, NULL, 'confirmed', 2500, '2026-06-17 22:07:10', '2026-06-17 22:07:10'),
(3, 1, NULL, 'confirmed', 5400, '2026-06-18 01:36:54', '2026-06-18 01:36:54'),
(4, 1, NULL, 'confirmed', 5000, '2026-06-18 01:39:08', '2026-06-18 01:39:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_05_14_235558_create_roles_table', 1),
(4, '2026_05_14_235709_create_users_table', 1),
(5, '2026_05_29_011341_create_sessions_table', 1),
(6, '2026_06_05_000001_add_sale_id_to_users_table', 1),
(7, '2026_06_05_000002_create_theaters_table', 1),
(8, '2026_06_05_000002_z_create_seats_table', 1),
(9, '2026_06_05_000003_create_movies_table', 1),
(10, '2026_06_05_000004_create_showtimes_table', 1),
(11, '2026_06_05_000005_create_tickets_table', 1),
(12, '2026_06_05_000006_create_retail_sales_table', 1),
(13, '2026_06_05_000007_create_headboard_sales_table', 1),
(14, '2026_06_13_000001_add_retail_sale_id_to_tickets_table', 1),
(15, '2026_06_15_000001_alter_sales_tables_for_multiple_details', 1),
(16, '2026_06_16_000001_create_temporary_reservations_table', 1),
(17, '2026_06_17_000001_create_contact_messages_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `datepremire` date NOT NULL,
  `image_url` varchar(255) DEFAULT NULL,
  `trailer_url` varchar(255) DEFAULT NULL,
  `showtime_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `name`, `state`, `description`, `duration`, `category`, `datepremire`, `image_url`, `trailer_url`, `showtime_id`, `created_at`, `updated_at`) VALUES
(1, 'EL DIABLO VISTE A LA MODA 2', 'Estreno', 'Casi veinte años después de dar vida a los icónicos personajes Miranda, Andy, Emily y Nigel, Meryl Streep, Anne Hathaway, Emily Blunt y Stanley Tucci regresan a las elegantes calles de Nueva York y a las sofisticadas oficinas de la revista Runway en la esperada secuela del fenómeno de 2006 que marcó a toda una generación. La película reúne al reparto principal original con el director David Frankel y la guionista Aline Brosh McKenna, e introduce una nueva pasarela de personajes interpretados por Kenneth Branagh, Simone Ashley, Justin Theroux, Lucy Liu, Patrick Brammall, Caleb Hearon, Helen J. Shen, Pauline Chalamet, B.J. Novak y Conrad Ricamora. Tracie Thoms y Tibor Feldman también retoman sus papeles como “Lily” e “Irv” de la primera película.', '2h', 'Comedia', '2026-04-30', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00011675.jpg?updatedAt=1780686291704', 'https://youtu.be/aXdjJbVrJeg?si=hRu7dlEOr54i30A1', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(2, 'BACKROOMS', 'Estreno', 'Surgieron como una leyenda urbana en foros de internet: un espacio infinito de oficinas vacías al que podrías caer si, por accidente, “te sales de la realidad”. Un lugar sin reglas claras, sin salida evidente, donde el tiempo y la lógica dejan de funcionar. Lo que empezó como creepypasta evolucionó en un fenómeno global impulsado por videos virales, narrativas de analog horror y comunidades enteras obsesionadas con sus niveles, criaturas y ocultas teorías.', '1h 50m', 'Terror', '2026-05-28', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012193.jpg?updatedAt=1780686290856', 'https://youtu.be/j6xBUJSm_S8?si=XXy9pKbT3b8BVoX0', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(3, 'SCARY MOVIE TERRORÍFICAMENTE INCORRECTA', 'Estreno', 'Veintiséis años después de escapar de un asesino enmascarado sospechosamente familiar (\"Ghostface\"), los Cuatro del Núcleo están de vuelta en la mira del asesino y ninguna propiedad intelectual del cine de terror está a salvo. Marlon Wayans (\"Shorty\"), Shawn Wayans (\"Ray\"), Anna Faris (\"Cindy\") y Regina Hall (\"Brenda\") se reúnen en Scary Movie junto a los favoritos que regresan y caras nuevas para abrirse paso a través de reinicios, remakes, secuelas, precuelas, secuelas, spin-offs, terror elevado, historias de origen, cualquier cosa que tenga la palabra legado en ella, y cada \"capítulo final\" que no sea absolutamente definitivo. Nada es sagrado. Ningún tropo sobrevive. Cada línea se cruza. Los Wayans están de vuelta para cancelar la Cultura de la Cancelación.', '1h 35m', 'Comedia/Terror', '2026-06-04', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012371.jpg?updatedAt=1780686291677', 'https://youtu.be/HMTKiPCKgpw?si=SQTcEMSHffWOfmey', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(4, 'OBSESIÓN', 'Estreno', 'El anhelo romántico desesperado de un chico por su amor platónico de toda la vida desencadena un siniestro hechizo: Niki se vuelve irracionalmente obsesiva hasta convertirse en la sombra de Bear. Una fantasía aparentemente inofensiva que se convertirá en una perturbadora pesadilla. Potente metáfora sobre la cosificación de las relaciones románticas y de los límites a los que estamos dispuestos a llegar movidos por el deseo de ser correspondidos.', '1h 48m', 'Thriller', '2026-05-14', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012194.jpg', 'https://youtu.be/ub_xgY87z7g?si=w4mUvf76XizjjnB4', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(5, 'THE MANDALORIAN AND GROGU', 'Estreno', 'El cruel Imperio ha caído, pero los señores de la guerra imperiales siguen dispersos por toda la Galaxia. La incipiente Nueva República trabaja para proteger las conquistas de la Rebelión con la ayuda del legendario cazarrecompensas mandaloriano, Din Djarin (Pedro Pascal), y su joven aprendiz, Grogu.', '2h 12m', 'Ciencia Ficción/Aventuras', '2026-05-21', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012218.jpg?updatedAt=1780686291501', 'https://youtu.be/Zu46yZrGVhQ?si=s-YTFbpUuawtvXE_', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(6, 'MINIONS & MONSTRUOS', 'Proximamente', 'Esta es la historia desenfrenada, ridícula y totalmente real de cómo los Minions conquistaron Hollywood, se convirtieron en estrellas de cine, perdieron todo, desataron monstruos sobre el mundo y luego unieron fuerzas para intentar salvar al planeta del caos que ellos mismos crearon.', '1h 30m', 'Animación/Aventuras', '2026-07-01', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012477.jpg?updatedAt=1780878120171', 'https://youtu.be/KG9wqUZYrMo?si=RE58jXZ3naHmHZMn', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(7, 'LA ODISEA', 'Proximamente', 'Una epopeya mitológica que sigue la historia de Odiseo y su largo viaje a casa, de 10 años de duración, tras la guerra de Troya.', '2h 52m', 'Aventuras', '2026-07-16', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012195.jpg?updatedAt=1780878119971', 'https://youtu.be/kx3pmGx24Tg?si=JmBwbCcvkJKI6dS0', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(8, 'SPIDER-MAN: UN NUEVO DÍA', 'Proximamente', 'Tras el éxito mundial sin precedentes de Spider-Man: Sin regreso a casa, Spider-Man: Un nuevo día marca un capítulo completamente nuevo para Peter Parker y Spider-Man. Han pasado cuatro años desde los acontecimientos de Sin regreso a casa, y Peter ahora es un adulto que vive completamente solo, habiéndose borrado voluntariamente de la vida y los recuerdos de sus seres queridos. Combatiendo el crimen en una Nueva York que ya no lo conoce, se ha dedicado por completo a proteger su ciudad —un Spider-Man a tiempo completo—, pero a medida que las exigencias se intensifican, la presión desencadena una sorprendente evolución física que amenaza su existencia, al tiempo que un nuevo y extraño patrón de crímenes da lugar a una de las amenazas más poderosas a las que se ha enfrentado jamás.', '2h 30m', 'Aventuras/Acción', '2026-07-30', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012196.jpg?updatedAt=1780878120492', 'https://youtu.be/Pw1X-57Ms-8?si=Bw0kz0MFdPqbdkRW', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(9, 'MOANA (2026)', 'Proximamente', 'Vaiana (Catherine Lagaʻaia) responde a la llamada del océano y, por primera vez, viaja más allá del arrecife de su isla de Motunui con el semidiós Maui (Dwayne Johnson) en un viaje inolvidable para devolver la prosperidad a su pueblo.', '2h', 'Aventuras/Familia', '2026-07-09', 'https://ik.imagekit.io/o9yqquihf/Imagenes%20cinevibe%202%20entrega/HO00012233.jpg?updatedAt=1780878120148', 'https://youtu.be/u3ZqySuR-Z0?si=SFJ0AJJvN259FcAC', NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `retail_sales`
--

CREATE TABLE `retail_sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` char(36) NOT NULL,
  `price` double NOT NULL,
  `cant` int(11) NOT NULL,
  `precio_unitario` double NOT NULL,
  `subtotal` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `headboard_sale_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `retail_sales`
--

INSERT INTO `retail_sales` (`id`, `ticket_id`, `price`, `cant`, `precio_unitario`, `subtotal`, `created_at`, `updated_at`, `headboard_sale_id`) VALUES
(1, 'd5ff93c1-6a94-4835-af9f-a06206eed4aa', 2500, 1, 2500, 2500, '2026-06-17 21:42:21', '2026-06-17 21:42:21', 1),
(2, '2f21452c-2367-46a0-ac84-0cfd1398e39d', 2500, 1, 2500, 2500, '2026-06-17 22:07:10', '2026-06-17 22:07:10', 2),
(3, 'd968ae86-7616-4ea7-bf45-f616a1c9efe8', 5400, 3, 1800, 5400, '2026-06-18 01:36:54', '2026-06-18 01:36:54', 3),
(4, '4a474b0f-b5fa-4224-b28f-fd1f6edf2164', 2500, 1, 2500, 2500, '2026-06-18 01:39:08', '2026-06-18 01:39:08', 4),
(5, '7d048f80-55af-4a1a-a8f7-cb9b318afc4a', 2500, 1, 2500, 2500, '2026-06-18 01:39:08', '2026-06-18 01:39:08', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'Administrador del sistema', '2026-06-17 18:16:25', '2026-06-17 18:16:25', NULL),
(2, 'Client', 'Cliente regular', '2026-06-17 18:16:25', '2026-06-17 18:16:25', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `row_letter` varchar(2) NOT NULL,
  `seat_number` int(11) NOT NULL,
  `is_premium` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `seats`
--

INSERT INTO `seats` (`id`, `theater_id`, `row_letter`, `seat_number`, `is_premium`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 1, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(2, 1, 'A', 2, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(3, 1, 'A', 3, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(4, 1, 'A', 4, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(5, 1, 'A', 5, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(6, 1, 'A', 6, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(7, 1, 'A', 7, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(8, 1, 'A', 8, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(9, 1, 'B', 1, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(10, 1, 'B', 2, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(11, 1, 'B', 3, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(12, 1, 'B', 4, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(13, 1, 'B', 5, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(14, 1, 'B', 6, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(15, 1, 'B', 7, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(16, 1, 'B', 8, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(17, 1, 'C', 1, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(18, 1, 'C', 2, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(19, 1, 'C', 3, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(20, 1, 'C', 4, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(21, 1, 'C', 5, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(22, 1, 'C', 6, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(23, 1, 'C', 7, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(24, 1, 'C', 8, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(25, 1, 'D', 1, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(26, 1, 'D', 2, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(27, 1, 'D', 3, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(28, 1, 'D', 4, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(29, 1, 'D', 5, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(30, 1, 'D', 6, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(31, 1, 'D', 7, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(32, 1, 'D', 8, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(33, 1, 'E', 1, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(34, 1, 'E', 2, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(35, 1, 'E', 3, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(36, 1, 'E', 4, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(37, 1, 'E', 5, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(38, 1, 'E', 6, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(39, 1, 'E', 7, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(40, 1, 'E', 8, 1, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(41, 2, 'A', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(42, 2, 'A', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(43, 2, 'A', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(44, 2, 'A', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(45, 2, 'A', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(46, 2, 'A', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(47, 2, 'A', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(48, 2, 'A', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(49, 2, 'A', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(50, 2, 'A', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(51, 2, 'A', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(52, 2, 'A', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(53, 2, 'B', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(54, 2, 'B', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(55, 2, 'B', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(56, 2, 'B', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(57, 2, 'B', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(58, 2, 'B', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(59, 2, 'B', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(60, 2, 'B', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(61, 2, 'B', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(62, 2, 'B', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(63, 2, 'B', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(64, 2, 'B', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(65, 2, 'C', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(66, 2, 'C', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(67, 2, 'C', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(68, 2, 'C', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(69, 2, 'C', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(70, 2, 'C', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(71, 2, 'C', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(72, 2, 'C', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(73, 2, 'C', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(74, 2, 'C', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(75, 2, 'C', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(76, 2, 'C', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(77, 2, 'D', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(78, 2, 'D', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(79, 2, 'D', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(80, 2, 'D', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(81, 2, 'D', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(82, 2, 'D', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(83, 2, 'D', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(84, 2, 'D', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(85, 2, 'D', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(86, 2, 'D', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(87, 2, 'D', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(88, 2, 'D', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(89, 2, 'E', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(90, 2, 'E', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(91, 2, 'E', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(92, 2, 'E', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(93, 2, 'E', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(94, 2, 'E', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(95, 2, 'E', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(96, 2, 'E', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(97, 2, 'E', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(98, 2, 'E', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(99, 2, 'E', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(100, 2, 'E', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(101, 2, 'F', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(102, 2, 'F', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(103, 2, 'F', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(104, 2, 'F', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(105, 2, 'F', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(106, 2, 'F', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(107, 2, 'F', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(108, 2, 'F', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(109, 2, 'F', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(110, 2, 'F', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(111, 2, 'F', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(112, 2, 'F', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(113, 2, 'G', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(114, 2, 'G', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(115, 2, 'G', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(116, 2, 'G', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(117, 2, 'G', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(118, 2, 'G', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(119, 2, 'G', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(120, 2, 'G', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(121, 2, 'G', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(122, 2, 'G', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(123, 2, 'G', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(124, 2, 'G', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(125, 2, 'H', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(126, 2, 'H', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(127, 2, 'H', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(128, 2, 'H', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(129, 2, 'H', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(130, 2, 'H', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(131, 2, 'H', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(132, 2, 'H', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(133, 2, 'H', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(134, 2, 'H', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(135, 2, 'H', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(136, 2, 'H', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(137, 3, 'A', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(138, 3, 'A', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(139, 3, 'A', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(140, 3, 'A', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(141, 3, 'A', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(142, 3, 'A', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(143, 3, 'A', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(144, 3, 'A', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(145, 3, 'A', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(146, 3, 'A', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(147, 3, 'A', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(148, 3, 'A', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(149, 3, 'B', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(150, 3, 'B', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(151, 3, 'B', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(152, 3, 'B', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(153, 3, 'B', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(154, 3, 'B', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(155, 3, 'B', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(156, 3, 'B', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(157, 3, 'B', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(158, 3, 'B', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(159, 3, 'B', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(160, 3, 'B', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(161, 3, 'C', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(162, 3, 'C', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(163, 3, 'C', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(164, 3, 'C', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(165, 3, 'C', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(166, 3, 'C', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(167, 3, 'C', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(168, 3, 'C', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(169, 3, 'C', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(170, 3, 'C', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(171, 3, 'C', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(172, 3, 'C', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(173, 3, 'D', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(174, 3, 'D', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(175, 3, 'D', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(176, 3, 'D', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(177, 3, 'D', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(178, 3, 'D', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(179, 3, 'D', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(180, 3, 'D', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(181, 3, 'D', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(182, 3, 'D', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(183, 3, 'D', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(184, 3, 'D', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(185, 3, 'E', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(186, 3, 'E', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(187, 3, 'E', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(188, 3, 'E', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(189, 3, 'E', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(190, 3, 'E', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(191, 3, 'E', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(192, 3, 'E', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(193, 3, 'E', 9, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(194, 3, 'E', 10, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(195, 3, 'E', 11, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(196, 3, 'E', 12, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(197, 3, 'F', 1, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(198, 3, 'F', 2, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(199, 3, 'F', 3, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(200, 3, 'F', 4, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(201, 3, 'F', 5, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(202, 3, 'F', 6, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(203, 3, 'F', 7, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(204, 3, 'F', 8, 0, 1, '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(205, 3, 'F', 9, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(206, 3, 'F', 10, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(207, 3, 'F', 11, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(208, 3, 'F', 12, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(209, 3, 'G', 1, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(210, 3, 'G', 2, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(211, 3, 'G', 3, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(212, 3, 'G', 4, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(213, 3, 'G', 5, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(214, 3, 'G', 6, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(215, 3, 'G', 7, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(216, 3, 'G', 8, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(217, 3, 'G', 9, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(218, 3, 'G', 10, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(219, 3, 'G', 11, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(220, 3, 'G', 12, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(221, 3, 'H', 1, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(222, 3, 'H', 2, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(223, 3, 'H', 3, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(224, 3, 'H', 4, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(225, 3, 'H', 5, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(226, 3, 'H', 6, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(227, 3, 'H', 7, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(228, 3, 'H', 8, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(229, 3, 'H', 9, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(230, 3, 'H', 10, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(231, 3, 'H', 11, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(232, 3, 'H', 12, 0, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('19BGSNzhyfRRZ3iuWeZY0M3BN8mGutwRf97Rleh4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQlZZTGp3S2xMdENUTkV0WDl5cDVLV2x6akZGQlFDU0dZajNkZHluaiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9jaW5ldmliZS50ZXN0Lz9oZXJkPXByZXZpZXciO3M6NToicm91dGUiO3M6NToiaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1781723927),
('F9aBspvsf2rx8hSyv3ydabtYDcpQlW76RtTEdPgp', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiN0NzcWFRSHFSb1ZqS0pzTnFZUHdtSmpQdVBzWkRjbkhvUGtiZzFPTiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9wdXJjaGFzZS9yZWNlaXB0LzQiO3M6NToicm91dGUiO3M6MTQ6InB1cmNoYXNlcy5zaG93Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1781736078),
('LOIfVe3VvlZvNV4DEN16en31l5KD9Lb09JN4ga3a', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNEdRV2MzT3I1cHJzall2bUJaOUNXcWpkNFY0SnZ2RW9pVGxiREhYTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9jaW5ldmliZS50ZXN0Lz9oZXJkPXByZXZpZXciO3M6NToicm91dGUiO3M6NToiaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1781721080),
('ncjGUclTVXUyuMsvGLrV5nlWvddzM7hovjSBHyCt', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiR05nNlBYN2hIZUp6WUpQSEtSMHBtekZJNE5FMlFKaG04emR6Y2lkQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9tb3ZpZXMvMSI7czo1OiJyb3V0ZSI7czoxMToibW92aWVzLnNob3ciO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1781723845),
('ozjG6Y2sIzwOfloaAIFmcYSTlHci7YBlsWXY5g0b', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiYVZKd2hQbnBiUWh5ejNBNE55YzZaeU4xdWI1Uk4yM2ZsdFZZRXdVOCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjg6Imh0dHA6Ly9jaW5ldmliZS50ZXN0L2NsaWVudGUiO3M6NToicm91dGUiO3M6MTc6ImNsaWVudGUuZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovL2NpbmV2aWJlLnRlc3QvY2FydCI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1781724027),
('v5p8U0PvUwtEsIGG250tyGX0eofwUG6tlbsxSAFG', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicTEyUzZGanl2OWw2QUl5dHNtdUZCMjF2anZQTWx5OUdqbVpEMW1yZyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly9jaW5ldmliZS50ZXN0Lz9oZXJkPXByZXZpZXciO3M6NToicm91dGUiO3M6NToiaW5kZXgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1781721080);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `showtimes`
--

CREATE TABLE `showtimes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `datetime` datetime NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `movie_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `showtimes`
--

INSERT INTO `showtimes` (`id`, `datetime`, `theater_id`, `movie_id`, `created_at`, `updated_at`) VALUES
(1, '2026-06-18 14:30:00', 1, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(2, '2026-06-18 18:00:00', 2, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(3, '2026-06-19 16:00:00', 2, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(4, '2026-06-19 21:00:00', 1, 1, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(5, '2026-06-19 20:30:00', 3, 2, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(6, '2026-06-18 22:00:00', 3, 2, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(7, '2026-06-20 19:30:00', 3, 2, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(8, '2026-06-20 16:00:00', 1, 3, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(9, '2026-06-19 18:30:00', 2, 3, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(10, '2026-06-21 20:00:00', 2, 3, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(11, '2026-06-18 20:00:00', 2, 4, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(12, '2026-06-20 22:30:00', 1, 4, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(13, '2026-06-21 15:30:00', 3, 4, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(14, '2026-06-19 14:00:00', 1, 5, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(15, '2026-06-20 17:30:00', 2, 5, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(16, '2026-06-21 18:00:00', 3, 5, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(17, '2026-06-22 15:00:00', 1, 6, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(18, '2026-06-22 19:00:00', 2, 7, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(19, '2026-06-23 21:30:00', 3, 8, '2026-06-17 18:16:26', '2026-06-17 18:16:26'),
(20, '2026-06-23 16:30:00', 1, 9, '2026-06-17 18:16:26', '2026-06-17 18:16:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporary_reservations`
--

CREATE TABLE `temporary_reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `showtime_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `amchair` varchar(10) NOT NULL,
  `expires_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `theaters`
--

CREATE TABLE `theaters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `theaters`
--

INSERT INTO `theaters` (`id`, `name`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Sala 1 - VIP', 'Sala con butacas premium y sonido Dolby Atmos.', '2500', '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(2, 'Sala 2 - Standard', 'Sala estándar con gran pantalla.', '1800', '2026-06-17 18:16:25', '2026-06-17 18:16:25'),
(3, 'Sala 3 - 3D', 'Sala equipada con tecnología 3D.', '2200', '2026-06-17 18:16:25', '2026-06-17 18:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` char(36) NOT NULL,
  `pelicula_id` bigint(20) UNSIGNED NOT NULL,
  `showtime_id` bigint(20) UNSIGNED NOT NULL,
  `theater_id` bigint(20) UNSIGNED NOT NULL,
  `retail_sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `price` double NOT NULL,
  `amchair` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `movie` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `pelicula_id`, `showtime_id`, `theater_id`, `retail_sale_id`, `seat_id`, `price`, `amchair`, `date`, `movie`, `created_at`, `updated_at`) VALUES
('2f21452c-2367-46a0-ac84-0cfd1398e39d', 1, 1, 1, 2, 31, 2500, 'D7', '2026-06-18 14:30:00', 'EL DIABLO VISTE A LA MODA 2', '2026-06-17 22:07:10', '2026-06-17 22:07:10'),
('4a474b0f-b5fa-4224-b28f-fd1f6edf2164', 3, 8, 1, 4, 8, 2500, 'A8', '2026-06-20 16:00:00', 'SCARY MOVIE TERRORÍFICAMENTE INCORRECTA', '2026-06-18 01:39:08', '2026-06-18 01:39:08'),
('598d0049-aec9-4ada-91e4-744a46ee1f17', 4, 11, 2, 3, 75, 1800, 'C11', '2026-06-18 20:00:00', 'OBSESIÓN', '2026-06-18 01:36:54', '2026-06-18 01:36:54'),
('6c872b3d-8e22-4266-a0df-5eba98308982', 4, 11, 2, 3, 73, 1800, 'C9', '2026-06-18 20:00:00', 'OBSESIÓN', '2026-06-18 01:36:54', '2026-06-18 01:36:54'),
('7d048f80-55af-4a1a-a8f7-cb9b318afc4a', 1, 1, 1, 5, 8, 2500, 'A8', '2026-06-18 14:30:00', 'EL DIABLO VISTE A LA MODA 2', '2026-06-18 01:39:08', '2026-06-18 01:39:08'),
('d5ff93c1-6a94-4835-af9f-a06206eed4aa', 1, 1, 1, 1, 1, 2500, 'A1', '2026-06-18 14:30:00', 'EL DIABLO VISTE A LA MODA 2', '2026-06-17 21:42:21', '2026-06-17 21:42:21'),
('d968ae86-7616-4ea7-bf45-f616a1c9efe8', 4, 11, 2, 3, 74, 1800, 'C10', '2026-06-18 20:00:00', 'OBSESIÓN', '2026-06-18 01:36:54', '2026-06-18 01:36:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `rol_id`, `sale_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test User', 'test@example.com', '$2y$12$228IZc8T7E7MGQvqtYndx.QdJZDSjSVppzI4n8XTRhhvLgweqqHpG', 2, 4, NULL, '2026-06-17 18:16:26', '2026-06-18 01:39:08', NULL),
(2, 'Admin User', 'admin@example.com', '$2y$12$iUhNonVCPJoYdtarcGFq2O0rySNU5S.N8f.d.aqrz29rQWfIpAt0y', 1, NULL, NULL, '2026-06-17 18:16:26', '2026-06-17 18:16:26', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indices de la tabla `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `headboard_sales`
--
ALTER TABLE `headboard_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `headboard_sales_user_id_foreign` (`user_id`),
  ADD KEY `headboard_sales_retail_sale_id_foreign` (`retail_sale_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `retail_sales`
--
ALTER TABLE `retail_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `retail_sales_ticket_id_foreign` (`ticket_id`),
  ADD KEY `retail_sales_headboard_sale_id_foreign` (`headboard_sale_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_seat_coordinate` (`theater_id`,`row_letter`,`seat_number`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `showtimes_theater_id_foreign` (`theater_id`),
  ADD KEY `showtimes_movie_id_foreign` (`movie_id`);

--
-- Indices de la tabla `temporary_reservations`
--
ALTER TABLE `temporary_reservations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_seat_reservation_per_showtime` (`showtime_id`,`seat_id`),
  ADD KEY `temporary_reservations_user_id_foreign` (`user_id`),
  ADD KEY `temporary_reservations_seat_id_foreign` (`seat_id`),
  ADD KEY `temporary_reservations_expires_at_index` (`expires_at`);

--
-- Indices de la tabla `theaters`
--
ALTER TABLE `theaters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_pelicula_id_foreign` (`pelicula_id`),
  ADD KEY `tickets_showtime_id_foreign` (`showtime_id`),
  ADD KEY `tickets_theater_id_foreign` (`theater_id`),
  ADD KEY `tickets_seat_id_foreign` (`seat_id`),
  ADD KEY `tickets_retail_sale_id_foreign` (`retail_sale_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `headboard_sales`
--
ALTER TABLE `headboard_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `retail_sales`
--
ALTER TABLE `retail_sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT de la tabla `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `temporary_reservations`
--
ALTER TABLE `temporary_reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `theaters`
--
ALTER TABLE `theaters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `headboard_sales`
--
ALTER TABLE `headboard_sales`
  ADD CONSTRAINT `headboard_sales_retail_sale_id_foreign` FOREIGN KEY (`retail_sale_id`) REFERENCES `retail_sales` (`id`),
  ADD CONSTRAINT `headboard_sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `retail_sales`
--
ALTER TABLE `retail_sales`
  ADD CONSTRAINT `retail_sales_headboard_sale_id_foreign` FOREIGN KEY (`headboard_sale_id`) REFERENCES `headboard_sales` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `retail_sales_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);

--
-- Filtros para la tabla `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `showtimes`
--
ALTER TABLE `showtimes`
  ADD CONSTRAINT `showtimes_movie_id_foreign` FOREIGN KEY (`movie_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `showtimes_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`);

--
-- Filtros para la tabla `temporary_reservations`
--
ALTER TABLE `temporary_reservations`
  ADD CONSTRAINT `temporary_reservations_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `temporary_reservations_showtime_id_foreign` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `temporary_reservations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_pelicula_id_foreign` FOREIGN KEY (`pelicula_id`) REFERENCES `movies` (`id`),
  ADD CONSTRAINT `tickets_retail_sale_id_foreign` FOREIGN KEY (`retail_sale_id`) REFERENCES `retail_sales` (`id`),
  ADD CONSTRAINT `tickets_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`),
  ADD CONSTRAINT `tickets_showtime_id_foreign` FOREIGN KEY (`showtime_id`) REFERENCES `showtimes` (`id`),
  ADD CONSTRAINT `tickets_theater_id_foreign` FOREIGN KEY (`theater_id`) REFERENCES `theaters` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
