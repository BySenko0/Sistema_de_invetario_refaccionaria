<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function inicio()
    {
        return view('users.inicio'); // Vista: resources/views/User/usuario.blade.php
    }

    public function ventas()
    {
        return view('users.ventas'); // Vista: resources/views/User/ventas.blade.php
    }

    public function inventario()
    {
        return view('users.inventario'); // Vista: resources/views/User/pruebas.blade.php
    }
}
