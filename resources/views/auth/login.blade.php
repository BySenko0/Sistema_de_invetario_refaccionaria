<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refaccionaria Olvera - Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            background-color: #e6e6fa; /* Fondo rosa claro */
        }
        .header-title {
            font-size: 5rem; /* Tamaño más grande */
            font-weight: bold; /* Negritas */
            color: #000; /* Color negro */
            text-shadow: 4px 4px 8px rgba(0, 0, 0, 0.4); /* Sombra detrás de las letras */
            margin-bottom: 2.5rem; /* Mayor separación del formulario */
            text-align: center;
            letter-spacing: 2px; /* Espaciado entre letras */
        }
        .login-box {
            background-color: #fff;
            padding: 3rem; /* Más espacio interno */
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); /* Sombra más pronunciada */
            border: 2px solid #000; /* Contorno negro */
            width: 100%;
            max-width: 500px; /* Más ancho */
        }
        .login-box h1 {
            font-size: 2.5rem; /* Más grande dentro del formulario */
            font-weight: bold;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #000; /* Color negro */
        }
        .btn-login {
            background-color: #0d6efd;
            color: white;
            border-radius: 30px;
            font-weight: bold;
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Título principal fuera del formulario -->
    <div class="header-title">Refaccionaria Olvera</div>
    
    <!-- Caja del formulario de login -->
    <div class="login-box">
        <h1>Administrador</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Usuario</label>
                <input type="text" id="username" name="username" class="form-control" placeholder="Ingresa tu usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Ingresar</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>