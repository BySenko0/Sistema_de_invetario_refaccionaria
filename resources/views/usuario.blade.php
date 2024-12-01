<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Usuario</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fondo translúcido cuando el menú está abierto */
        body.menu-open::after {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 40;
        }
    </style>
</head>
<body class="bg-[#E6E6FA] font-sans h-screen overflow-x-hidden relative">

    <!-- Barra de navegación -->
    <nav class="flex items-center justify-between bg-[#E6E6FA] shadow-md px-6 py-4 text-xl">
        <div id="menu-toggle" class="flex flex-col gap-1 cursor-pointer">
            <span class="block w-8 h-1 bg-black rounded"></span>
            <span class="block w-8 h-1 bg-black rounded"></span>
            <span class="block w-8 h-1 bg-black rounded"></span>
        </div>
        <div class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12c0 4-2 6-4 6s-4-2-4-6a4 4 0 118 0zM12 4a2 2 0 100 4 2 2 0 000-4z" />
            </svg>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-[-300px] w-[300px] h-full bg-[#E6E6FA] shadow-lg transition-all duration-300 z-50">
        <div id="close-menu" class="text-right text-3xl p-6 cursor-pointer">&times;</div>
        <ul class="list-none">
            <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V3m6 18l4-4m0 0l-4-4m4 4H15" />
                </svg>
                <span class="text-xl">Inicio</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <span class="text-xl">Perfil</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V5a4 4 0 00-8 0v6m-4 0h16m-6 0v6a2 2 0 104 0v-6m-8 0v6a2 2 0 104 0v-6" />
                </svg>
                <span class="text-xl">Ventas</span>
            </li>
            <li class="flex items-center gap-4 px-6 py-4 hover:bg-gray-100 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M3 8h18M3 13h18M3 18h18" />
                </svg>
                <span class="text-xl">Inventario</span>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <main class="bg-white rounded-lg shadow-lg p-8 max-w-[95%] mx-auto my-8">
        <!-- Bienvenida -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold italic uppercase">Bienvenido</h1>
        </div>

        <!-- Tarjetas para Inventario y Ventas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="https://via.placeholder.com/350x220" alt="Inventario" class="w-full h-56 object-cover">
                <div class="p-6 text-center">
                    <h2 class="text-2xl font-bold mb-4">Inventario</h2>
                    <a href="/inventario" class="bg-blue-500 text-white py-3 px-6 rounded hover:bg-blue-600 text-lg">Ir al Inventario</a>
                </div>
            </div>
            <div class="bg-white rounded-lg shadow-md overflow-hidden transform hover:scale-105 transition-transform duration-300">
                <img src="https://via.placeholder.com/350x220" alt="Ventas" class="w-full h-56 object-cover">
                <div class="p-6 text-center">
                    <h2 class="text-2xl font-bold mb-4">Ventas</h2>
                    <a href="/ventas" class="bg-blue-500 text-white py-3 px-6 rounded hover:bg-blue-600 text-lg">Ir a Ventas</a>
                </div>
            </div>
        </div>

        <!-- Estadísticas rápidas -->
        <div class="mt-12 text-center">
            <h3 class="text-3xl font-bold mb-6">Estadísticas rápidas</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 text-lg">
                <div class="bg-gray-100 p-8 rounded-lg shadow text-center">
                    <strong class="text-3xl">150</strong> Productos en Inventario
                </div>
                <div class="bg-gray-100 p-8 rounded-lg shadow text-center">
                    <strong class="text-3xl">45</strong> Ventas este mes
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

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.style.left = '0';
            document.body.classList.add('menu-open');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.style.left = '-300px';
            document.body.classList.remove('menu-open');
        });
    </script>
</body>
</html>
