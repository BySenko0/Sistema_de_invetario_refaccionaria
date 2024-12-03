@extends('layouts.menubaruser')

@section('title', 'Inventario de Productos')    

@section('content')
<main class="p-4 max-w-7xl mx-auto bg-white shadow-md rounded-lg mt-6">
    <h1 class="text-xl font-bold mb-4">Inventario</h1>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('users.inventario') }}" class="mb-4">
        <input 
            type="text" 
            name="search" 
            id="searchInput" 
            class="w-full border px-4 py-2 rounded-lg" 
            placeholder="Buscar producto..."
            value="{{ request('search') }}"
        >
    </form>

    <!-- Tabla de productos -->
    <table class="table-auto w-full border-collapse border-gray-300">
        <thead class="bg-[#E6E6FA]">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">#</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Nombre</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Descripción</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Categoría</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Precio</th>
                <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Stock</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($productos as $producto)
                <tr class="hover:bg-gray-100">
                    <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->descripcion }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->categoria->nombre }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">${{ number_format($producto->precio, 2) }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-gray-500 py-4">No se encontraron productos.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>
@endsection