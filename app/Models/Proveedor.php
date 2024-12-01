<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Especificar la tabla correcta
    protected $table = 'proveedores';

    protected $fillable = [
        'nombre',
        'nombre_contacto',
        'correo_contacto',
        'telefono',
        'activo',
    ];

    public function productos()
    {
        return $this->hasMany(Producto::class, 'proveedor_id');
    }
}
