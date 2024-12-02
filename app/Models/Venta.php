<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $fillable = ['fecha_venta', 'precio_total', 'detalles'];

    protected $casts = [
        'detalles' => 'array',
    ];
}