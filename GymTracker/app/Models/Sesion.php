<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sesion extends Model
{
    protected $table = 'sesions';
    protected $fillable = ['fecha','nota'];

    public function series()
    {
        return $this->hasMany(Serie::class);
    }
}
