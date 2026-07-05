<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DolarService
{
    private string $url = 'https://dolarapi.com/v1/dolares/oficial';

    public function obtenerCotizacion(): ?array
    {
        try {

            $response = Http::timeout(5)->get($this->url);

            if ($response->successful()) {
                return $response->json();
            }

            return null;

        } catch (\Exception $e) {

            return null;

        }
    }
}