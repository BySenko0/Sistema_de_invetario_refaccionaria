<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventario</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#E6E6FA] font-sans h-screen overflow-hidden">

    <!-- Barra de navegación -->
    <nav class="flex items-center justify-between bg-[#E6E6FA] shadow-md px-4 py-3">
        <div id="menu-toggle" class="menu-icon flex flex-col gap-1 cursor-pointer">
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
            <span class="block w-6 h-1 bg-black rounded"></span>
        </div>
        <div class="flex-grow flex items-center gap-4 ml-4">
            <input type="text" id="search-bar" placeholder="Buscar en inventario..."
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
    <div id="sidebar" class="fixed top-0 left-[-250px] w-[250px] h-full bg-[#E6E6FA] shadow-lg transition-all duration-300">
        <div id="close-menu" class="text-right p-2 text-2xl cursor-pointer text-gray-700">&times;</div>
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
        <h1 class="text-xl font-bold mb-4">Inventario</h1>
        <table class="table-auto w-full border-collapse">
            <thead class="bg-[#E6E6FA]">
                <tr>
                    <th class="border px-4 py-2">Code</th>
                    <th class="border px-4 py-2">SKU</th>
                    <th class="border px-4 py-2">Category</th>
                    <th class="border px-4 py-2">Image</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">In Stock</th>
                    <th class="border px-4 py-2">Min. Reserve</th>
                    <th class="border px-4 py-2">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border px-4 py-2">4534657</td>
                    <td class="border px-4 py-2">9488935</td>
                    <td class="border px-4 py-2">Tires</td>
                    <td class="border px-4 py-2"><img src="https://via.placeholder.com/50" alt="Product 1" class="w-12 h-12"></td>
                    <td class="border px-4 py-2">155/80R13 NOKIAN</td>
                    <td class="border px-4 py-2">20</td>
                    <td class="border px-4 py-2">10</td>
                    <td class="border px-4 py-2">$160</td>
                </tr>
                <tr>
                    <td class="border px-4 py-2">6573546</td>
                    <td class="border px-4 py-2">493859893</td>
                    <td class="border px-4 py-2">Tires</td>
                    <td class="border px-4 py-2"><img src="https://via.placeholder.com/50" alt="Product 2" class="w-12 h-12"></td>
                    <td class="border px-4 py-2">175/65R14 CONTINENTAL</td>
                    <td class="border px-4 py-2 text-red-500 font-bold">14</td>
                    <td class="border px-4 py-2">16</td>
                    <td class="border px-4 py-2">$200</td>
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
            sidebar.style.left = '0';
        });

        closeMenu.addEventListener('click', () => {
            sidebar.style.left = '-250px';
        });
    </script>
</body>
</html>
