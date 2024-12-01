@extends('layouts.menubar')

@section('title', 'Inventario')

@section('content')
<main class="p-4 max-w-7xl mx-auto bg-white shadow-md rounded-lg mt-6">
    <h1 class="text-xl font-bold mb-4">Inventario</h1>
    <!-- Mensajes globales -->
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Éxito!</strong>
        <span class="block sm:inline">{{ session('success') }}</span>
        <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="this.parentElement.style.display='none';">
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M14.348 14.849a1 1 0 01-1.414 0L10 11.415l-2.934 2.935a1 1 0 11-1.414-1.414L8.585 10 5.651 7.066a1 1 0 111.414-1.414L10 8.585l2.934-2.935a1 1 0 011.414 1.414L11.415 10l2.934 2.934a1 1 0 010 1.415z"/></svg>
        </span>
    </div>
    @endif
    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
        <strong class="font-bold">¡Error!</strong>
        <span class="block sm:inline">Hay problemas con los datos ingresados.</span>
    </div>
    @endif

    <!-- Botón para abrir el modal -->
    <button type="button" data-modal-target="addModal" data-modal-toggle="addModal" 
    class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-4 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
    Agregar Nuevo Producto
    </button>

    <table class="table-auto w-full border-collapse border-gray-300">
    <thead class="bg-[#E6E6FA]">
        <tr>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">#</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Nombre</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Descripción</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Categoria</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Precio</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100">Stock</th>
            <th class="border border-gray-300 px-4 py-2 text-center text-gray-700 font-medium bg-gray-100"></th>
        </tr>
    </thead>
    <tbody class="hover:bg-gray-100">
    @foreach ($productos as $producto)
        <tr>
            <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->nombre }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->descripcion }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->categoria->nombre }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">${{ $producto->precio }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">{{ $producto->stock }}</td>
            <td class="border border-gray-300 px-4 py-2 text-center">

                <!-- Botón para abrir el modal -->
                <button type="button" data-modal-toggle="editModal-{{ $producto->id }}"
                        class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Editar
                </button>

                <!-- Botón para abrir el modal de eliminación -->
                <button type="button" data-modal-toggle="deleteModal-{{ $producto->id }}"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Eliminar
                </button>

                <!-- Modal de Edición -->
                <div id="editModal-{{ $producto->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                            <div class="flex justify-between items-center bg-blue-500 text-white p-4 rounded-t-lg">
                                <h3 class="text-lg font-semibold">Modificar Producto</h3>
                                <button type="button" class="text-white hover:text-gray-200" data-modal-hide="editModal-{{ $producto->id }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Formulario de Edición -->
                            <form method="POST" action="{{ route('productos.update', $producto->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="p-6 space-y-4">
                                    <div>
                                        <label for="nombre_edit" class="block text-sm font-medium text-gray-700">Nombre</label>
                                        <input type="text" name="nombre" value="{{ $producto->nombre }}"
                                               class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                                    </div>
                                    <div>
                                        <label for="descripcion_edit" class="block text-sm font-medium text-gray-700">Descripción</label>
                                        <textarea name="descripcion" rows="3" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">{{ $producto->descripcion }}</textarea>
                                    </div>
                                    <div>
                                        <label for="categoria_edit" class="block text-sm font-medium text-gray-700">Categoria</label>
                                        <select name="categoria_id" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                                            @foreach ($categorias as $categoria)
                                                <option value="{{ $categoria->id }}" @if ($producto->categoria_id == $categoria->id) selected @endif>{{ $categoria->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label for="precio_edit" class="block text-sm font-medium text-gray-700">Precio</label>
                                        <input type="number" name="precio" step="0.01" value="{{ $producto->precio }}"
                                               class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                                    </div>
                                    <div>
                                        <label for="stock_edit" class="block text-sm font-medium text-gray-700">Stock</label>
                                        <input type="number" name="stock" value="{{ $producto->stock }}"
                                               class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                                    </div>
                                </div>
                                <div class="flex justify-end space-x-2 p-6 border-t border-gray-200 rounded-b">
                                    <button type="button" data-modal-hide="editModal-{{ $producto->id }}"
                                            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">Cancelar</button>
                                    <button type="submit"
                                            class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal de Eliminación -->
                <div id="deleteModal-{{ $producto->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4">
                        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                            <!-- Modal Header -->
                            <div class="flex justify-between items-center bg-red-500 text-white p-4 rounded-t-lg">
                                <h3 class="text-lg font-semibold">Eliminar Producto</h3>
                                <button type="button" class="text-white hover:text-gray-200" data-modal-hide="deleteModal-{{ $producto->id }}">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="p-6">
                                <p class="text-gray-700">¿Estás seguro de que deseas eliminar el producto <strong>{{ $producto->nombre }}</strong>? Esta acción no se puede deshacer.</p>
                            </div>

                            <!-- Modal Footer -->
                            <form method="POST" action="{{ route('productos.destroy', $producto->id) }}">
                                @csrf
                                @method('DELETE')
                                <div class="flex justify-end space-x-2 p-6 border-t border-gray-200 rounded-b">
                                    <button type="button" data-modal-hide="deleteModal-{{ $producto->id }}"
                                            class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">
                                        Cancelar
                                    </button>
                                    <button type="submit"
                                            class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:ring focus:ring-red-300">
                                        Eliminar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </td>
        </tr>
    @endforeach
    </tbody>
    </table>
</main>
<!-- Modal para agregar nuevo producto -->
<div id="addModal" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-blue-500 text-white p-4 rounded-t-lg">
                <h3 class="text-lg font-semibold">Agregar Nuevo Producto</h3>
                <button type="button" class="text-white hover:text-gray-200" data-modal-toggle="addModal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <form method="POST" action="{{ route('productos.store') }}" class="p-6 space-y-4">
                @csrf
                
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ejemplo: Smartphone" value="{{ old('nombre') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('nombre') border-red-500 @enderror">
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Descripción -->
                <div>
                    <label for="descripcion" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" placeholder="Escribe una descripción del producto"
                              class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoria -->
                <div>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="form-select">
                        <option value="">Selecciona una categoría</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}" @if (old('categoria_id') == $categoria->id) selected @endif>
                                {{ $categoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Precio -->
                <div>
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="number" name="precio" id="precio" step="0.01" placeholder="Ejemplo: 1500.00" value="{{ old('precio') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('precio') border-red-500 @enderror" required>
                    @error('precio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Stock -->
                <div>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" placeholder="Ejemplo: 100" value="{{ old('stock') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('stock') border-red-500 @enderror" required>
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Footer -->
                <div class="flex justify-end space-x-2">
                    <button type="button" data-modal-toggle="addModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">Cancelar</button>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection