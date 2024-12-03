<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use \App\Models\Producto;

class ProductoController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Obtener el texto de búsqueda desde la solicitud
        $query = $request->input('search');
    
        // Filtrar productos con categorías relacionadas según el texto de búsqueda
        $productos = Producto::with('categoria')
            ->when($query, function ($q) use ($query) {
                $q->where('nombre', 'like', "%$query%")
                  ->orWhere('descripcion', 'like', "%$query%")
                  ->orWhereHas('categoria', function ($q) use ($query) {
                      $q->where('nombre', 'like', "%$query%");
                  });
            })
            ->get();
    
        // Obtener todas las categorías y contar productos
        $categorias = Categoria::all();
        $totalProductos = Producto::count();
    
        // Verifica si la solicitud es para la parte de administración
        if (request()->is('admin/*')) {
            return view('admin.inventario', [
                'productos' => $productos,
                'categorias' => $categorias,
                'totalProductos' => $totalProductos,
                'query' => $query, // Añadir el término de búsqueda para usarlo en la vista
            ]);
        } else {
            return view('users.inventario', [
                'productos' => $productos,
                'categorias' => $categorias,
                'totalProductos' => $totalProductos,
                'query' => $query, // Añadir el término de búsqueda para usarlo en la vista
            ]);
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
        return view('admin.create-producto', compact('categorias'));
    }
    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'categoria_id' => 'required|exists:categorias,id',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);
    
        // Crear el producto
        Producto::create($validated);
    
        // Definir los mensajes para la redirección
        $type = 'success'; // Tipo de mensaje (puedes cambiarlo según la lógica)
        $message = 'Producto creado exitosamente.';
    
        // Redirigir al inventario con un mensaje de éxito
        return redirect()->route("admin.inventario")->with($type, $message);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Buscar el producto con su categoría relacionada
        $producto = Producto::with('categoria')->findOrFail($id);
    
        // Retornar una vista para mostrar el producto
        return view('admin.show-producto', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $categorias = Categoria::all();
    
        // Retornar una vista para editar el producto
        return view('admin.edit-producto', compact('producto', 'categorias'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'categoria_id' => 'required|exists:categorias,id', // Cambiado a 'categoria_id'
        ]);
    
        // Buscar el producto por su ID o lanzar un error 404 si no existe
        $producto = Producto::findOrFail($id);
    
        // Actualizar los datos del producto
        $producto->update($validated);
    
        // Redirigir al inventario con un mensaje de éxito
        return redirect()->route('admin.inventario')->with('success', 'Producto actualizado exitosamente.');
    }
    
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $producto = Producto::findOrFail($id);
            $producto->delete();
    
            return redirect()->route('admin.inventario')->with('success', 'Producto eliminado correctamente.');
        } catch (\Exception $e) {
            return redirect()->route('admin.inventario')->with('error', 'Error al eliminar el producto. Intenta nuevamente.');
        }
    }
    
}
