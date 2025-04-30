<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'serie';
    protected $primaryKey = 'id_serie';
    protected $fillable = ['id_sesion','id_ejercicio','serie_num','repeticiones','peso'];

    public function ejercicio()
    {
        return $this->belongsTo(Ejercicio::class,'id_ejercicio','id_ejercicio');
    }

    public function sesion()
    {
        return $this->belongsTo(Sesion::class,'id_sesion','id_sesion');
    }
}
