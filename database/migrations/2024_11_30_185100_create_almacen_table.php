<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('almacen', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('id_producto'); // FK
            $table->integer('cantidad')->default(0)->check('cantidad >= 0');
            $table->string('ubicacion'); // Ubicación física
            $table->boolean('activo')->default(true);
            $table->integer('stock_minimo')->default(10);
            $table->unsignedBigInteger('id_categoria'); // FK para categorias
            $table->timestamps(); // created_at, updated_at
            $table->softDeletes();
        
            // Restricciones únicas
            $table->unique(['id_producto', 'ubicacion'], 'unique_producto_ubicacion');
        
            // Foreign keys
            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('restrict');
            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
        });
        
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('almacen');
    }
};
