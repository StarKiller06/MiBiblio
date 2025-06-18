<?php

use App\Models\Autores;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('isbn')->nullable();
            $table->foreignId('autores_id')->nullable();//Se tienen en cuenta las relaciones del UMl
            $table->foreignId('genero_id')->nullable();//llave foranea (Viene de otra tabla como el genero)
            $table->foreignId('editoriales_id')->nullable();//Osea que depende de otra tabla
            $table->date('año_publicacion')->nullable();//Integer es el que usa laravel para almacenar numeros
            $table->string('titulo')->nullable();//puede ir vacio, este dato es para el pdf
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
