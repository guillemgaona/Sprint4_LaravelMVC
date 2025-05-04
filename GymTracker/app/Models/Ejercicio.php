<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Ejercicio extends Model
{
    protected $table = 'ejercicio';
    protected $primaryKey = 'id_ejercicio';
    protected $fillable = ['nombre','grupo_muscular','descripcion','imagen_demo'];

    public function series()
    {
        return $this->hasMany(Serie::class, 'id_ejercicio', 'id_ejercicio');
    }

    public function getImagenDemoUrlAttribute()
{
    return $this->imagen_demo
        ? asset('storage/'.$this->imagen_demo)
        : null;
}
}
