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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('nombre'); 
            $table->string('nombre_contacto'); 
            $table->string('correo_contacto')->unique(); 
            $table->string('telefono', 15);
            $table->boolean('activo')->default(true); 
            $table->timestamps();
            $table->softDeletes();  
        });    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proveedores');
    }
};