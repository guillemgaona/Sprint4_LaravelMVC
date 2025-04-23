<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';
    protected $fillable = ['sesion_id','ejercicio_id','serie_num','repeticiones','peso'];

    public function sesion()
    {
        return $this->belongsTo(Sesion::class);
    }

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class);
    }
}
