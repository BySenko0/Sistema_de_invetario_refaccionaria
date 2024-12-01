<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Rutas protegidas con autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Ruta del dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Rutas para Admin
    Route::prefix('admin')->group(function () {
        Route::get('/inicio', [AdminController::class, 'dashboard'])->name('admin.inicio');
        Route::get('/inventario', [AdminController::class, 'inventario'])->name('admin.inventario');
        Route::get('/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');
        Route::get('/proveedor', [AdminController::class, 'proveedor'])->name('admin.proveedor');
    });
});

// Ruta de login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Rutas para User
Route::prefix('user')->group(function () {
    Route::get('/inicio', [UserController::class, 'inicio'])->name('users.inicio');
    Route::get('/ventas', [UserController::class, 'ventas'])->name('users.ventas');
    Route::get('/inventario', [UserController::class, 'inventario'])->name('users.inventario');
});

// Rutas adicionales
Route::get('/1', function () {
    return view('vista_pruebas');
});

Route::get('/2', function () {
    return view('vistauser');
});
