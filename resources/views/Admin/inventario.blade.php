@extends('layouts.menubar')

@section('title', 'Vista de Pruebas')

@section('content')


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

@endsection