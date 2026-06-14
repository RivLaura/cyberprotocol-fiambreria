# Validación de navegación para usuarios autenticados

## Objetivo

Verificar que las opciones de navegación visibles dependan correctamente del estado de autenticación del usuario.

## Pruebas realizadas

### Usuario invitado

Opciones visibles:

* Iniciar sesión
* Registrarse

Opciones ocultas:

* Dashboard
* Perfil
* Cerrar sesión

Resultado: Correcto.

### Usuario autenticado

Opciones visibles:

* Dashboard
* Perfil
* Cerrar sesión

Resultado: Correcto.

## Observaciones

Actualmente el módulo de Categorías no se encuentra incorporado al menú de navegación. Su integración será realizada en tareas futuras del proyecto.

## Conclusión

La navegación del sistema adapta correctamente las opciones visibles según el estado de autenticación del usuario, garantizando el acceso seguro a funcionalidades protegidas.
