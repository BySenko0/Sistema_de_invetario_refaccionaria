<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

use App\Http\Controllers\AuthController;


// Definir la ruta de login con nombre
Route::get('/login', function () {
    return view('auth.login');
})->name('login');


// Ruta para la vista de inventario
Route::get('/inventario', function () {
    return view('inventario'); // Nombre correcto de la vista
})->name('inventario');

// Ruta para la vista de Ventas
Route::get('/ventas', function () {
    return view('ventas'); // Apunta al archivo resources/views/ventas.blade.php
})->name('ventas');

Route::get('/usuario', function () {
    return view('usuario');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/proveedor', function () {
    return view('proveedor');
});