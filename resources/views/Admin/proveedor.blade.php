@extends('layouts.menubar')

@section('title', 'Vista de Pruebas')

@section('content')

<main class="p-4 max-w-7xl mx-auto bg-white shadow-md rounded-lg mt-6">
        <h1 class="text-xl font-bold mb-4">Proveedores</h1>
        <table class="w-full border-collapse border border-gray-300 text-left">
            <thead class="bg-lavender">
                <tr>
                    <th class="border border-gray-300 px-4 py-2">Nombre</th>
                    <th class="border border-gray-300 px-4 py-2">Provisión</th>
                    <th class="border border-gray-300 px-4 py-2">Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-purple-100">
                    <td class="border border-gray-300 px-4 py-2">Distribuidora Norte</td>
                    <td class="border border-gray-300 px-4 py-2">Llantas y accesorios</td>
                    <td class="border border-gray-300 px-4 py-2">55 1234 5678</td>
                </tr>
                <tr class="hover:bg-purple-100">
                    <td class="border border-gray-300 px-4 py-2">Proveedores del Sur</td>
                    <td class="border border-gray-300 px-4 py-2">Lubricantes y aceites</td>
                    <td class="border border-gray-300 px-4 py-2">55 9876 5432</td>
                </tr>
                <tr class="hover:bg-purple-100">
                    <td class="border border-gray-300 px-4 py-2">Autopartes Oriente</td>
                    <td class="border border-gray-300 px-4 py-2">Frenos y suspensiones</td>
                    <td class="border border-gray-300 px-4 py-2">55 6789 1234</td>
                </tr>
            </tbody>
        </table>
    </main>

@endsection