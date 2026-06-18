# CineVibe - Documento de Arquitectura

## 1. Visión General

CineVibe utiliza una arquitectura **MVC (Model-View-Controller)** implementada con Laravel 10, siguiendo el patrón de diseño estándar del framework.

---

## 2. Stack Tecnológico

| Capa              | Tecnología               |
| ----------------- | ------------------------ |
| **Backend**       | PHP ^8.2, ^Laravel 12    |
| **Frontend**      | Blade Templates          |
| **Base de Datos** | MySQL 8.2.12             |
| **Autenticación** | Laravel Breeze / Sanctum |
| **Servidor**      | Apache                   |


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
│   │   │   └── ...
│   │   ├── Middleware/
│   │   │   └── ...
│   │   └── Requests/
│   │       └── ...
│   ├── Models/
│   │   └── ...
│   ├── Services/
│   │   └── ...
│   ├── Events/
│   │   └── ...
│   └── Listeners/
│       └── ...
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   │   └── ...
│   ├── css/
│   └── js/
├── routes/
│   ├── console.php
│   └── web.php
├── public/
│   └── storage/
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
- Paginación en listados
- Optimización de imágenes (WebP)
