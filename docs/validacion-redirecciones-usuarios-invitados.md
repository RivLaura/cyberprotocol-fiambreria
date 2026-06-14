# Validación de redirecciones para usuarios invitados

## Objetivo

Verificar que los usuarios no autenticados sean redirigidos correctamente al formulario de inicio de sesión cuando intentan acceder a recursos protegidos.

## Pruebas realizadas

### Ruta: /categorias

Resultado esperado:

* Redirección automática a `/login`.

Resultado obtenido:

* Correcto.

### Ruta: /categorias/crear

Resultado esperado:

* Redirección automática a `/login`.

Resultado obtenido:

* Correcto.

### Usuario autenticado

Resultado esperado:

* Acceso permitido a las funcionalidades protegidas.

Resultado obtenido:

* Correcto.

## Conclusión

El middleware `auth` protege correctamente las rutas del sistema y garantiza que únicamente usuarios autenticados accedan a recursos restringidos.
