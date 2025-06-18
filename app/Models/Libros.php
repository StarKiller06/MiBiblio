<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
        protected $fillable = [
        'isbn',
        'autores_id',
        'genero_id',
        'editoriales_id',
        'año_publicacion',
        'archivo',
    ];
        public function genero(){
        return $this->belongsTo(Genero::class);
    }
        public function editoriales(){
        return $this->belongsTo(Editoriales::class);
    }
        public function autores(){
        return $this->belongsTo(Autores::class);
    }
        public function prestamos (){
        return $this->belongsToMany(Prestamo::class, 'libro_prestamo', 'libro_id', 'prestamo_id');
    }
}

