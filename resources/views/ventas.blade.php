<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Ventas</title>
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

        /* Estilo para los detalles de ventas */
        .sales-details {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .sales-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 0.5rem;
            background-color: #f9f9f9;
        }

        .sales-item img {
            max-width: 50px;
            max-height: 50px;
            object-fit: cover;
            margin-right: 1rem;
        }

        .sales-item .details {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .sales-item .details span {
            font-size: 0.9rem;
            color: #333;
        }

        .sales-item .price {
            font-weight: bold;
            color: #333;
        }

        .total-container {
            margin-top: 1rem;
            font-size: 1.2rem;
            font-weight: bold;
            text-align: right;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 1rem;
        }

        .btn-container button {
            width: 48%;
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
            <input type="text" id="search-bar" placeholder="Buscar en ventas...">
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
        <h1>Ventas</h1>

        <div class="sales-details">
            <!-- Producto vendido 1 -->
            <div class="sales-item">
                <img src="https://via.placeholder.com/50" alt="Producto 1">
                <div class="details">
                    <span>Producto: 155/80R13 NOKIAN</span>
                    <span>Cantidad Vendida: 5</span>
                    <span>Fecha de Venta: 2024-11-25</span>
                </div>
                <span class="price">$160</span>
            </div>

            <!-- Producto vendido 2 -->
            <div class="sales-item">
                <img src="https://via.placeholder.com/50" alt="Producto 2">
                <div class="details">
                    <span>Producto: 175/65R14 CONTINENTAL</span>
                    <span>Cantidad Vendida: 3</span>
                    <span>Fecha de Venta: 2024-11-24</span>
                </div>
                <span class="price">$200</span>
            </div>
        </div>

        <!-- Total de la venta -->
        <div class="total-container">
            Total de la Venta: $<span id="total-venta">0.00</span>
        </div>

        <!-- Botones -->
        <div class="btn-container">
            <button class="btn btn-primary" id="realizar-venta-btn" data-bs-toggle="modal" data-bs-target="#confirmarVentaModal">Realizar Venta</button>
            <button class="btn btn-danger" id="cancelar-venta-btn">Cancelar Venta</button>
        </div>
    </main>

    <!-- Modal de Confirmación -->
    <div class="modal fade" id="confirmarVentaModal" tabindex="-1" aria-labelledby="confirmarVentaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmarVentaLabel">Confirmar Venta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    ¿Estás seguro de que deseas realizar esta venta?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmar-venta">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Calcular el total de la venta al cargar
        function calcularTotal() {
            const precios = document.querySelectorAll('.sales-item .price');
            let total = 0;
            precios.forEach(precio => {
                total += parseFloat(precio.textContent.replace('$', ''));
            });
            document.getElementById('total-venta').textContent = total.toFixed(2);
        }

        // Cancelar la venta
        document.getElementById('cancelar-venta-btn').addEventListener('click', () => {
            alert('Venta cancelada. Todos los productos han sido eliminados.');
            const salesDetails = document.querySelector('.sales-details');
            salesDetails.innerHTML = ''; // Elimina los productos
            document.getElementById('total-venta').textContent = '0.00'; // Reinicia el total
        });

        // Confirmar la venta
        document.getElementById('confirmar-venta').addEventListener('click', () => {
            alert('Venta realizada exitosamente.');
            const modal = bootstrap.Modal.getInstance(document.getElementById('confirmarVentaModal'));
            modal.hide(); // Cierra el modal
        });

        // Abrir y cerrar el menú lateral
        const menuToggle = document.getElementById('menu-toggle');
        const closeMenu = document.getElementById('close-menu');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.add('open');
        });

        closeMenu.addEventListener('click', () => {
            sidebar.classList.remove('open');
        });

        // Calcular el total al cargar la página
        calcularTotal();
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
