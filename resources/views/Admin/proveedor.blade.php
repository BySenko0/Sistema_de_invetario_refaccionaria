@extends('layouts.menubar')

@section('title', 'Proveedor')

@section('content')
<main class="p-4 max-w-7xl mx-auto bg-white shadow-md rounded-lg mt-6">
    <h1 class="text-xl font-bold mb-4">Proveedores</h1>

    <!-- Mensajes de éxito y errores -->
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">¡Error!</strong>
            <span class="block sm:inline">Hay problemas con los datos ingresados.</span>
        </div>
    @endif

    <!-- Botón para abrir el modal de agregar -->
    <button type="button" data-modal-target="addModal" data-modal-toggle="addModal"
        class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-4">
        Agregar Nuevo Proveedor
    </button>

    <!-- Tabla de proveedores -->
    <table class="table-auto w-full border-collapse border-gray-300">
        <thead class="bg-[#E6E6FA]">
            <tr>
                <th class="border border-gray-300 px-4 py-2 text-center">#</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Nombre</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Nombre de Contacto</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Correo</th>
                <th class="border border-gray-300 px-4 py-2 text-center">Teléfono</th>
                <th class="border border-gray-300 px-4 py-2 text-center"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $proveedor)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $loop->iteration }}</td>
                <td class="border px-4 py-2 text-center">{{ $proveedor->nombre }}</td>
                <td class="border px-4 py-2 text-center">{{ $proveedor->nombre_contacto }}</td>
                <td class="border px-4 py-2 text-center">{{ $proveedor->correo_contacto }}</td>
                <td class="border px-4 py-2 text-center">{{ $proveedor->telefono }}</td>
                <td class="border px-4 py-2 text-center">
                <!-- Botón para editar -->
                <button type="button" data-modal-toggle="editModal-{{ $proveedor->id }}"
                    class="text-white bg-blue-600 hover:bg-blue-700 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">
                    Editar
                </button>

                <!-- Botón para eliminar -->
                <button type="button" data-modal-toggle="deleteModal-{{ $proveedor->id }}"
                    class="text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2">
                    Eliminar
                </button>

                <!-- Modal de Edición -->
                <div id="editModal-{{ $proveedor->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                        <div class="flex justify-between items-center bg-blue-500 text-white p-4 rounded-t-lg">
                        <h3 class="text-lg font-semibold">Modificar Proveedor</h3>
                        <button type="button" class="text-white hover:text-gray-200" data-modal-hide="editModal-{{ $proveedor->id }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        </div>

                        <!-- Formulario de Edición -->
                        <form method="POST" action="{{ route('proveedor.update', $proveedor->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="p-6 space-y-4">
                            <div>
                            <label for="nombre_edit" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
                            <input type="text" name="nombre" value="{{ $proveedor->nombre }}"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                            </div>
                            <div>
                            <label for="nombre_contacto_edit" class="block text-sm font-medium text-gray-700">Nombre del Contacto</label>
                            <input type="text" name="nombre_contacto" value="{{ $proveedor->nombre_contacto }}"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                            </div>
                            <div>
                            <label for="correo_contacto_edit" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                            <input type="email" name="correo_contacto" value="{{ $proveedor->correo_contacto }}"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                            </div>
                            <div>
                            <label for="telefono_edit" class="block text-sm font-medium text-gray-700">Teléfono</label>
                            <input type="text" name="telefono" value="{{ $proveedor->telefono }}"
                                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500" required>
                            </div>
                            <div>
                            <label for="activo_edit" class="block text-sm font-medium text-gray-700">Activo</label>
                            <select name="activo" class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500">
                                <option value="1" {{ $proveedor->activo ? 'selected' : '' }}>Sí</option>
                                <option value="0" {{ !$proveedor->activo ? 'selected' : '' }}>No</option>
                            </select>
                            </div>
                        </div>
                        <div class="flex justify-end space-x-2 p-6 border-t border-gray-200 rounded-b">
                            <button type="button" data-modal-hide="editModal-{{ $proveedor->id }}"
                                class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:ring focus:ring-gray-300">Cancelar</button>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 focus:ring focus:ring-blue-300">Guardar Cambios</button>
                        </div>
                        </form>
                    </div>
                    </div>
                </div>

                <!-- Modal de Eliminación -->
                <div id="deleteModal-{{ $proveedor->id }}" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
                    <div class="flex items-center justify-center min-h-screen px-4">
                    <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
                        <!-- Modal Header -->
                        <div class="flex justify-between items-center bg-red-500 text-white p-4 rounded-t-lg">
                        <h3 class="text-lg font-semibold">Eliminar Proveedor</h3>
                        <button type="button" class="text-white hover:text-gray-200" data-modal-hide="deleteModal-{{ $proveedor->id }}">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                        </div>

                        <!-- Modal Body -->
                        <div class="p-6">
                        <p class="text-gray-700">¿Estás seguro de que deseas eliminar al proveedor <strong>{{ $proveedor->nombre }}</strong>? Esta acción no se puede deshacer.</p>
                        </div>

                        <!-- Modal Footer -->
                        <form method="POST" action="{{ route('proveedor.destroy', $proveedor->id) }}">
                        @csrf
                        @method('DELETE')
                        <div class="flex justify-end space-x-2 p-6 border-t border-gray-200 rounded-b">
                            <button type="button" data-modal-hide="deleteModal-{{ $proveedor->id }}"
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
<!-- Modal de Agregar Proveedores -->
<div id="addModal" tabindex="-1" class="hidden fixed inset-0 z-50 overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-lg">
            <!-- Modal Header -->
            <div class="flex justify-between items-center bg-blue-500 text-white p-4 rounded-t-lg">
                <h3 class="text-lg font-semibold">Agregar Nuevo Proveedor</h3>
                <button type="button" class="text-white hover:text-gray-200" data-modal-toggle="addModal">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Modal Body -->
            <form method="POST" action="{{ route('proveedor.store') }}" class="p-6 space-y-4">
                @csrf
                
                <!-- Nombre -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Proveedor</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Ejemplo: Distribuidora Norte" value="{{ old('nombre') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('nombre') border-red-500 @enderror" required>
                    @error('nombre')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nombre del Contacto -->
                <div>
                    <label for="nombre_contacto" class="block text-sm font-medium text-gray-700">Nombre del Contacto</label>
                    <input type="text" name="nombre_contacto" id="nombre_contacto" placeholder="Ejemplo: Juan Pérez" value="{{ old('nombre_contacto') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('nombre_contacto') border-red-500 @enderror" required>
                    @error('nombre_contacto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Correo Electrónico -->
                <div>
                    <label for="correo_contacto" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="correo_contacto" id="correo_contacto" placeholder="Ejemplo: contacto@proveedor.com" value="{{ old('correo_contacto') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('correo_contacto') border-red-500 @enderror" required>
                    @error('correo_contacto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Teléfono -->
                <div>
                    <label for="telefono" class="block text-sm font-medium text-gray-700">Teléfono</label>
                    <input type="text" name="telefono" id="telefono" placeholder="Ejemplo: 55 1234 5678" value="{{ old('telefono') }}"
                           class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 focus:border-blue-500 @error('telefono') border-red-500 @enderror" required>
                    @error('telefono')
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