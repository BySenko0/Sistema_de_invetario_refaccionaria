<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ventas</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@heroicons/react/outline"></script>
</head>
<body class="bg-[#E6E6FA] font-sans h-screen overflow-hidden">

    <!-- Barra de navegación -->
    <nav class="flex items-center justify-between bg-[#E6E6FA] shadow-md px-4 py-3">
        <div class="menu-icon flex flex-col gap-1 cursor-pointer" id="menu-toggle">
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
        </div>
        <div class="flex flex-grow items-center gap-4 ml-4">
            <input type="text" id="search-bar" placeholder="Buscar en ventas..."
                class="flex-grow rounded-full border border-gray-300 px-4 py-2 shadow-sm focus:outline-none">
        </div>
        <div class="flex gap-4">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12v1M19 3l-7 7-7-7" />
            </svg>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="fixed top-0 left-[-250px] w-[250px] h-full bg-[#E6E6FA] shadow-lg transition-all duration-300" id="sidebar">
        <div class="text-right p-2 text-2xl cursor-pointer text-gray-700" id="close-menu">&times;</div>
        <ul class="list-none">
            <li class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10 3L3 10h3v4h4v-4h3L10 3z" />
                </svg>
                <span class="text-lg font-bold text-gray-700">Inicio</span>
            </li>
            <li class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3h14v14H3V3zm2 2v10h10V5H5z" clip-rule="evenodd" />
                </svg>
                <span class="text-lg font-bold text-gray-700">Ventas</span>
            </li>
            <li class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M6 3h8a1 1 0 011 1v12a1 1 0 01-1 1H6a1 1 0 01-1-1V4a1 1 0 011-1z" />
                </svg>
                <span class="text-lg font-bold text-gray-700">Inventario</span>
            </li>
            <li class="flex items-center gap-2 px-4 py-3 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M3 10l4-4m0 0l4 4m-4-4v8" />
                </svg>
                <span class="text-lg font-bold text-gray-700">Logout</span>
            </li>
        </ul>
    </div>

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

    <script>
        document.getElementById('menu-toggle').addEventListener('click', () => {
            document.getElementById('sidebar').style.left = '0';
        });

        document.getElementById('close-menu').addEventListener('click', () => {
            document.getElementById('sidebar').style.left = '-250px';
        });

        document.getElementById('cancelar-venta-btn').addEventListener('click', () => {
            alert('Venta cancelada.');
            document.getElementById('total-venta').textContent = '0.00';
        });

        document.getElementById('confirmar-venta').addEventListener('click', () => {
            alert('Venta realizada exitosamente.');
            document.getElementById('confirmarVentaModal').classList.add('hidden');
        });
    </script>
</body>
</html>
