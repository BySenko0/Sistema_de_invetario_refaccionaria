<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('Admin.inicio'); // Vista: resources/views/Admin/dashboard.blade.php
    }

    public function inventario()
    {
        return view('Admin.inventario'); // Vista: resources/views/Admin/inventario.blade.php
    }

    public function ventas()
    {
        return view('Admin.ventas'); // Vista: resources/views/Admin/ventas.blade.php
    }

    public function proveedor()
    {
        return view('Admin.proveedor'); // Vista: resources/views/Admin/proveedor.blade.php
    }
}
