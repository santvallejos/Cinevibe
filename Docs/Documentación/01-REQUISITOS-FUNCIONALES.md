# CineVibe - Documento de Requisitos Funcionales

## 1. Información del Proyecto

| Campo | Valor |
|-------|-------|
| **Proyecto** | CineVibe - E-commerce de Boletos de Cine |
| **Versión** | 1.0 |
| **Fecha** | Abril 2026 |
| **Tipo** | Proyecto Académico - Taller de Programación I |

---

## 2. Descripción General

CineVibe es una aplicación web de venta de boletos de cine que permite a los usuarios explorar la cartelera, seleccionar funciones, elegir asientos y realizar la compra de entradas de manera digital.

---

## 3. Roles del Sistema

### 3.1 Usuario (Cliente)
Persona registrada que puede navegar la cartelera, seleccionar películas, elegir asientos y comprar boletos.

### 3.2 Administrador (Persona interna de la empresa)
Persona encargada de administrar y gestionar las peliculas y productos de la cadena de cine.

---

## 4. Requisitos Funcionales

### RF-001: Registro de Usuario
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-001 |
| **Nombre** | Registro de Usuario |
| **Descripción** | El sistema debe permitir a nuevos usuarios registrarse proporcionando nombre, email, contraseña y datos personales básicos |
| **Prioridad** | Alta |
| **Entradas** | Nombre completo, email, contraseña, fecha de nacimiento |
| **Salidas** | Cuenta de usuario creada, email de confirmación |
| **Precondiciones** | El email no debe estar registrado previamente |
| **Postcondiciones** | Usuario registrado y habilitado para iniciar sesión |

### RF-002: Inicio de Sesión
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-002 |
| **Nombre** | Inicio de Sesión |
| **Descripción** | El sistema debe permitir a usuarios registrados autenticarse con email y contraseña |
| **Prioridad** | Alta |
| **Entradas** | Email, contraseña |
| **Salidas** | Sesión iniciada, redirección al dashboard |
| **Precondiciones** | Usuario debe estar registrado |
| **Postcondiciones** | Sesión activa con token de autenticación |

### RF-003: Recuperación de Contraseña
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-003 |
| **Nombre** | Recuperación de Contraseña |
| **Descripción** | El sistema debe permitir recuperar la contraseña mediante email |
| **Prioridad** | Media |
| **Entradas** | Email registrado |
| **Salidas** | Enlace de recuperación enviado por email |
| **Precondiciones** | Email debe existir en el sistema |
| **Postcondiciones** | Usuario puede establecer nueva contraseña |

### RF-004: Visualización de Cartelera
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-004 |
| **Nombre** | Visualización de Cartelera |
| **Descripción** | El sistema debe mostrar las películas disponibles con poster, título, género, duración y clasificación |
| **Prioridad** | Alta |
| **Entradas** | Ninguna (acceso público) |
| **Salidas** | Lista de películas en cartelera |
| **Precondiciones** | Ninguna |
| **Postcondiciones** | Usuario visualiza películas disponibles |

### RF-005: Detalle de Película
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-005 |
| **Nombre** | Detalle de Película |
| **Descripción** | El sistema debe mostrar información completa de la película: sinopsis, trailer, director, actores, horarios disponibles |
| **Prioridad** | Alta |
| **Entradas** | ID de película |
| **Salidas** | Información detallada y funciones disponibles |
| **Precondiciones** | Película debe existir en el sistema |
| **Postcondiciones** | Usuario puede ver detalles y seleccionar función |

### RF-006: Búsqueda y Filtrado de Películas
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-006 |
| **Nombre** | Búsqueda y Filtrado |
| **Descripción** | El sistema debe permitir buscar películas por nombre y filtrar por género, clasificación, formato (2D/3D) |
| **Prioridad** | Media |
| **Entradas** | Término de búsqueda, filtros seleccionados |
| **Salidas** | Lista de películas filtradas |
| **Precondiciones** | Ninguna |
| **Postcondiciones** | Resultados mostrados según criterios |

### RF-007: Selección de Función
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-007 |
| **Nombre** | Selección de Función |
| **Descripción** | El sistema debe permitir seleccionar una función específica (fecha, hora, sala, formato) |
| **Prioridad** | Alta |
| **Entradas** | ID de película, fecha y hora deseada |
| **Salidas** | Función seleccionada, mapa de asientos |
| **Precondiciones** | Usuario autenticado, función disponible |
| **Postcondiciones** | Usuario accede a selección de asientos |

### RF-008: Selección de Asientos
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-008 |
| **Nombre** | Selección de Asientos |
| **Descripción** | El sistema debe mostrar mapa de sala con asientos disponibles, ocupados y seleccionados |
| **Prioridad** | Alta |
| **Entradas** | ID de función, asientos seleccionados |
| **Salidas** | Asientos reservados temporalmente |
| **Precondiciones** | Función seleccionada, asientos disponibles |
| **Postcondiciones** | Asientos bloqueados por tiempo limitado |

### RF-009: Selección de Productos (Combos/Snacks)
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-009 |
| **Nombre** | Selección de Productos |
| **Descripción** | El sistema debe permitir agregar combos y snacks a la compra |
| **Prioridad** | Media |
| **Entradas** | Productos seleccionados, cantidades |
| **Salidas** | Productos agregados al carrito |
| **Precondiciones** | Asientos seleccionados |
| **Postcondiciones** | Carrito actualizado con productos |

### RF-010: Resumen de Compra
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-010 |
| **Nombre** | Resumen de Compra |
| **Descripción** | El sistema debe mostrar resumen detallado: película, función, asientos, productos, subtotales y total |
| **Prioridad** | Alta |
| **Entradas** | Datos del carrito |
| **Salidas** | Desglose completo de la compra |
| **Precondiciones** | Al menos un asiento seleccionado |
| **Postcondiciones** | Usuario puede confirmar o modificar |

### RF-011: Procesamiento de Pago
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-011 |
| **Nombre** | Procesamiento de Pago |
| **Descripción** | El sistema debe procesar pagos mediante tarjeta de crédito/débito (simulado para entorno académico) |
| **Prioridad** | Alta |
| **Entradas** | Datos de tarjeta, monto total |
| **Salidas** | Confirmación de pago, número de transacción |
| **Precondiciones** | Resumen de compra confirmado |
| **Postcondiciones** | Pago procesado, boletos generados |

### RF-012: Generación de Boletos
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-012 |
| **Nombre** | Generación de Boletos |
| **Descripción** | El sistema debe generar boletos digitales con código QR único |
| **Prioridad** | Alta |
| **Entradas** | Datos de compra confirmada |
| **Salidas** | Boletos en PDF con QR, email de confirmación |
| **Precondiciones** | Pago exitoso |
| **Postcondiciones** | Boletos disponibles en perfil y email |

### RF-013: Historial de Compras
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-013 |
| **Nombre** | Historial de Compras |
| **Descripción** | El sistema debe mostrar el historial de compras del usuario con acceso a boletos |
| **Prioridad** | Media |
| **Entradas** | ID de usuario |
| **Salidas** | Lista de compras pasadas y futuras |
| **Precondiciones** | Usuario autenticado |
| **Postcondiciones** | Usuario puede ver y descargar boletos |

### RF-014: Perfil de Usuario
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-014 |
| **Nombre** | Gestión de Perfil |
| **Descripción** | El sistema debe permitir editar datos personales y preferencias |
| **Prioridad** | Media |
| **Entradas** | Datos actualizados del usuario |
| **Salidas** | Perfil actualizado |
| **Precondiciones** | Usuario autenticado |
| **Postcondiciones** | Cambios guardados en el sistema |

### RF-015: Cierre de Sesión
| Atributo | Descripción |
|----------|-------------|
| **ID** | RF-015 |
| **Nombre** | Cierre de Sesión |
| **Descripción** | El sistema debe permitir cerrar sesión de forma segura |
| **Prioridad** | Alta |
| **Entradas** | Acción de logout |
| **Salidas** | Sesión terminada |
| **Precondiciones** | Sesión activa |
| **Postcondiciones** | Token invalidado, redirección a inicio |

---

## 5. Requisitos No Funcionales

### RNF-001: Rendimiento
- Tiempo de carga de página < 3 segundos
- Respuesta de API < 500ms

### RNF-002: Seguridad
- Contraseñas hasheadas con bcrypt
- Protección CSRF en formularios
- Tokens JWT para autenticación

### RNF-003: Usabilidad
- Diseño responsive (móvil, tablet, desktop)
- Interfaz intuitiva con máximo 3 clics para completar compra

### RNF-004: Disponibilidad
- Sistema disponible 99% del tiempo
- Manejo de errores con mensajes claros

### RNF-005: Compatibilidad
- Soporte para navegadores modernos (Chrome, Firefox, Safari, Edge)
- Compatible con PHP 8.1+ y Laravel 10+

---
