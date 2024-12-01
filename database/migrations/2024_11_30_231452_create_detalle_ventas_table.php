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
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('id_venta'); // FK para ventas
            $table->unsignedBigInteger('id_producto'); // FK para productos
            $table->integer('cantidad'); // Cantidad de productos vendidos
            $table->decimal('precio_unitario', 10, 2); // Precio unitario del producto
            $table->timestamps(); // created_at, updated_at

            // Foreign keys
            $table->foreign('id_venta')->references('id')->on('ventas')->onDelete('cascade');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_ventas');
    }
};

 
