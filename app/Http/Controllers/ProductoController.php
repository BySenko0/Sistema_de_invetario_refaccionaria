<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use \App\Models\Producto;

class ProductoController extends Controller
{
    private function redirectBasedOnRole($routeName, $message, $type = 'success')
    {
        if (request()->is('admin/*')) {
            return redirect()->route("admin.$routeName")->with($type, $message);
        } else {
            return redirect()->route("users.$routeName")->with($type, $message);
        }
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene todos los productos con sus categorías relacionadas
        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
        $totalProductos = Producto::count();
    
        // Retorna la vista del inventario y envía los productos
        if (request()->is('admin/*')) {
            return view('admin.index', compact('totalProductos'));
            return view('admin.inventario', compact('productos', 'categorias'));
        } else {
            return view('users.index', compact('totalProductos'));
            return view('users.inventario', compact('productos', 'categorias'));
        }
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener todas las categorías desde la base de datos
        $categorias = Categoria::all();
    
        // Pasar las categorías a la vista
        return view('Admin.create-producto', compact('categorias'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        Producto::create($validated);
    
        return $this->redirectBasedOnRole('success', 'Producto agregado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all(); 
        return view('admin.edit-producto', compact('producto', 'categorias'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria' => 'required|exists:categorias,id',
        ]);
    
        $producto = Producto::findOrFail($id);
        $producto->update($validated);

        return redirect()->route('admin.inventario')->with('success', 'Producto actualizado exitosamente.');
        return redirect()->route('users.inventario')->with('success', 'Producto actualizado exitosamente.');
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
    
        return redirect()->route('admin.inventario')->with('success', 'Producto eliminado correctamente.');
    }
    
}
