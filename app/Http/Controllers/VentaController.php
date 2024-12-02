<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use App\Models\Categoria;

class VentaController extends Controller
{
    public function index()
    {

        $productos = Producto::with('categoria')->get();
        $categorias = Categoria::all();
        $totalProductos = Producto::count();

        return view('admin.ventas', compact('productos', 'categorias', 'totalProductos'));
    }

    public function addProduct(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);
    
        $producto_id = $validatedData['producto_id'];
        $cantidad = $validatedData['cantidad'];
    
        // Obtener la venta actual de la sesión o crear una nueva
        $venta = session('venta', []);
    
        // Buscar el producto
        $producto = Producto::findOrFail($producto_id);
    
        // Validar que la cantidad no exceda el stock
        if ($cantidad > $producto->stock) {
            return back()->withErrors(['error' => "La cantidad seleccionada de {$producto->nombre} excede el stock disponible."]);
        }
    
        // Agregar o actualizar el producto en la venta
        if (isset($venta[$producto_id])) {
            // Si el producto ya está en la venta, actualizar la cantidad
            $venta[$producto_id]['cantidad'] += $cantidad;
    
            // Validar que la nueva cantidad no exceda el stock
            if ($venta[$producto_id]['cantidad'] > $producto->stock) {
                return back()->withErrors(['error' => "La cantidad total de {$producto->nombre} excede el stock disponible."]);
            }
        } else {
            // Si no, agregar el producto a la venta
            $venta[$producto_id] = [
                'id' => $producto->id,
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => $cantidad,
                'stock' => $producto->stock,
            ];
        }
    
        // Guardar la venta en la sesión
        session(['venta' => $venta]);
    
        return redirect()->route('admin.ventas')->with('success', 'Producto agregado a la venta.');
    }    

    public function updateSale(Request $request)
    {
        $productosActualizados = $request->input('productos', []);
        $venta = session('venta', []);
    
        foreach ($venta as $id => &$item) {
            if (isset($productosActualizados[$id])) {
                $nuevaCantidad = (int) $productosActualizados[$id];
                if ($nuevaCantidad > 0 && $nuevaCantidad <= $item['stock']) {
                    $item['cantidad'] = $nuevaCantidad;
                } else {
                    return back()->withErrors(['error' => "Cantidad inválida para {$item['nombre']}"]);
                }
            } else {
                unset($venta[$id]);
            }
        }
    
        session(['venta' => $venta]);
    
        return back()->with('success', 'Venta actualizada.');
    }

    public function cancelSale()
    {
        // Limpiar la venta de la sesión
        session()->forget('venta');
    
        return redirect()->route('admin.ventas')->with('success', 'Venta cancelada.');
    }
    

    public function confirmSale()
    {
        $venta = session('venta', []);
        if (empty($venta)) {
            return redirect()->route('admin.ventas')->withErrors(['error' => 'No hay productos en la venta.']);
        }
    
        $total = 0;
        foreach ($venta as $item) {
            $total += $item['precio'] * $item['cantidad'];
        }
    
        // Crear la venta en la base de datos
        $ventaModel = Venta::create([
            'fecha_venta' => now(),
            'precio_total' => $total,
            'detalles' => json_encode($venta), // Cambiado a 'detalles'
        ]);
    
        // Actualizar el stock de los productos
        foreach ($venta as $item) {
            $producto = Producto::findOrFail($item['id']);
            $producto->stock -= $item['cantidad'];
            $producto->save();
        }
    
        // Limpiar la venta de la sesión
        session()->forget('venta');
    
        return redirect()->route('admin.ventas')->with('success', 'Venta realizada con éxito.');
    }
    
    
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'productos' => 'required|array',
            'total' => 'required|numeric|min:0',
        ]);

        $productos = $validatedData['productos'];
        $total = $validatedData['total'];

        // Crear la venta
        $venta = Venta::create([
            'fecha_venta' => now(),
            'precio_total' => $total,
            'detalle' => json_encode($productos), 
        ]);

        // Actualizar el stock de cada producto
        foreach ($productos as $productoData) {
            $producto = Producto::findOrFail($productoData['id']);
            $cantidadVendida = $productoData['cantidad'];

            // Reducir el stock
            $producto->stock -= $cantidadVendida;
            $producto->save();
        }

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.ventas')->with('success', 'Venta realizada con éxito');
    }
}
