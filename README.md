# CineVibe 🎬

**CineVibe** es una aplicación web e-commerce de boletos para el cine, desarrollada como un proyecto académico para la **Universidad Nacional del Nordeste (UNNE)**, correspondiente a la materia **"Taller de Programación I"**. Su objetivo principal es mejorar significativamente la experiencia del usuario al realizar compras de entradas y snacks en cadenas de cine, proporcionando un entorno 100% digital, intuitivo y eficiente.

---

## 🎯 Objetivo del Proyecto

El sistema busca evitar las filas en los establecimientos físicos, brindando una plataforma donde el cliente final pueda:
1. Buscar y explorar estrenos y películas en cartelera de forma rápida.
2. Comprar boletos seleccionando la sala, horario y butaca exacta mediante un mapa interactivo.
3. Adquirir de forma opcional productos adicionales y combos (snacks, bebidas).
4. Generar boletos digitales inmediatos (PDF + QR) luego de un proceso de checkout seguro.

---

## ✨ Características Principales

- **Registro y Autenticación:** Cuentas de usuario seguras con roles definidos (Cliente web, Administrador).
- **Cartelera Dinámica:** Detalles profundos de películas (tráiler, sinopsis, duración, formato 2D/3D/IMAX).
- **Control de Asientos:** Un mapa de salas visual que gestiona bloqueos temporales de asientos mientras el usuario completa la gestión de pago.
- **Carrito Unificado:** Selección y combinación de butacas y productos de "Candy Bar" bajo un mismo pedido.
- **Historial y Tickets:** Generación de facturas y tickets escaneables vía QR para validación directa mediante teléfono móvil.

---

## 💻 Stack Tecnológico

El proyecto está diseñado bajo una arquitectura de software orientada en el patrón **MVC (Modelo-Vista-Controlador)**:

* **Backend:** PHP 8.1+, Laravel 10.
* **Frontend:** Laravel Blade (Templating), Tailwind CSS (Estilos), Alpine.js (Interactividad del lado del cliente).
* **Gestor de BD:** MySQL 8.0 mediante el ORM Eloquent.
* **Autenticación:** Laravel Breeze / Sanctum, encriptación Bcrypt, mitigación XSS y protección CSRF.
* **Otras Herramientas:** DomPDF (Generación de boletos), Simple-QrCode, Redis (Caché), Laravel Vite (Assets compilados).

---

## 🏗️ Arquitectura y Flujos

El desarrollo implementa patrones del diseño como **Repository, Factory, Service Layer y Observer** para mantener un código claro y escalable. Eventos como `OrderCompleted` o `SeatReserved` gatillan mediante Listeners confirmaciones por e-mail y liberaciones de butacas expiradas de forma asíncrona.

La lógica de negocio pesada está separada en clases como `SeatReservationService`, `PaymentService` y `TicketGeneratorService`.

---

## 📚 Documentación Completa

Dentro de directorio raíz, podrás explorar el diseño exhaustivo en las siguientes carpetas:

* **`Docs/`**: Documentos con análisis profundo (`01-REQUISITOS-FUNCIONALES.md`, `03-ARQUITECTURA.md`, `04-ESPECIFICACIONES-TECNICAS.md`, etc.).
* **`Excalidraw/`**: Diagramas del **Flujo de Usuario** y diagramas de **Casos de Uso** de la plataforma.
