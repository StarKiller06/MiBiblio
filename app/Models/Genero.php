<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    //
    protected $fillable = [
        'nombre_genero',
    ];

    public function libros(){
        return $this->hasMany(Libros::class);
    }
}
