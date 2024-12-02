@extends('layouts.menubar')

@section('title', 'Realizar Venta')

@section('content')
<main class="p-6 max-w-7xl mx-auto bg-white shadow-lg rounded-lg mt-6">
    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                <!-- Icono de cierre -->
            </span>
        </div>
    @endif
    <!-- Mensaje de error -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">{{ $errors->first() }}</span>
        </div>
    @endif

    <!-- Botón para abrir el modal -->
    <button data-modal-target="productModal" data-modal-toggle="productModal" class="bg-blue-500 text-white px-6 py-3 rounded-lg hover:bg-blue-700 mb-6">
        Agregar Producto
    </button>

    <!-- Tabla de ventas y columna derecha para el total -->
    <div class="flex space-x-8">
        <!-- Tabla de ventas -->
        <div class="w-3/4 bg-white shadow-md rounded-lg p-4">
            <table class="table-auto w-full border-collapse border-gray-300">
                <thead class="bg-[#E6E6FA]">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center">#</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Producto</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Cantidad</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Precio</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Subtotal</th>
                        <th class="border border-gray-300 px-4 py-2 text-center"></th>
                    </tr>
                </thead>
                <tbody id="ventasTableBody">
                    @if(session('venta'))
                        @php $total = 0; @endphp
                        @foreach(session('venta') as $item)
                        @php
                            $subtotal = $item['precio'] * $item['cantidad'];
                            $total += $subtotal;
                        @endphp
                        <tr>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $item['nombre'] }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">{{ $item['cantidad'] }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">${{ number_format($item['precio'], 2) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">${{ number_format($subtotal, 2) }}</td>
                            <td class="border border-gray-300 px-4 py-2 text-center">
                                <form action="{{ route('venta.removeProduct', $item['id']) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-700">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" class="text-center py-4">No hay productos en la venta.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        <!-- Columna derecha para el total -->
        <div class="w-1/4 bg-gray-50 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-bold mb-6">Total de Venta</h3>

            <div class="flex justify-between text-lg font-semibold mb-6">
                <span>Total:</span>
                <span id="totalAmount" class="text-2xl text-green-600">
                    @if(isset($total))
                        ${{ number_format($total, 2) }}
                    @else
                        $0.00
                    @endif
                </span>
            </div>

            <div class="flex justify-between space-x-4">
                <form action="{{ route('venta.confirmSale') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded-lg w-full hover:bg-green-700 transition duration-300">
                        Confirmar
                    </button>
                </form>
                <form action="{{ route('venta.cancelSale') }}" method="POST" class="w-full">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-6 py-3 rounded-lg w-full hover:bg-red-700 transition duration-300">
                        Cancelar
                    </button>
                </form>
            </div>
        </div>
    </div>
</main>

<!-- Modal de selección de productos -->
<div id="productModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="relative w-3/4 max-w-4xl">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-xl font-bold">Seleccionar Producto</h3>
                <button type="button" data-modal-hide="productModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 8.586l-4.95-4.95a1 1 0 010-1.415l.07-.07a1 1 0 011.415 0L10 6.172l4.95-4.95a1 1 0 011.415 0l.07.07a1 1 0 010 1.415L11.414 8.586l4.95 4.95a1 1 0 010 1.415l-.07.07a1 1 0 01-1.415 0L10 10l-4.95 4.95a1 1 0 01-1.415 0l-.07-.07a1 1 0 010-1.415l4.95-4.95z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <!-- Barra de búsqueda -->
            <input type="text" id="searchInput" class="w-full border px-4 py-2 rounded-lg mb-4" placeholder="Buscar producto...">

            <!-- Tabla de productos -->
            <table class="table-auto w-full border-collapse border-gray-300">
                <thead class="bg-[#E6E6FA]">
                    <tr>
                        <th class="border border-gray-300 px-4 py-2 text-center">#</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Nombre</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Descripción</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Categoría</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Precio</th>
                        <th class="border border-gray-300 px-4 py-2 text-center">Stock</th>
                        <th class="border border-gray-300 px-4 py-2 text-center"></th>
                    </tr>
                </thead>
                <tbody id="productsTableBody">
                    @foreach ($productos as $producto)
                    <tr>
                        <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                        <td class="border px-4 py-2 text-center">{{ $producto->nombre }}</td>
                        <td class="border px-4 py-2 text-center">{{ $producto->descripcion }}</td>
                        <td class="border px-4 py-2 text-center">{{ $producto->categoria->nombre }}</td>
                        <td class="border px-4 py-2 text-center">${{ number_format($producto->precio, 2) }}</td>
                        <td class="border px-4 py-2 text-center">{{ $producto->stock }}</td>
                        <td class="border px-4 py-2 text-center">
                            <button type="button" data-modal-target="cantidadModal" data-modal-toggle="cantidadModal" data-product-id="{{ $producto->id }}" data-product-stock="{{ $producto->stock }}" class="bg-green-500 text-white px-4 py-2 rounded-lg hover:bg-green-700">
                                Seleccionar
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <!-- El botón de cerrar ya está en el encabezado del modal -->
        </div>
    </div>
</div>

<!-- Mini-modal de Cantidad -->
<div id="cantidadModal" tabindex="-1" aria-hidden="true" class="hidden fixed inset-0 z-50 flex items-center justify-center">
    <div class="relative w-1/3 max-w-md">
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Ingresa la cantidad</h2>
                <button type="button" data-modal-hide="cantidadModal" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 8.586l-4.95-4.95a1 1 0 010-1.415l.07-.07a1 1 0 011.415 0L10 6.172l4.95-4.95a1 1 0 011.415 0l.07.07a1 1 0 010 1.415L11.414 8.586l4.95 4.95a1 1 0 010 1.415l-.07.07a1 1 0 01-1.415 0L10 10l-4.95 4.95a1 1 0 01-1.415 0l-.07-.07a1 1 0 010-1.415l4.95-4.95z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Cerrar</span>
                </button>
            </div>
            <form action="{{ route('venta.addProduct') }}" method="POST">
                @csrf
                <input type="hidden" name="producto_id" id="producto_id">
                <label for="cantidad" class="block mb-2">Cantidad (Stock disponible: <span id="stockDisponible"></span>)</label>
                <input type="number" id="cantidad" name="cantidad" min="1" class="border border-gray-300 p-2 w-full mb-4" required>
                <div class="flex justify-end">
                    <button type="button" data-modal-hide="cantidadModal" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-700 mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-700">Aceptar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Include Flowbite JS -->
<script src="../path/to/flowbite/dist/flowbite.min.js"></script>

<script>
// JavaScript para manejar los modales y pasar datos al modal de cantidad
document.addEventListener('DOMContentLoaded', function() {
    const cantidadModal = document.getElementById('cantidadModal');
    const productoIdInput = document.getElementById('producto_id');
    const stockDisponibleSpan = document.getElementById('stockDisponible');
    const cantidadInput = document.getElementById('cantidad');

    // Añadir evento a los botones "Seleccionar"
    const selectButtons = document.querySelectorAll('[data-modal-target="cantidadModal"]');
    selectButtons.forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.getAttribute('data-product-id');
            const productStock = this.getAttribute('data-product-stock');

            productoIdInput.value = productId;
            stockDisponibleSpan.textContent = productStock;
            cantidadInput.setAttribute('max', productStock);
            cantidadInput.value = 1; // Valor por defecto
        });
    });
});
</script>

@endsection
    