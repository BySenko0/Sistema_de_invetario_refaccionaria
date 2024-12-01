<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlertaInventario extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto',
        'cantidad_actual',
        'stock_minimo',
        'resuelta',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
