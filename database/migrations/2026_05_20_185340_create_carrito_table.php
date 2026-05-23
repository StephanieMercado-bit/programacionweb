<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Forzamos el nombre a 'carrito' en singular
        Schema::create('carrito', function (Blueprint $table) {
            // El error pide explícitamente 'id_carrito'
            $table->id('id_carrito'); 
            
            // Columna para el total que menciona el error
            $table->decimal('total_precio', 10, 2)->default(0);
            
            // Columnas extra típicas por si el sistema las necesita para vincularlo
            $table->unsignedBigInteger('id_usuario')->nullable();
            $table->unsignedBigInteger('id_cliente')->nullable();
            $table->string('estado')->default('pendiente');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carrito');
    }
};
