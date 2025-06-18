<?php

namespace Database\Seeders;

use App\Models\Sesion;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class SesionSeeder extends Seeder
{
    public function run(): void
    {
        $sesiones = [
            [
                'fecha' => Carbon::now()->subDays(2),
                'nota' => 'Entrenamiento de piernas intenso'
            ],
            [
                'fecha' => Carbon::now()->subDays(1),
                'nota' => 'Sesión de pecho y tríceps'
            ],
            [
                'fecha' => Carbon::now(),
                'nota' => 'Entrenamiento de espalda y bíceps'
            ]
        ];

        foreach ($sesiones as $sesion) {
            Sesion::create($sesion);
        }
    }
} 