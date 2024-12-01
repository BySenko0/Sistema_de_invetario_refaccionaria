<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProductos = Producto::count();

        return view('Admin.inicio' , compact('totalProductos')); 
    }

    public function inventario()
    {

        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
    
        // Pasar ambas variables a la vista
        return view('Admin.inventario', compact('productos', 'categorias'));
    }

    public function ventas()
    {
        return view('Admin.ventas'); 
    }

    public function proveedor()
    {
        $proveedores = Proveedor::all();
        
        return view('Admin.proveedor',compact('proveedores')); 
    }
}
