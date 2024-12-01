<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthRoutesController;

Route::get('/login', [AuthRoutesController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthRoutesController::class, 'login'])->name('login');

// Ruta para cerrar sesión
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('users.inicio');
})->name('logout');

// Ruta principal: redirige al inicio de usuarios
Route::get('/', function () {
    return redirect()->route('users.inicio');
});

// Rutas protegidas con autenticación
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Rutas para Admin
    Route::prefix('admin')->group(function () {
        Route::get('/inicio', [AdminController::class, 'dashboard'])->name('admin.inicio');
        Route::get('/inventario', [AdminController::class, 'inventario'])->name('admin.inventario');
        Route::get('/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');
        Route::get('/proveedor', [AdminController::class, 'proveedor'])->name('admin.proveedor');
    });
});

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
