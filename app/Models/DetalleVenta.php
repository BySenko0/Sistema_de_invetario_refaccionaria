<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_venta',         // ID de la venta
        'id_producto',      // ID del producto
        'cantidad',         // Cantidad vendida
        'precio_unitario',  // Precio unitario del producto
    ];

    /**
     * Relación con la tabla Producto.
     * Un detalle de venta pertenece a un producto.
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    /**
     * Relación con la tabla Venta.
     * Un detalle de venta pertenece a una venta.
     */
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
}



