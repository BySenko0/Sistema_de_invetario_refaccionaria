<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Almacen;
use App\Models\AlertaInventario;

class GenerarAlertasInventario extends Command {
    protected $signature = 'inventario:generar-alertas';
    protected $description = 'Genera alertas para productos con inventario bajo';

    public function handle() {
        $productos = Almacen::whereColumn('cantidad', '<', 'stock_minimo')->get();

        foreach ($productos as $producto) {
            AlertaInventario::firstOrCreate(
                ['id_producto' => $producto->id, 'resuelta' => false],
                ['cantidad_actual' => $producto->cantidad, 'stock_minimo' => $producto->stock_minimo]
            );
        }

        $this->info('Alertas generadas con éxito.');
    }
}

