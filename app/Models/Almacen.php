<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cantidad',
        'precio_unitario',
        'stock_minimo',
        'id_categoria',
        'activo',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class, 'id_producto');
    }
}



