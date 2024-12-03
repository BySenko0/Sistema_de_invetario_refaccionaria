<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <div class="px-4 py-3 text-sm text-gray-900 dark:text-black">
                    <div>Administrador</div>
                </div>
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="avatarButton">
                    <li><a href="#" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-black">Configuración</a></li>
                </ul>
                <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-black">
        Cerrar sesión
    </button>
</form>
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
                <a href="{{ route('admin.inicio') }}" class="ml-3">Inicio</a>
            </li>
            <!-- Ventas -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a1 1 0 0 1 1-1h1.5a1 1 0 0 1 .979.796L7.939 6H19a1 1 0 0 1 .979 1.204l-1.25 6a1 1 0 0 1-.979.796H9.605l.208 1H17a3 3 0 1 1-2.83 2h-2.34a3 3 0 1 1-4.009-1.76L5.686 5H5a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('admin.ventas') }}" class="ml-3">Ventas</a>
            </li>
            <!-- Inventario -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 6a2 2 0 0 1 2-2h5.532a2 2 0 0 1 1.536.72l1.9 2.28H3V6Zm0 3v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Z" clip-rule="evenodd"/>
                </svg>
                <a href="{{ route('admin.inventario') }}" class="ml-3">Inventario</a>
            </li>
            <!-- Proveedores -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 12c.263 0 .524-.06.767-.175a2 2 0 0 0 .65-.491c.186-.21.333-.46.433-.734.1-.274.15-.568.15-.864a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 12 9.736a2.4 2.4 0 0 0 .586 1.591c.375.422.884.659 1.414.659.53 0 1.04-.237 1.414-.659A2.4 2.4 0 0 0 16 9.736c0 .295.052.588.152.861s.248.521.434.73a2 2 0 0 0 .649.488 1.809 1.809 0 0 0 1.53 0 2.03 2.03 0 0 0 .65-.488c.185-.209.332-.457.433-.73.1-.273.152-.566.152-.861 0-.974-1.108-3.85-1.618-5.121A.983.983 0 0 0 17.466 4H6.456a.986.986 0 0 0-.93.645C5.045 5.962 4 8.905 4 9.736c.023.59.241 1.148.611 1.567.37.418.865.667 1.389.697Zm0 0c.328 0 .651-.091.94-.266A2.1 2.1 0 0 0 7.66 11h.681a2.1 2.1 0 0 0 .718.734c.29.175.613.266.942.266.328 0 .651-.091.94-.266.29-.174.537-.427.719-.734h.681a2.1 2.1 0 0 0 .719.734c.289.175.612.266.94.266.329 0 .652-.091.942-.266.29-.174.536-.427.718-.734h.681c.183.307.43.56.719.734.29.174.613.266.941.266a1.819 1.819 0 0 0 1.06-.351M6 12a1.766 1.766 0 0 1-1.163-.476M5 12v7a1 1 0 0 0 1 1h2v-5h3v5h7a1 1 0 0 0 1-1v-7m-5 3v2h2v-2h-2Z"/>
                </svg>
                <a href="{{ route('admin.proveedor') }}" class="ml-3">Proveedores</a>
            </li>
            <!-- Cerrar sesión -->
            <li class="p-4 flex items-center hover:bg-purple-300 cursor-pointer">
                <svg class="w-6 h-6 text-gray-800 dark:text-black" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9h13a5 5 0 0 1 0 10H7M3 9l4-4M3 9l4 4"/>
                </svg>
                <span class="ml-3">Cerrar sesión</span>
            </li>
        </ul>
    </div>

    <div class="ml-15 p-3">
        @yield('content') <!-- Aquí se inyectará el contenido dinámico -->
    </div>
     

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
