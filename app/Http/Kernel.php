<?php

protected $middlewareGroups = [
    'web' => [
        \App\Http\Middleware\VerificarInventario::class,
    ],
];

protected function schedule(Schedule $schedule) {
    $schedule->command('inventario:generar-alertas')->daily();
}