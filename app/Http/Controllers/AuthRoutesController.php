<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthRoutesController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Asegúrate de que esta vista exista en resources/views/auth/login.blade.php
    }

    public function login(Request $request)
    {
        // Validar los datos enviados
        $credentials = $request->only('email', 'password');

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            // Redirige al dashboard del administrador
            return redirect()->route('admin.inicio');
        }

        // Si falla, redirige de vuelta con un error
        return redirect()->route('login')->withErrors([
            'error' => 'Credenciales incorrectas, intente nuevamente.',
        ]);
    }
}
