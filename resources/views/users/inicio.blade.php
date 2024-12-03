@extends('layouts.menubaruser')

@section('title', 'Usuario - Inicio')

@section('content')

<!-- Contenido principal -->
<main class="bg-white rounded-lg shadow-lg p-8 max-w-[95%] mx-auto my-8">
        <!-- Bienvenida -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold italic uppercase">Bienvenido</h1>
        </div>

        <!-- Tarjetas para Inventario y Ventas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <a href="{{ route('users.inventario') }}" class="block">
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('img/usuario/1.jpg') }}" alt="Inventario" class="w-full h-56 object-cover">
                <div class="p-6 text-center">
                <h2 class="text-2xl font-bold mb-4">Inventario</h2>
                <p class="bg-blue-500 text-white py-3 px-6 rounded text-lg inline-block hover:bg-blue-600">
                    Ir al Inventario
                </p>
                </div>
            </div>
            </a>
            <a href="{{ route('users.ventas') }}" class="block">
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('img/usuario/2.png') }}" alt="Ventas" class="w-full h-56 object-cover">
                <div class="p-6 text-center">
                <h2 class="text-2xl font-bold mb-4">Ventas</h2>
                <p class="bg-blue-500 text-white py-3 px-6 rounded text-lg inline-block hover:bg-blue-600">
                    Ir a Ventas
                </p>
                </div>
            </div>
            </a>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="mt-12 text-center">
            <h3 class="text-3xl font-bold mb-6">Estadísticas rápidas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-lg">
                <div class="bg-gray-100 p-8 rounded-lg shadow text-center">
                    <strong class="text-3xl">{{ $totalProductos }}</strong> Productos en Inventario
                </div>
                <div class="bg-gray-100 p-8 rounded-lg shadow text-center">
                    <strong class="text-3xl"> {{ $totalVentas }} </strong> Ventas este mes
                </div>
            </div>
        </div>

        <!-- Sección de contacto -->
        <div class="mt-12 text-center">
            <p class="text-xl">¿Necesitas ayuda? Contáctanos: 
                <a href="mailto:soporte@empresa.com" class="text-blue-500 font-bold hover:underline">soporte@empresa.com</a>
            </p>
        </div>
    </main>


@endsection