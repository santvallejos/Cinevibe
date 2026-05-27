# CineVibe - Documento de Casos de Uso

## 1. Actores del Sistema

### Actor Principal
- **Usuario (Cliente)**: Persona que utiliza la plataforma para comprar boletos de cine
- **Administrador (Admin)**: Persona que gestiona y administra el página web

### Actores Secundarios
- **Sistema de Pagos**: Procesa transacciones (simulado)
- **Sistema de Email**: Envía notificaciones y boletos

---
## 2. Diagrama de caso de usos
![[Cinevibe/Docs/Esquemas/casos-de-uso.png]]
## 3. Casos de Uso

### CU-001: Registrar Usuario

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-001 |
| **Nombre** | Registrar Usuario |
| **Actor Principal** | Usuario |
| **Descripción** | Permite a un nuevo usuario crear una cuenta en el sistema |
| **Precondiciones** | El usuario no tiene cuenta previa |
| **Postcondiciones** | Cuenta creada y usuario puede iniciar sesión |

**Flujo Principal:**
1. Usuario accede a la página de registro
2. Sistema muestra formulario de registro
3. Usuario ingresa: nombre, email, contraseña, confirmar contraseña, fecha de nacimiento
4. Usuario acepta términos y condiciones
5. Sistema valida datos ingresados
6. Sistema crea cuenta de usuario
7. Sistema envía email de bienvenida
8. Sistema redirige al login

**Flujos Alternativos:**

*5a. Email ya registrado:*
1. Sistema muestra mensaje de error
2. Retorna al paso 3

*5b. Contraseñas no coinciden:*
1. Sistema muestra mensaje de error
2. Retorna al paso 3

---

### CU-002: Iniciar Sesión

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-002 |
| **Nombre** | Iniciar Sesión |
| **Actor Principal** | Usuario |
| **Descripción** | Permite al usuario autenticarse en el sistema |
| **Precondiciones** | Usuario tiene cuenta registrada |
| **Postcondiciones** | Sesión iniciada con acceso a funcionalidades |

**Flujo Principal:**
1. Usuario accede a página de login
2. Sistema muestra formulario de autenticación
3. Usuario ingresa email y contraseña
4. Sistema valida credenciales
5. Sistema crea sesión de usuario
6. Sistema redirige a página principal

**Flujos Alternativos:**

*4a. Credenciales inválidas:*
1. Sistema muestra mensaje de error
2. Retorna al paso 3

---

### CU-003: Recuperar Contraseña

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-003 |
| **Nombre** | Recuperar Contraseña |
| **Actor Principal** | Usuario |
| **Descripción** | Permite restablecer contraseña olvidada |
| **Precondiciones** | Usuario tiene cuenta registrada |
| **Postcondiciones** | Nueva contraseña establecida |

**Flujo Principal:**
1. Usuario accede a "Olvidé mi contraseña"
2. Sistema solicita email
3. Usuario ingresa email registrado
4. Sistema valida existencia del email
5. Sistema genera token de recuperación
6. Sistema envía email con enlace
7. Usuario accede al enlace
8. Sistema muestra formulario de nueva contraseña
9. Usuario ingresa y confirma nueva contraseña
10. Sistema actualiza contraseña
11. Sistema redirige al login

---

### CU-004: Explorar Cartelera

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-004 |
| **Nombre** | Explorar Cartelera |
| **Actor Principal** | Usuario |
| **Descripción** | Permite visualizar películas en cartelera |
| **Precondiciones** | Ninguna |
| **Postcondiciones** | Usuario visualiza películas disponibles |

**Flujo Principal:**
1. Usuario accede a la cartelera
2. Sistema obtiene películas activas
3. Sistema muestra grid de películas con: poster, título, género, clasificación, duración
4. Usuario puede navegar por las películas
5. Usuario selecciona una película

---

### CU-005: Ver Detalle de Película

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-005 |
| **Nombre** | Ver Detalle de Película |
| **Actor Principal** | Usuario |
| **Descripción** | Muestra información completa de una película |
| **Precondiciones** | Película existe en cartelera |
| **Postcondiciones** | Usuario visualiza detalles completos |

**Flujo Principal:**
1. Usuario selecciona película desde cartelera
2. Sistema obtiene información de la película
3. Sistema muestra: poster, título, sinopsis, trailer, director, actores, género, clasificación, duración
4. Sistema muestra funciones disponibles (fechas y horarios)
5. Usuario puede seleccionar una función

---

### CU-006: Buscar y Filtrar Películas

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-006 |
| **Nombre** | Buscar y Filtrar Películas |
| **Actor Principal** | Usuario |
| **Descripción** | Permite buscar películas por criterios |
| **Precondiciones** | Ninguna |
| **Postcondiciones** | Resultados filtrados mostrados |

**Flujo Principal:**
1. Usuario accede a buscador/filtros
2. Sistema muestra opciones: género, clasificación, formato (2D/3D/IMAX)
3. Usuario ingresa término de búsqueda y/o selecciona filtros
4. Sistema aplica criterios
5. Sistema muestra resultados coincidentes

---

### CU-007: Seleccionar Función

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-007 |
| **Nombre** | Seleccionar Función |
| **Actor Principal** | Usuario |
| **Descripción** | Permite elegir fecha, hora y sala |
| **Precondiciones** | Usuario autenticado, película seleccionada |
| **Postcondiciones** | Función seleccionada para reserva |

**Flujo Principal:**
1. Sistema muestra calendario con fechas disponibles
2. Usuario selecciona fecha
3. Sistema muestra horarios disponibles
4. Usuario selecciona horario
5. Sistema muestra información de sala y formato
6. Sistema verifica disponibilidad
7. Sistema redirige a selección de asientos

**Flujos Alternativos:**

*1a. Usuario no autenticado:*
1. Sistema redirige a login
2. Tras login, retorna a selección

---

### CU-008: Seleccionar Asientos

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-008 |
| **Nombre** | Seleccionar Asientos |
| **Actor Principal** | Usuario |
| **Descripción** | Permite elegir asientos específicos en la sala |
| **Precondiciones** | Función seleccionada con disponibilidad |
| **Postcondiciones** | Asientos reservados temporalmente |

**Flujo Principal:**
1. Sistema muestra mapa de la sala
2. Sistema indica: disponibles (verde), ocupados (rojo), seleccionados (amarillo)
3. Sistema muestra ubicación de pantalla
4. Usuario selecciona asientos (máx. 10)
5. Sistema actualiza selección en tiempo real
6. Sistema muestra cantidad y precio
7. Usuario confirma selección
8. Sistema bloquea asientos por 10 minutos
9. Sistema redirige a productos

**Flujos Alternativos:**

*4a. Asiento ya ocupado:*
1. Sistema muestra mensaje de conflicto
2. Sistema actualiza mapa

---

### CU-009: Agregar Productos (Combos)

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-009 |
| **Nombre** | Agregar Productos |
| **Actor Principal** | Usuario |
| **Descripción** | Permite agregar snacks y combos a la compra |
| **Precondiciones** | Asientos seleccionados |
| **Postcondiciones** | Productos agregados al carrito |

**Flujo Principal:**
1. Sistema muestra catálogo de productos
2. Sistema organiza por categorías: combos, palomitas, bebidas, dulces
3. Usuario selecciona productos y cantidades
4. Sistema actualiza subtotal en tiempo real
5. Usuario confirma o continúa sin productos
6. Sistema redirige a resumen de compra

---

### CU-010: Ver Resumen de Compra

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-010 |
| **Nombre** | Ver Resumen de Compra |
| **Actor Principal** | Usuario |
| **Descripción** | Muestra desglose completo antes de pagar |
| **Precondiciones** | Asientos seleccionados |
| **Postcondiciones** | Usuario confirma o modifica compra |

**Flujo Principal:**
1. Sistema muestra resumen: película, función, asientos, productos, subtotales, total
2. Sistema muestra tiempo restante de reserva
3. Usuario revisa información
4. Usuario puede modificar productos
5. Usuario confirma y procede al pago

---

### CU-011: Procesar Pago

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-011 |
| **Nombre** | Procesar Pago |
| **Actor Principal** | Usuario |
| **Descripción** | Realiza el pago de la compra |
| **Precondiciones** | Resumen confirmado |
| **Postcondiciones** | Pago procesado, compra finalizada |

**Flujo Principal:**
1. Sistema muestra formulario de pago
2. Usuario selecciona método: tarjeta crédito/débito
3. Usuario ingresa datos de tarjeta
4. Sistema valida formato de datos
5. Sistema procesa pago (simulado)
6. Sistema confirma transacción exitosa
7. Sistema genera número de orden
8. Sistema redirige a confirmación

**Flujos Alternativos:**

*5a. Pago rechazado:*
1. Sistema muestra motivo de rechazo
2. Usuario puede reintentar

---

### CU-012: Recibir Boletos

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-012 |
| **Nombre** | Recibir Boletos |
| **Actor Principal** | Usuario |
| **Descripción** | Genera y entrega boletos digitales |
| **Precondiciones** | Pago exitoso |
| **Postcondiciones** | Boletos disponibles y enviados |

**Flujo Principal:**
1. Sistema genera boletos digitales
2. Sistema crea código QR único por boleto
3. Sistema muestra página de confirmación con boletos
4. Sistema envía email con boletos en PDF
5. Sistema almacena boletos en historial del usuario
6. Usuario puede descargar o imprimir boletos

---

### CU-013: Ver Historial de Compras

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-013 |
| **Nombre** | Ver Historial de Compras |
| **Actor Principal** | Usuario |
| **Descripción** | Muestra compras pasadas y futuras |
| **Precondiciones** | Usuario autenticado |
| **Postcondiciones** | Usuario visualiza su historial |

**Flujo Principal:**
1. Usuario accede a "Mis Compras"
2. Sistema obtiene historial del usuario
3. Sistema separa: próximas funciones, funciones pasadas
4. Sistema muestra lista con: película, fecha, sala, estado
5. Usuario puede seleccionar una compra para ver detalles
6. Usuario puede descargar boletos de compras activas

---

### CU-014: Gestionar Perfil

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-014 |
| **Nombre** | Gestionar Perfil |
| **Actor Principal** | Usuario |
| **Descripción** | Permite editar datos personales |
| **Precondiciones** | Usuario autenticado |
| **Postcondiciones** | Perfil actualizado |

**Flujo Principal:**
1. Usuario accede a "Mi Perfil"
2. Sistema muestra datos actuales
3. Usuario modifica campos deseados
4. Sistema valida datos
5. Sistema guarda cambios
6. Sistema confirma actualización

---

### CU-015: Cerrar Sesión

| Campo | Descripción |
|-------|-------------|
| **ID** | CU-015 |
| **Nombre** | Cerrar Sesión |
| **Actor Principal** | Usuario |
| **Descripción** | Permite cerrar sesión de forma segura |
| **Precondiciones** | Sesión activa |
| **Postcondiciones** | Sesión terminada |

**Flujo Principal:**
1. Usuario selecciona "Cerrar Sesión"
2. Sistema invalida token de sesión
3. Sistema limpia datos de sesión local
4. Sistema redirige a página de inicio

