# CineVibe - Especificaciones Técnicas

## 1. Requisitos del Sistema

### 1.1 Requisitos de Servidor

| Componente         | Requisito Mínimo          |
| ------------------ | ------------------------- |
| **PHP**            | 8.1 o superior            |
| **Composer**       | 2.0+                      |
| **MySQL**          | 8.0 o superior            |
| **Node.js**        | 18.x LTS                  |
| **npm**            | 9.x                       |
| **Servidor Web**   | Apache 2.4+ / Nginx 1.18+ |

### 1.2 Extensiones PHP Requeridas

- BCMath
- Ctype
- cURL
- DOM
- Fileinfo
- JSON
- Mbstring
- OpenSSL
- PDO MySQL
- Tokenizer
- XML
- GD (para generación de QR)

---

## 2. Dependencias del Proyecto

### 2.1 Backend (composer.json)

```json
{
    "require": {
        "php": "^8.1",
        "laravel/framework": "^10.0",
        "laravel/breeze": "^1.0",
        "simplesoftwareio/simple-qrcode": "^4.2",
        "barryvdh/laravel-dompdf": "^2.0",
        "intervention/image": "^2.7"
    },
    "require-dev": {
        "fakerphp/faker": "^1.9",
        "laravel/pint": "^1.0",
        "laravel/sail": "^1.18",
        "mockery/mockery": "^1.4",
        "phpunit/phpunit": "^10.1"
    }
}
```

### 2.2 Frontend (package.json)

```json
{
    "devDependencies": {
        "autoprefixer": "^10.4",
        "laravel-vite-plugin": "^0.8",
        "vite": "^4.0"
    },
    "dependencies": {
        "alpinejs": "^3.12"
    }
}
```

---

## 3. Configuración de Base de Datos

### 3.1 Archivo .env

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=grupo16
DB_USERNAME=root
DB_PASSWORD=

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null

SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

### 3.2 Migraciones Principales

**create_movies_table**
```php
Schema::create('movies', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->text('synopsis');
    $table->string('poster_url')->nullable();
    $table->string('trailer_url')->nullable();
    $table->integer('duration_minutes');
    $table->string('rating', 10); // ATP, +13, +16, +18
    $table->date('release_date');
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

**create_showtimes_table**
```php
Schema::create('showtimes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('movie_id')->constrained()->onDelete('cascade');
    $table->foreignId('theater_id')->constrained()->onDelete('cascade');
    $table->dateTime('datetime');
    $table->enum('format', ['2D', '3D', 'IMAX']);
    $table->decimal('price', 10, 2);
    $table->boolean('is_active')->default(true);
    $table->timestamps();
});
```

**create_seat_reservations_table**
```php
Schema::create('seat_reservations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('showtime_id')->constrained()->onDelete('cascade');
    $table->foreignId('seat_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
    $table->enum('status', ['temporary', 'confirmed'])->default('temporary');
    $table->timestamp('expires_at')->nullable();
    $table->timestamps();
    
    $table->unique(['showtime_id', 'seat_id']);
});
```

---

## 4. Rutas de la Aplicación

### 4.1 Rutas Públicas

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET | / | HomeController@index | Página de inicio |
| GET | /movies | MovieController@index | Cartelera |
| GET | /movies/{movie} | MovieController@show | Detalle película |
| GET | /movies/search | MovieController@search | Búsqueda |

### 4.2 Rutas de Autenticación

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET | /login | Auth\LoginController@showForm | Formulario login |
| POST | /login | Auth\LoginController@login | Procesar login |
| POST | /logout | Auth\LoginController@logout | Cerrar sesión |
| GET | /register | Auth\RegisterController@showForm | Formulario registro |
| POST | /register | Auth\RegisterController@register | Procesar registro |
| GET | /forgot-password | Auth\PasswordResetController@request | Solicitar reset |
| POST | /forgot-password | Auth\PasswordResetController@sendLink | Enviar enlace |
| GET | /reset-password/{token} | Auth\PasswordResetController@showReset | Formulario nueva pass |
| POST | /reset-password | Auth\PasswordResetController@reset | Procesar reset |

### 4.3 Rutas Protegidas (auth)

| Método | URI | Controlador | Descripción |
|--------|-----|-------------|-------------|
| GET | /showtimes/{showtime}/seats | SeatController@index | Mapa de asientos |
| POST | /seats/reserve | SeatController@reserve | Reservar asientos |
| DELETE | /seats/release | SeatController@release | Liberar asientos |
| GET | /products | ProductController@index | Catálogo productos |
| POST | /cart/add | CartController@add | Agregar al carrito |
| DELETE | /cart/{item} | CartController@remove | Quitar del carrito |
| GET | /checkout | CheckoutController@show | Resumen compra |
| POST | /checkout/process | CheckoutController@process | Procesar pago |
| GET | /orders | OrderController@index | Historial compras |
| GET | /orders/{order} | OrderController@show | Detalle orden |
| GET | /orders/{order}/tickets | TicketController@download | Descargar boletos |
| GET | /profile | ProfileController@edit | Editar perfil |
| PUT | /profile | ProfileController@update | Actualizar perfil |

---

## 5. API Endpoints (Opcionales)

Para funcionalidades en tiempo real (selección de asientos):

```php
Route::prefix('api')->middleware('auth:sanctum')->group(function () {
    Route::get('/showtimes/{showtime}/availability', [SeatController::class, 'availability']);
    Route::post('/seats/temporary-reserve', [SeatController::class, 'temporaryReserve']);
});
```

---

## 7. Servicios

### 7.1 SeatReservationService

```php
class SeatReservationService
{
    public function reserveTemporary(Showtime $showtime, array $seatIds, User $user): bool;
    public function confirmReservation(User $user): bool;
    public function releaseExpired(): int;
    public function getAvailableSeats(Showtime $showtime): Collection;
}
```

### 7.2 PaymentService

```php
class PaymentService
{
    public function process(Order $order, array $paymentData): PaymentResult;
    public function validateCard(string $number, string $expiry, string $cvv): bool;
}
```

### 7.3 TicketGeneratorService

```php
class TicketGeneratorService
{
    public function generate(Order $order): array; // Retorna paths de PDFs
    public function generateQR(Ticket $ticket): string;
}
```

---

## 8. Eventos y Listeners

| Evento | Listener | Acción |
|--------|----------|--------|
| OrderCompleted | SendOrderConfirmation | Envía email con boletos |
| OrderCompleted | GenerateTickets | Genera PDFs con QR |
| SeatReserved | NotifyAvailability | Actualiza disponibilidad |

---

## 9. Validaciones

### 9.1 RegisterRequest

```php
public function rules(): array
{
    return [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users'],
        'password' => ['required', 'min:8', 'confirmed'],
        'birth_date' => ['required', 'date', 'before:today'],
    ];
}
```

### 9.2 SeatSelectionRequest

```php
public function rules(): array
{
    return [
        'showtime_id' => ['required', 'exists:showtimes,id'],
        'seat_ids' => ['required', 'array', 'min:1', 'max:10'],
        'seat_ids.*' => ['exists:seats,id'],
    ];
}
```