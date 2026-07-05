<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Nombre de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor es el nombre de tu aplicación. Se usará cuando el framework
    | necesite mostrar el nombre de la aplicación en notificaciones u otros
    | elementos de la interfaz.
    |
    */

    'name' => env('APP_NAME', 'CyberProtocol'),

    /*
    |--------------------------------------------------------------------------
    | Entorno de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Este valor determina el "entorno" en el que se está ejecutando tu
    | aplicación. Puede influir en cómo configuras varios servicios.
    | Establece esto en tu archivo ".env".
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Modo de Depuración
    |--------------------------------------------------------------------------
    |
    | Cuando la aplicación está en modo de depuración, se mostrarán mensajes
    | de error detallados con trazas de pila. Si está desactivado, se
    | muestra una página de error genérica.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | URL de la Aplicación
    |--------------------------------------------------------------------------
    |
    | Esta URL es usada por la consola para generar URLs correctamente al
    | usar la herramienta de línea de comandos Artisan. Debe establecerse
    | en la raíz de la aplicación.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    /*
    |--------------------------------------------------------------------------
    | Zona Horaria
    |--------------------------------------------------------------------------
    |
    | Aquí puedes especificar la zona horaria por defecto para tu aplicación,
    | que será utilizada por las funciones de fecha y hora de PHP.
    |
    */

    'timezone' => 'America/Argentina/Buenos_Aires',

    /*
    |--------------------------------------------------------------------------
    | Configuración de Localización
    |--------------------------------------------------------------------------
    |
    | La configuración regional de la aplicación determina la localización
    | que se usará por defecto. Puede establecerse en cualquier configuración
    | regional para la que tengas cadenas de traducción.
    |
    */

    'locale' => env('APP_LOCALE', 'es'),

    'fallback_locale' => env('APP_FALLBACK_LOCALE', 'es'),

    'faker_locale' => env('APP_FAKER_LOCALE', 'es_ES'),

    /*
    |--------------------------------------------------------------------------
    | Clave de Encriptación
    |--------------------------------------------------------------------------
    |
    | Esta clave es utilizada por los servicios de encriptación de Laravel.
    | Debe establecerse en una cadena aleatoria de 32 caracteres para
    | garantizar que todos los valores encriptados sean seguros.
    |
    */

    'cipher' => 'AES-256-CBC',

    'key' => env('APP_KEY'),

    'previous_keys' => [
        ...array_filter(
            explode(',', (string) env('APP_PREVIOUS_KEYS', ''))
        ),
    ],

    /*
    |--------------------------------------------------------------------------
    | Controlador de Modo Mantenimiento
    |--------------------------------------------------------------------------
    |
    | Estas opciones de configuración determinan el controlador utilizado
    | para gestionar el estado de "modo de mantenimiento" de Laravel.
    | El controlador "cache" permite controlar el modo en múltiples máquinas.
    |
    | Controladores soportados: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => env('APP_MAINTENANCE_DRIVER', 'file'),
        'store' => env('APP_MAINTENANCE_STORE', 'database'),
    ],

];
