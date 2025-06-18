<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Editoriales extends Model
{
    //
        protected $fillable = [
        'nombre',
        'ubicacion',
    ];
    public function libros(){
        return $this->hasMany(Libros::class);
    }
}
