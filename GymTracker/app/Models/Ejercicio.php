<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicios';
    protected $fillable = ['nombre','grupo_muscular','descripcion','imagen_demo'];

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
