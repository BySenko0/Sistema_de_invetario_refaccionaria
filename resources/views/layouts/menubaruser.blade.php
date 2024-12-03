<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard con Flowbite')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.js"></script>
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
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-lavender min-h-screen">

    <!-- Barra de navegación -->
    <nav class="bg-lavender shadow-md py-3 px-4 flex justify-between items-center">
        <button id="menu-toggle" class="flex flex-col gap-1" aria-expanded="false" aria-label="Toggle sidebar">
            <span class="w-6 h-1 bg-black rounded"></span>
            <span class="w-6 h-1 bg-black rounded"></span>
            <span class="w-6 h-1 bg-black rounded"></span>
        </button>
        <div class="flex items-center gap-4">
            <button class="w-[31px] h-[31px] text-gray-800 dark:text-black rounded-full focus:outline-none focus:ring-2 focus:ring-purple-400" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-full h-full">
                    <path fill-rule="evenodd" d="M12 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8Zm-2 9a4 4 0 0 0-4 4v1a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2v-1a4 4 0 0 0-4-4h-4Z" clip-rule="evenodd"/>
                </svg>
            </button>
            <div id="userDropdown" class="z-10 hidden bg-lavender divide-y divide-gray-100 rounded-lg shadow w-44 ">
                <div class="py-1">
                    <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-black">iniciar seccion</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 h-full w-64 bg-lavender shadow-md sidebar-transition transform -translate-x-full z-50">
        <button id="close-menu" class="text-2xl text-black p-4" aria-label="Close sidebar">&times;</button>
        <ul class="mt-4 space-y-2">
            <!-- Inicio -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('users.inicio') }}" class="ml-3">Inicio</a>
            </li>
            <!-- Ventas -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('users.ventas') }}" class="ml-3">Ventas</a>
            </li>
            <!-- Inventario -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('users.inventario') }}" class="ml-3">Inventario</a>
            </li>
            <!-- iniciar -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"/>
                </svg>
                <a href="{{ route('login') }}" class="ml-3"> Iniciar sesión</a>
            </li>
        </ul>
    </div>

    <!-- Contenido dinámico -->
    <main class="p-6">
        @yield('content')
    </main>

    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);
            sidebar.classList.toggle('-translate-x-full');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            menuToggle.setAttribute('aria-expanded', 'false');
        });
    </script>
</body>
</html>
