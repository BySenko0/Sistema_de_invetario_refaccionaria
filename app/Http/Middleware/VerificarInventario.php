<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Almacen;
use App\Models\AlertaInventario;

class VerificarInventario {
    public function handle($request, Closure $next) {
        // Obtener productos con inventario bajo
        $productos = Almacen::whereColumn('cantidad', '<', 'stock_minimo')->get();

        foreach ($productos as $producto) {
            AlertaInventario::firstOrCreate(
                ['id_producto' => $producto->id, 'resuelta' => false],
                ['cantidad_actual' => $producto->cantidad, 'stock_minimo' => $producto->stock_minimo]
            );
        }

        return $next($request);
    }
}

