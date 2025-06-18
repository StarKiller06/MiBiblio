<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autores extends Model
{
    //
        protected $fillable = [
        'nombre',
        'apellido1',
        'apellido2',
        'pais_origen'
    ];
    public function libros(){
        return $this->hasMany(Libros::class);
    }
}
