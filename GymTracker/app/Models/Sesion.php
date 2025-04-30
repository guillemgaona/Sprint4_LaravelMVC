<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesion';
    protected $primaryKey = 'id_sesion';
    protected $fillable = ['fecha','nota'];

    protected $casts = [
        'fecha' => 'date',  // ahora $this->fecha es Carbon
    ];

    public function series()
    {
        return $this->hasMany(Serie::class, 'id_sesion', 'id_sesion');
    }
}
