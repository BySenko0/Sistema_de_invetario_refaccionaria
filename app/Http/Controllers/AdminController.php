<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Venta;

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
        $productos = Producto::where('activo', 1)->get();
        
        return view('Admin.ventas', compact('productos')); 
    }

    public function proveedor()
    {
        $proveedores = Proveedor::all();
        
        return view('Admin.proveedor',compact('proveedores')); 
    }
}
