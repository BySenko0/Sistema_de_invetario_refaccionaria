<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoPrecios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_producto',
        'precio_anterior',
        'precio_nuevo',
        'fecha_cambio',
    ];

    public function producto()
    {
        return $this->belongsTo(Almacen::class, 'id_producto');
    }
}

