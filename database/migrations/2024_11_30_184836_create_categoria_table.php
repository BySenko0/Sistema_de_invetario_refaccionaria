<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; 

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id(); // PK
            $table->string('nombre')->unique(); 
            $table->timestamps(); 
        });  
        
        DB::table('categorias')->insert([
            'nombre' => 'aceite de motor',
            'nombre' => 'partes',
            'nombre' => 'bujias',
            'nombre' => 'filtros de Aire',
            'nombre' => 'filtros de Aceite',
            'nombre' => 'filtros de Gasolina',
            'nombre' => 'filtros de Cabina',
            'nombre' => 'bandas de Motor',
            'nombre' => 'bandas de Tiempo',
            'nombre' => 'bandas de Alternador',
            'nombre' => 'bateria de Motor',
            'nombre' => 'Acessorios',
            'nombre' => 'Herramientas',
            'nombre' => 'Lubricantes',
            'nombre' => 'Aditivos',
            'nombre' => 'Refrigerantes',
            'nombre' => 'Liquido de Frenos',
            'nombre' => 'Liquido de Direccion',
            'nombre' => 'Liquido de Transmision',
            'nombre' => 'Liquido de Suspension',
            'nombre' => 'Liquido de Limpia Parabrisas',
            'nombre' => 'Liquido de Lavaparabrisas',
            'nombre' => 'Liquido de Radiador',
            'nombre' => 'Liquido de Bateria',
            'nombre' => 'balatas',
            'nombre' => 'luces LED',
            'nombre' => 'focos',
            'nombre' => 'Arneses',
            'nombre' => 'Cables',
            'nombre' => 'Cables de Bujias',
            'nombre' => 'Aromatizantes',
            'nombre' => 'Limpieza',
            'nombre' => 'Cera',
            'nombre' => 'tapetes',
            'nombre' => 'carritos',
            'nombre' => 'cubre volantes',
        ]);
    }

    /** 
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categorias');
    }
};
