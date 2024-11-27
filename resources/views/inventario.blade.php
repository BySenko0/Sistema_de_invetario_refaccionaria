<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            background-color: #E6E6FA; /* Fondo general lavanda */
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow-x: hidden;
        }

        /* Barra superior */
        .navbar {
            background-color: #E6E6FA; /* Lavanda */
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            height: 60px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .menu-icon {
            cursor: pointer;
            display: flex;
            flex-direction: column;
            gap: 0.2rem;
        }

        .menu-icon span {
            display: block;
            width: 22px;
            height: 3px;
            background-color: #000;
            border-radius: 2px;
        }

        .search-bar-container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .search-bar-container input {
            flex-grow: 1;
            border: none;
            border-radius: 20px;
            padding: 0.5rem 1rem;
            outline: none;
        }

        .icon-container i {
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100vh;
            background-color: #E6E6FA; /* Lavanda */
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            transition: left 0.3s ease-in-out;
        }

        .sidebar.open {
            left: 0; /* Muestra el menú lateral */
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            padding: 15px 20px;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar ul li i {
            font-size: 1.2rem;
            color: #333;
        }

        .sidebar ul li span {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
        }

        .close-btn {
            display: flex;
            justify-content: flex-end;
            padding: 10px;
            font-size: 1.5rem;
            cursor: pointer;
        }

        /* Contenido principal */
        .content {
            padding: 1rem;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 95%;
            margin: 1rem auto;
        }

        .content h1 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        table thead {
            background-color: #E6E6FA; /* Lavanda */
        }

        table th, table td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: center;
        }

        table th {
            font-weight: bold;
        }

        table img {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
        }

        .warning {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar">
        <div class="menu-icon" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="search-bar-container">
            <input type="text" id="search-bar" placeholder="Buscar en inventario...">
            <div class="icon-container">
                <i class="bi bi-cart"></i>
                <i class="bi bi-person-circle"></i>
            </div>
        </div>
    </nav>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="close-btn" id="close-menu">&times;</div>
        <ul>
            <li>
                <i class="bi bi-box"></i>
                <span>Ventas</span>
            </li>
            <li>
                <i class="bi bi-archive"></i>
                <span>Inventario</span>
            </li>
            <li>
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </li>
        </ul>
    </div>

    <!-- Contenido principal -->
    <main class="content">
        <h1>Inventario</h1>
        <table id="product-table">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>SKU</th>
                    <th>Category</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>In Stock</th>
                    <th>Min. Reserve</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>4534657</td>
                    <td>9488935</td>
                    <td>Tires</td>
                    <td><img src="https://via.placeholder.com/50" alt="Product 1"></td>
                    <td>155/80R13 NOKIAN</td>
                    <td>20</td>
                    <td>10</td>
                    <td>160</td>
                </tr>
                <tr>
                    <td>6573546</td>
                    <td>493859893</td>
                    <td>Tires</td>
                    <td><img src="https://via.placeholder.com/50" alt="Product 2"></td>
                    <td>175/65R14 CONTINENTAL</td>
                    <td class="warning">14</td>
                    <td>16</td>
                    <td>200</td>
                </tr>
                <tr>
                    <td>493859893</td>
                    <td>493859893</td>
                    <td>Tires</td>
                    <td><img src="https://via.placeholder.com/50" alt="Product 3"></td>
                    <td>175/70R13 NOKIAN SX2</td>
                    <td>24</td>
                    <td>10</td>
                    <td>260</td>
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
            sidebar.classList.add('open');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.remove('open');
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
