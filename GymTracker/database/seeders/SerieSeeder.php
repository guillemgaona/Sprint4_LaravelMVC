<?php

namespace Database\Seeders;

use App\Models\Serie;
use App\Models\Sesion;
use App\Models\Ejercicio;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    public function run(): void
    {

        $sesiones = Sesion::all();
        $ejercicios = Ejercicio::all();

       
        foreach ($sesiones as $sesion) {
            
            $ejerciciosSesion = $ejercicios->random(3);
            
            foreach ($ejerciciosSesion as $ejercicio) {
               
                for ($serieNum = 1; $serieNum <= 3; $serieNum++) {
                    Serie::create([
                        'id_sesion' => $sesion->id_sesion,
                        'id_ejercicio' => $ejercicio->id_ejercicio,
                        'serie_num' => $serieNum,
                        'repeticiones' => rand(8, 12),
                        'peso' => rand(20, 100)
                    ]);
                }
            }
        }
    }
} 