<?php

namespace Database\Seeders;

use App\Models\Ejercicio;
use Illuminate\Database\Seeder;

class EjercicioSeeder extends Seeder
{
    public function run(): void
    {
        $ejercicios = [
            [
                'nombre' => 'Sentadilla',
                'grupo_muscular' => 'Piernas',
                'descripcion' => 'Ejercicio compuesto que trabaja principalmente cuádriceps, glúteos y femorales',
                'imagen_demo' => null
            ],
            [
                'nombre' => 'Press de Banca',
                'grupo_muscular' => 'Pecho',
                'descripcion' => 'Ejercicio para desarrollar los músculos pectorales',
                'imagen_demo' => null
            ],
            [
                'nombre' => 'Peso Muerto',
                'grupo_muscular' => 'Espalda',
                'descripcion' => 'Ejercicio compuesto que trabaja toda la cadena posterior',
                'imagen_demo' => null
            ],
            [
                'nombre' => 'Dominadas',
                'grupo_muscular' => 'Espalda',
                'descripcion' => 'Ejercicio de tracción vertical para la espalda',
                'imagen_demo' => null
            ],
            [
                'nombre' => 'Press Militar',
                'grupo_muscular' => 'Hombros',
                'descripcion' => 'Ejercicio para desarrollar los deltoides',
                'imagen_demo' => null
            ]
        ];

        foreach ($ejercicios as $ejercicio) {
            Ejercicio::create($ejercicio);
        }
    }
} 