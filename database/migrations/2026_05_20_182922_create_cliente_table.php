<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->id();
            
            // Agregamos las dos columnas que el sistema necesita:
            $table->unsignedBigInteger('id_usuario')->nullable(); 
            $table->string('direccion')->nullable(); 
            
            // Dejamos las que ya tenías (les puse nullable por si algún dato va vacío)
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('telefono')->nullable();
            $table->string('correo')->nullable();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cliente');
    }
};
