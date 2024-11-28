<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refaccionaria Olvera - Administrador</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex flex-col items-center justify-center h-screen bg-[#e6e6fa]">

    <!-- Título principal -->
    <div class="text-center mb-10">
        <h1 class="text-7xl font-bold text-black drop-shadow-lg tracking-wide mb-10">
            Refaccionaria Olvera
        </h1>
    </div>
    
    <!-- Caja del formulario -->
    <div class="bg-white p-12 rounded-xl shadow-2xl border-2 border-black max-w-lg w-full">
        <h1 class="text-4xl font-bold text-center mb-6 text-black">Administrador</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Campo Usuario -->
            <div class="mb-6">
                <label for="username" class="block font-bold text-lg text-black mb-2">Usuario</label>
                <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ingresa tu usuario" required>
            </div>
            <!-- Campo Contraseña -->
            <div class="mb-6">
                <label for="password" class="block font-bold text-lg text-black mb-2">Contraseña</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" placeholder="Ingresa tu contraseña" required>
            </div>
            <!-- Botón de Ingresar -->
            <button type="submit" class="w-full bg-blue-500 text-white rounded-full py-3 text-lg font-bold hover:bg-blue-700 hover:scale-105 transition-all">
                Ingresar
            </button>
        </form>
    </div>

</body>
</html>
