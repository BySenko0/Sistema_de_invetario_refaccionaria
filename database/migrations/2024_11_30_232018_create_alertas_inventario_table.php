<?php

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
        Schema::create('alertas_inventario', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('id_producto'); // FK para productos
            $table->integer('cantidad_actual'); // Cantidad actual en inventario
            $table->integer('stock_minimo'); // Nivel mínimo configurado
            $table->boolean('resuelta')->default(false); // Estado de la alerta
            $table->timestamps(); // created_at, updated_at
        
            // Foreign key
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
            
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alertas_inventario');
    }
};
