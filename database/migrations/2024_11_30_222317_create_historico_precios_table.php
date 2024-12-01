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
        Schema::create('historico_precios', function (Blueprint $table) {
            $table->id(); // PK
            $table->unsignedBigInteger('id_producto'); 
            $table->decimal('precio_anterior', 8, 2); 
            $table->decimal('precio_nuevo', 8, 2); 
            $table->timestamp('fecha_cambio')->default(now()); 
            $table->timestamps();
        
            // Foreign key
            $table->foreign('id_producto')->references('id')->on('almacen')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historico_precios');
    }
};
