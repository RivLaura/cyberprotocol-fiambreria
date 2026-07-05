<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use App\Services\DolarService;
use App\Services\ClimaService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registra cualquier servicio de la aplicacion.
     */
    public function register(): void
    {
        //
    }

    /**
     * Inicializa cualquier servicio de la aplicacion.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {

            $view->with('dolar', [
                'nombre' => 'Prueba',
                'compra' => 1460,
                'venta' => 1510,
                'fechaActualizacion' => now()
            ]);

            $clima = Cache::remember(
                'clima_formosa',
                now()->addMinutes(15),
                function () {
                    return app(ClimaService::class)->obtenerClima();
                }
            );

            $estadoClima = null;

            if ($clima) {

                $estadoClima = app(ClimaService::class)
                    ->obtenerDescripcion(
                        $clima['datos']['current']['weather_code']
                    );
            }

            $view->with('estadoClima', $estadoClima);

            $view->with('clima', $clima);
        });
    }
}
