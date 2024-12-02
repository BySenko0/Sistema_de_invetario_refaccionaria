@extends('layouts.menubar')

@section('title', 'Index Admin')

@section('content')

<div class="mt-12">
            <h2 class="text-2xl font-bold text-center mb-4">Resumen de Mes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Ventas Mensuales Realizas </h3>
                    <p class="text-lg text-gray-700"> {{ $totalVentas }} </p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Productos en Inventario</h3>
                    <p class="text-lg text-gray-700">{{ $totalProductos }}</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Proveedores Activos</h3>
                    <p class="text-lg text-gray-700">{{ $totalProveedores}}</p>
                </div>
            </div>
        </div>
    </div>

@endsection
