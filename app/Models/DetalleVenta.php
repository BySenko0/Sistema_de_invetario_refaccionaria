<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_venta',
        'id_producto',
        'cantidad',
        'precio_unitario',
    ];

    public function producto()
    {
        return $this->belongsTo(Almacen::class, 'id_producto');
    }

    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }
}
