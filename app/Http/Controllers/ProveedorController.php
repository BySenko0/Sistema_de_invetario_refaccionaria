<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorController extends Controller
{
    /**
     * Muestra la lista de proveedores.
     */
    public function index()
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Retornar la vista con los proveedores
        return view('Admin.proveedor', compact('proveedores'));
    }

    /**
     * Guarda un nuevo proveedor.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_contacto' => 'required|string|max:255',
            'correo_contacto' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
        ]);
    
        Proveedor::create($validated);
    
        return redirect()->route('admin.proveedor')->with('success', 'Proveedor agregado exitosamente.');
    }
    

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('admin.edit-proveedor', compact('producto'));
    }

    /**
     * Actualiza un proveedor existente.
     */
    public function update(Request $request, $id)
    {
        // Buscar el proveedor
        $proveedor = Proveedor::findOrFail($id);

        // Validar los datos del formulario
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'nombre_contacto' => 'required|string|max:255',
            'correo_contacto' => 'required|email|max:255',
            'telefono' => 'required|string|max:15',
            'activo' => 'required|boolean',
        ]);

        // Actualizar los datos
        $proveedor->update($validated);

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.proveedor')->with('success', 'Proveedor actualizado exitosamente.');
    }

    /**
     * Elimina un proveedor.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el proveedor
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->route('admin.proveedor')->with('success', 'Proveedor eliminado correctamente.');
    }
}
