<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
        protected $fillable = [
        'libro_id',
        'user_id',
        'fecha_pretamo',
        'fecha_devolucion',
        'estado',
    ];
        public function usuario(){
        return $this->belongsTo(User::class);
    }
        public function libros (){
        return $this->belongsToMany(Libros::class, 'libro_prestamo', 'prestamo_id', 'libro_id');
    }
}
