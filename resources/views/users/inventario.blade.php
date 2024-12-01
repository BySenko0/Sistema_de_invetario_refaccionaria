@extends('layouts.menubaruser')

@section('title', 'Inventario de Productos')    

@section('content')
<main class="p-4 max-w-7xl mx-auto bg-white shadow-md rounded-lg mt-6">
    <h1 class="text-xl font-bold mb-4">Inventario</h1>
    <table class="table-auto w-full border-collapse border-gray-300">
    <thead class="bg-[#E6E6FA]">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">#</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Nombre</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Descripción</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Categoria</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Precio</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Stock</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100"></th>
        </tr>
    </thead>
    <tbody class="hover:bg-gray-100">
    @foreach ($productos as $producto)
        <tr>
            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->nombre }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->descripcion }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->categoria->nombre }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">${{ $producto->precio }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->stock }}</td>
        </tr>
    @endforeach
    </tbody>
    </table>
</main>
@endsection