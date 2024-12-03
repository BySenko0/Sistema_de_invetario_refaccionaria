<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Venta;

class UserController extends Controller
{
    public function inicio()
    {
        $totalProductos = Producto::count();
        $totalVentas = Venta::count();
 
        return view('users.inicio' , compact('totalProductos' , 'totalVentas' )); // Vista: resources/views/User/usuario.blade.php
    }

    public function ventas()
    {
        
        $productos = Producto::where('activo', 1)->get();
        
        return view('users.ventas', compact('productos'));
    }

    public function inventario()
    {
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
    
        // Pasar ambas variables a la vista
        return view('users.inventario', compact('productos', 'categorias'));
    }
}
