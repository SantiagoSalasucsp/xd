<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Datos en Aeropuerto</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Estilo para el cuerpo */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Estilo para la cabecera */
        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        /* Estilo para el contenido principal */
        main {
            padding: 20px;
            margin-left: 270px; /* Ajusta según el ancho del nav */
        }

        /* Estilo para el pie de página */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Estilo para los modales */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Estilos para los formularios */
        form {
            max-width: 300px;
            margin: 0 auto;
        }

        form label {
            display: block;
            margin-bottom: 5px;
        }

        form input[type="text"],
        form input[type="password"],
        form input[type="email"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        form input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        /* Estilos para la navegación */
        nav {
            background-color: #444;
            color: #fff;
            padding: 10px 20px;
            width: 250px;
            position: fixed;
            top: 60px;
            bottom: 40px;
            left: 0; /* Posiciona el menú a la izquierda */
            overflow-y: auto;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            margin-bottom: 10px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 8px 16px;
            border-radius: 4px;
        }

        nav ul li a:hover {
            background-color: #555;
        }

        /* Estilos adicionales */
        .auth-buttons {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Insertar Datos en Aeropuerto</h1>
        <div class="auth-buttons">
            <button onclick="openModal('loginModal')">Log In</button>
            <button onclick="openModal('signInModal')">Sign In</button>
        </div>
    </header>

    <nav>
        <ul>
            <li><a href="sucursales.php"><i class="fas fa-building"></i> Insertar Sucursal</a></li>
            <li><a href="insert_destino.html"><i class="fas fa-plane"></i> Insertar Destino</a></li>
            <li><a href="insert_piloto.html"><i class="fas fa-user-tie"></i> Insertar Piloto</a></li>
            <li><a href="insert_vuelo.html"><i class="fas fa-plane-departure"></i> Insertar Vuelo</a></li>
            <li><a href="insert_cliente.html"><i class="fas fa-user"></i> Insertar Cliente</a></li>
            <li><a href="insert_equipaje.html"><i class="fas fa-suitcase"></i> Insertar Equipaje</a></li>
            <li><a href="insert_denegado.html"><i class="fas fa-ban"></i> Insertar Denegado</a></li>
            <li><a href="insert_tiempo.html"><i class="fas fa-clock"></i> Insertar Tiempo</a></li>
            <li><a href="insert_personal.html"><i class="fas fa-users"></i> Insertar Personal</a></li>
            <li><a href="insert_compensacion.html"><i class="fas fa-hand-holding-usd"></i> Insertar Compensación</a></li>
            <li><a href="insert_avion.html"><i class="fas fa-fighter-jet"></i> Insertar Avión</a></li>
            <li><a href="insert_gerente.html"><i class="fas fa-user-tie"></i> Insertar Gerente</a></li>
            <li><a href="insert_tipo_equipaje.html"><i class="fas fa-suitcase-rolling"></i> Insertar Tipo de Equipaje</a></li>
            <li><a href="insert_puede_ser.html"><i class="fas fa-exchange-alt"></i> Insertar Relación Cliente Denegado</a></li>
            <li><a href="insert_salario_piloto.html"><i class="fas fa-dollar-sign"></i> Insertar Salario de Piloto</a></li>
        </ul>
    </nav>

    <main>
        <h2>¡Bienvenido al Aeropuerto!</h2>
        <p>Aquí podrás insertar datos relacionados con la gestión del aeropuerto.</p>
        <!-- Aquí se inserta la imagen "guts.jpg" desde tu escritorio -->
        <img src="C:\xampp\htdocs\bd\img\guts.jpg" alt="Imagen Guts" style="max-width: 60%; height: auto; display: block; margin: 0px auto;">
    </main>

    <footer>
        <p>&copy; 2024 Aeropuerto. Todos los derechos reservados.</p>
    </footer>

    <!-- Modal para Log In -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <form id="loginForm" action="login.php" method="post">
                <h2>Log In</h2>
                <label for="loginUsername">Username:</label>
                <input type="text" id="loginUsername" name="loginUsername" required>
                <label for="loginPassword">Password:</label>
                <input type="password" id="loginPassword" name="loginPassword" required>
                <input type="submit" value="Log In">
            </form>
        </div>
    </div>

    <!-- Modal para Sign In -->
    <div id="signInModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('signInModal')">&times;</span>
            <form id="signInForm" action="signin.php" method="post">
                <h2>Sign In</h2>
                <label for="signInUsername">Username:</label>
                <input type="text" id="signInUsername" name="signInUsername" required>
                <label for="signInPassword">Password:</label>
                <input type="password" id="signInPassword" name="signInPassword" required>
                <label for="signInEmail">Email:</label>
                <input type="email" id="signInEmail" name="signInEmail" required>
                <input type="submit" value="Sign In">
            </form>
        </div>
    </div>

    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
    </script>
</body>
</html>
