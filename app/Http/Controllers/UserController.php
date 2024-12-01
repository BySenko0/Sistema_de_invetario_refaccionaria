<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;

class UserController extends Controller
{
    public function inicio()
    {
        $totalProductos = Producto::count();
 
        return view('users.inicio' , compact('totalProductos')); // Vista: resources/views/User/usuario.blade.php
    }

    public function ventas()
    {
        
        return view('users.ventas'); // Vista: resources/views/User/ventas.blade.php
    }

    public function inventario()
    {
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
    
        // Pasar ambas variables a la vista
        return view('users.inventario', compact('productos', 'categorias'));
    }
}
