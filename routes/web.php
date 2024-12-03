<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlertasController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthRoutesController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;

Route::get('/login', [AuthRoutesController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthRoutesController::class, 'login'])->name('login');
Route::patch('/alertas/{id}/resolver', [AlertasController::class, 'resolverAlerta'])->name('alertas.resolver');

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
        // Rutas para CRUD de productos
        Route::resource('/admin/productos', ProductoController::class);
        Route::resource('proveedor', ProveedorController::class);
        Route::resource('venta', VentaController::class);
        
        Route::get('/inicio', [AdminController::class, 'dashboard'])->name('admin.inicio');
        Route::get('/inventario', [AdminController::class, 'inventario'])->name('admin.inventario');
        Route::get('/admin/inventario', [ProductoController::class, 'index'])->name('admin.inventario');
        Route::get('/ventas', [AdminController::class, 'ventas'])->name('admin.ventas');
        Route::get('/proveedor', [AdminController::class, 'proveedor'])->name('admin.proveedor');
        Route::get('/venta', [VentaController::class, 'index'])->name('venta.index');
        Route::post('/venta/add-product', [VentaController::class, 'addProduct'])->name('venta.addProduct');
        Route::post('/venta/update-sale', [VentaController::class, 'updateSale'])->name('venta.updateSale');
        Route::post('/venta/confirm-sale', [VentaController::class, 'confirmSale'])->name('venta.confirmSale');
        Route::post('/venta/cancel-sale', [VentaController::class, 'cancelSale'])->name('venta.cancelSale');
        Route::post('/venta/remove-product/{id}', [VentaController::class, 'removeProduct'])->name('venta.removeProduct');
    });
});

// Rutas para User
Route::prefix('user')->group(function () {
    Route::resource('productos', ProductoController::class);
    Route::resource('venta', VentaController::class);

    Route::get('/inicio', [UserController::class, 'inicio'])->name('users.inicio');
    Route::get('/ventas', [UserController::class, 'ventas'])->name('users.ventas');
    Route::get('/inventario', [UserController::class, 'inventario'])->name('users.inventario');
    Route::get('/users/inventario', [ProductoController::class, 'index'])->name('users.inventario');
    Route::post('/venta/add-product', [VentaController::class, 'addProduct'])->name('venta.addProduct');
    Route::post('/venta/update-sale', [VentaController::class, 'updateSale'])->name('venta.updateSale');
    Route::post('/venta/confirm-sale', [VentaController::class, 'confirmSale'])->name('venta.confirmSale');
    Route::post('/venta/cancel-sale', [VentaController::class, 'cancelSale'])->name('venta.cancelSale');
    Route::post('/venta/remove-product/{id}', [VentaController::class, 'removeProduct'])->name('venta.removeProduct');
});


