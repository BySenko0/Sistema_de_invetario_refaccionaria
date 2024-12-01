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
        Schema::create('ventas', function (Blueprint $table) {
            $table->id(); // PK
            $table->decimal('precio_total', 10, 2); // Total de la venta
            $table->date('fecha_venta'); // Fecha de la venta
            $table->enum('estado', ['pendiente', 'completada', 'cancelada'])->default('completada'); // Estado de la venta
            $table->timestamps(); // created_at, updated_at
        
            // Índice
            $table->index('estado');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ventas');
    }
};
