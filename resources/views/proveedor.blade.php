<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Proveedores</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        lavender: '#E6E6FA',
                    },
                },
            },
        };
    </script>
    <style>
        /* Transición suave para el menú lateral */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-lavender min-h-screen">

    <!-- Barra de navegación -->
    <nav class="bg-lavender shadow-md py-3 px-4 flex justify-between items-center">
        <div class="flex items-center gap-2">
            <button id="menu-toggle" class="flex flex-col gap-1">
                <span class="w-6 h-1 bg-black rounded"></span>
                <span class="w-6 h-1 bg-black rounded"></span>
                <span class="w-6 h-1 bg-black rounded"></span>
            </button>
        </div>
        <div class="flex items-center gap-4">
            <input type="text" placeholder="Buscar proveedores..." class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-400">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A12.052 12.052 0 0012 20c3.045 0 5.817-.992 7.879-2.604M8 16h8m-4-8v8m-4 4H4a2 2 0 01-2-2V8a2 2 0 012-2h16a2 2 0 012 2v8a2 2 0 01-2 2h-4" />
            </svg>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-lavender shadow-md sidebar-transition transform -translate-x-full z-50">
        <button id="close-menu" class="text-2xl text-black p-4">&times;</button>
        <ul class="mt-4 space-y-2">
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h11M9 21V10m0 11H3m6-11h11M9 10V3m0 7H3m6 0V3m0 7h11" />
                </svg>
                <span>Inicio</span>
            </li>
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 16s-1 0-1-1V5c0-1 1-1 1-1h18c1 0 1 0 1 1v10c0 1-1 1-1 1M4 16v4m16-4v4M9 21V16H7m10 0v5m2-1h-4v1H7v-1H3" />
                </svg>
                <span>Ventas</span>
            </li>
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8h18M3 12h18m-9 4h9M9 4h6" />
                </svg>
                <span>Inventario</span>
            </li>
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                </svg>
                <span>Proveedores</span>
            </li>
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-black mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h18M9 3v18m6-18v18" />
                </svg>
                <span>Logout</span>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
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

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');

        // Abrir y cerrar el menú lateral
        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
        });
    </script>

</body>
</html>
