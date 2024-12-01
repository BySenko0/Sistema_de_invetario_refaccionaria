<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans h-screen overflow-x-hidden">

    <!-- Barra de navegación -->
    <nav class="flex items-center justify-between bg-gray-800 text-white px-4 py-3 shadow-md">
        <div id="menu-toggle" class="flex flex-col gap-1 cursor-pointer">
            <span class="block w-6 h-1 bg-white rounded"></span>
            <span class="block w-6 h-1 bg-white rounded"></span>
            <span class="block w-6 h-1 bg-white rounded"></span>
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-[-250px] w-[250px] h-full bg-gray-800 text-white shadow-lg transition-all duration-300 z-50">
        <div id="close-menu" class="text-right text-2xl p-4 cursor-pointer">&times;</div>
        <ul class="list-none">
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m6 18l4-4m0 0l-4-4m4 4H15" />
                </svg>
                <span>Inicio</span>
            </li>
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <span>Perfil</span>
            </li>
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V5a4 4 0 00-8 0v6m-4 0h16m-6 0v6a2 2 0 104 0v-6m-8 0v6a2 2 0 104 0v-6" />
                </svg>
                <span>Ventas</span>
            </li>
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                </svg>
                <span>Inventario</span>
            </li>
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 21V3m-4 18v-6M8 21v-4M4 21v-2" />
                </svg>
                <span>Proveedores</span>
            </li>
            <li class="flex items-center gap-4 px-4 py-3 hover:bg-gray-700 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19.938A9 9 0 113 12h1.5a7.5 7.5 0 1015 0H21a9 9 0 01-8.5 7.938z" />
                </svg>
                <span>Resumen de Mes</span>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <div class="p-6">
        <!-- Bienvenida -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold uppercase">Bienvenido, Administrador</h1>
        </div>

        <!-- Tarjetas principales -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300x180" alt="Inventario" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold mb-2">Inventario</h2>
                    <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ir al Inventario</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300x180" alt="Ventas" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold mb-2">Ventas</h2>
                    <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ir a Ventas</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://via.placeholder.com/300x180" alt="Proveedores" class="w-full h-40 object-cover">
                <div class="p-4 text-center">
                    <h2 class="text-xl font-bold mb-2">Proveedores</h2>
                    <a href="#" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Ir a Proveedores</a>
                </div>
            </div>
        </div>

        <!-- Resumen de mes -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold text-center mb-4">Resumen de Mes</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Total Ventas</h3>
                    <p class="text-lg text-gray-700">$25,000 MXN</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Productos en Inventario</h3>
                    <p class="text-lg text-gray-700">320</p>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg shadow text-center">
                    <h3 class="text-xl font-bold">Proveedores Activos</h3>
                    <p class="text-lg text-gray-700">12</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.style.left = '0';
        });

        closeMenu.addEventListener('click', () => {
            sidebar.style.left = '-250px';
        });
    </script>
</body>
</html>
