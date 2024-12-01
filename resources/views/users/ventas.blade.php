@extends('layouts.menubaruser')

@section('title', 'Vista de Pruebas')

@section('content')

<!-- Contenido principal -->
<main class="bg-white rounded-lg shadow-lg p-4 max-w-[95%] mx-auto my-4">
        <h1 class="text-xl font-bold mb-4">Ventas</h1>

        <div class="flex flex-col gap-4">
            <!-- Producto vendido 1 -->
            <div class="flex items-center justify-between border rounded-lg p-2 bg-gray-100">
                <img src="https://via.placeholder.com/50" alt="Producto 1" class="w-12 h-12 object-cover mr-4">
                <div class="flex-grow flex flex-col">
                    <span class="text-sm text-gray-700">Producto: 155/80R13 NOKIAN</span>
                    <span class="text-sm text-gray-700">Cantidad Vendida: 5</span>
                    <span class="text-sm text-gray-700">Fecha de Venta: 2024-11-25</span>
                </div>
                <span class="font-bold text-gray-700">$160</span>
            </div>

            <!-- Producto vendido 2 -->
            <div class="flex items-center justify-between border rounded-lg p-2 bg-gray-100">
                <img src="https://via.placeholder.com/50" alt="Producto 2" class="w-12 h-12 object-cover mr-4">
                <div class="flex-grow flex flex-col">
                    <span class="text-sm text-gray-700">Producto: 175/65R14 CONTINENTAL</span>
                    <span class="text-sm text-gray-700">Cantidad Vendida: 3</span>
                    <span class="text-sm text-gray-700">Fecha de Venta: 2024-11-24</span>
                </div>
                <span class="font-bold text-gray-700">$200</span>
            </div>
        </div>

        <!-- Total de la venta -->
        <div class="text-right text-lg font-bold mt-4">
            Total de la Venta: $<span id="total-venta">0.00</span>
        </div>

        <!-- Botones -->
        <div class="flex justify-between mt-4">
            <button class="bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600" id="realizar-venta-btn">Realizar Venta</button>
            <button class="bg-red-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-red-600" id="cancelar-venta-btn">Cancelar Venta</button>
        </div>
    </main>

    <!-- Modal -->
    <div class="fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center hidden" id="confirmarVentaModal">
        <div class="bg-white rounded-lg shadow-lg w-[90%] md:w-[50%] p-4">
            <h5 class="text-lg font-bold mb-4">Confirmar Venta</h5>
            <p>¿Estás seguro de que deseas realizar esta venta?</p>
            <div class="flex justify-end mt-4 gap-2">
                <button class="bg-gray-400 text-white py-2 px-4 rounded-lg" id="cancelar-modal">Cancelar</button>
                <button class="bg-blue-500 text-white py-2 px-4 rounded-lg hover:bg-blue-600" id="confirmar-venta">Confirmar</button>
            </div>
        </div>
    </div>

@endsection