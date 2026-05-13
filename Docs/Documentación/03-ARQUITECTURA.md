# CineVibe - Documento de Arquitectura

## 1. Visión General

CineVibe utiliza una arquitectura **MVC (Model-View-Controller)** implementada con Laravel 10, siguiendo el patrón de diseño estándar del framework.

---

## 2. Stack Tecnológico

| Capa | Tecnología |
|------|------------|
| **Backend** | PHP ^8.2, ^Laravel 12 |
| **Frontend** | Blade Templates, Tailwind CSS, Alpine.js |
| **Base de Datos** | MySQL 8.0 |
| **Autenticación** | Laravel Breeze / Sanctum |
| **Cache** | Redis (opcional) |
| **Email** | Laravel Mail (Mailtrap para desarrollo) |
| **Servidor** | Apache/Nginx |

---

## 3. Arquitectura de Capas

```
┌─────────────────────────────────────────────────────────┐
│                    PRESENTACIÓN                         │
│  ┌─────────────┐                       ┌─────────────┐  │
│  │   Blade     │                       │             │  │
│  │  Templates  │                       │     CSS     │  │
│  └─────────────┘                       └─────────────┘  │
├─────────────────────────────────────────────────────────┤
│                     APLICACIÓN                          │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────┐ │
│  │ Controllers │  │  Requests   │  │    Middleware   │ │
│  └─────────────┘  └─────────────┘  └─────────────────┘ │
├─────────────────────────────────────────────────────────┤
│                       DOMINIO                           │
│  ┌─────────────┐  ┌─────────────┐  ┌─────────────────┐ │
│  │   Models    │  │  Services   │  │     Events      │ │
│  └─────────────┘  └─────────────┘  └─────────────────┘ │
├─────────────────────────────────────────────────────────┤
│                   INFRAESTRUCTURA                       │
│  ┌─────────────┐                                        │
│  │   MySQL     │                                        │
│  └─────────────┘                                        │
└─────────────────────────────────────────────────────────┘
```

---

## 4. Estructura del Proyecto

```
cinevibe/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── LoginController.php
│   │   │   │   ├── RegisterController.php
│   │   │   │   └── PasswordResetController.php
│   │   │   ├── MovieController.php
│   │   │   ├── ShowtimeController.php
│   │   │   ├── SeatController.php
│   │   │   ├── ProductController.php
│   │   │   ├── CartController.php
│   │   │   ├── CheckoutController.php
│   │   │   ├── OrderController.php
│   │   │   ├── TicketController.php
│   │   │   └── ProfileController.php
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   └── EnsureSessionHasCart.php
│   │   └── Requests/
│   │       ├── RegisterRequest.php
│   │       ├── SeatSelectionRequest.php
│   │       └── CheckoutRequest.php
│   ├── Models/
│   │   ├── User.php
│   │   ├── Movie.php
│   │   ├── Genre.php
│   │   ├── Theater.php
│   │   ├── Showtime.php
│   │   ├── Seat.php
│   │   ├── SeatReservation.php
│   │   ├── Product.php
│   │   ├── ProductCategory.php
│   │   ├── Order.php
│   │   ├── OrderItem.php
│   │   └── Ticket.php
│   ├── Services/
│   │   ├── SeatReservationService.php
│   │   ├── PaymentService.php
│   │   ├── TicketGeneratorService.php
│   │   └── QRCodeService.php
│   ├── Events/
│   │   ├── OrderCompleted.php
│   │   └── SeatReserved.php
│   └── Listeners/
│       ├── SendOrderConfirmation.php
│       └── GenerateTickets.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   └── app.blade.php
│   │   ├── auth/
│   │   ├── movies/
│   │   ├── showtimes/
│   │   ├── seats/
│   │   ├── products/
│   │   ├── checkout/
│   │   ├── orders/
│   │   └── profile/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php
├── public/
│   └── storage/ -> ../storage/app/public
└── storage/
    └── app/
        └── public/
            ├── movies/
            ├── products/
            └── tickets/
```

---


## 5. Flujo de Datos Principal

```
Usuario → Cartelera → Película → Función → Asientos → Productos → Checkout → Pago → Boletos
```

### 5.1 Flujo de Compra

1. **Exploración**: GET /movies → MovieController@index
2. **Detalle**: GET /movies/{id} → MovieController@show
3. **Funciones**: GET /movies/{id}/showtimes → ShowtimeController@index
4. **Asientos**: GET /showtimes/{id}/seats → SeatController@index
5. **Reservar**: POST /seats/reserve → SeatController@reserve (temporal)
6. **Productos**: GET /products → ProductController@index
7. **Carrito**: POST /cart/add → CartController@add
8. **Resumen**: GET /checkout → CheckoutController@show
9. **Pago**: POST /checkout/process → CheckoutController@process
10. **Boletos**: GET /orders/{id}/tickets → TicketController@show

---

## 6. Patrones de Diseño Utilizados

| Patrón | Uso |
|--------|-----|
| **Repository** | Abstracción de acceso a datos |
| **Service Layer** | Lógica de negocio compleja |
| **Observer** | Eventos post-compra (emails, tickets) |
| **Strategy** | Métodos de pago (extensible) |
| **Factory** | Generación de boletos PDF |

---

## 7. Seguridad

- **Autenticación**: Laravel Breeze con sesiones
- **Autorización**: Middleware `auth` para rutas protegidas
- **CSRF**: Token en todos los formularios
- **Validación**: Form Requests
- **Sanitización**: Eloquent ORM (prevención SQL injection)
- **XSS**: Blade escaping automático
- **Contraseñas**: Hash bcrypt

---

## 8. Consideraciones de Rendimiento

- Eager loading de relaciones (N+1 prevention)
- Cache de cartelera (Redis opcional)
- Paginación en listados
- Optimización de imágenes (WebP)
- Assets compilados (Vite)

---

## 9. Diagramas Adicionales

Ver diagramas en Excalidraw:
- Flujo de navegación: `04-FLUJO-NAVEGACION.excalidraw`
- Diagrama de clases: `05-DIAGRAMA-CLASES.excalidraw`
- Modelo E-R: `06-MODELO-ER.excalidraw`
