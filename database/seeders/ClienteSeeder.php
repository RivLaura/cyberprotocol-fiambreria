<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run(): void
    {
        if (Cliente::count() > 0) {
            return;
        }

        Cliente::factory()
            ->count(20)
            ->create();
    }
}
