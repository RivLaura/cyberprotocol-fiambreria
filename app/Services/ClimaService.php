<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ClimaService
{
    private string $url =
    'https://api.open-meteo.com/v1/forecast?latitude=-26.1775&longitude=-58.1781&current=temperature_2m,relative_humidity_2m,weather_code,wind_speed_10m';

    public function obtenerClima(): ?array
    {
        try {

            $response = Http::timeout(5)->get($this->url);

            if ($response->successful()) {

                return [
                    'ciudad' => 'Formosa',
                    'datos' => $response->json(),
                ];
            }

            return null;
        } catch (\Exception $e) {

            return null;
        }
    }

    public function obtenerDescripcion(int $codigo): array
    {
        return match ($codigo) {

            0 => [
                'icono' => '☀️',
                'descripcion' => 'Soleado'
            ],

            1, 2 => [
                'icono' => '🌤️',
                'descripcion' => 'Parcialmente nublado'
            ],

            3 => [
                'icono' => '☁️',
                'descripcion' => 'Nublado'
            ],

            45, 48 => [
                'icono' => '🌫️',
                'descripcion' => 'Niebla'
            ],

            51, 53, 55 => [
                'icono' => '🌦️',
                'descripcion' => 'Llovizna'
            ],

            61, 63, 65 => [
                'icono' => '🌧️',
                'descripcion' => 'Lluvia'
            ],

            71, 73, 75 => [
                'icono' => '❄️',
                'descripcion' => 'Nieve'
            ],

            80, 81, 82 => [
                'icono' => '🌦️',
                'descripcion' => 'Chaparrones'
            ],

            95 => [
                'icono' => '⛈️',
                'descripcion' => 'Tormenta'
            ],

            default => [
                'icono' => '🌍',
                'descripcion' => 'Sin información'
            ],
        };
    }
}
