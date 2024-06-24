<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aeropuerto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://example.com/aeropuerto-fondo.jpg'); /* Cambia esta URL por una imagen adecuada */
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
        }

        .container {
            display: flex;
            flex-grow: 1;
            overflow: hidden;
        }

        .sidebar-left {
            background-color: #444;
            color: #fff;
            padding: 10px;
            width: 250px;
            min-height: 100%;
            overflow-y: auto;
        }

        .sidebar-right {
            background-color: #555;
            color: #fff;
            padding: 10px;
            width: 250px;
            min-height: 100%;
            overflow-y: auto;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
            overflow-y: auto;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .sidebar-left a,
        .sidebar-right a {
            color: #fff;
            text-decoration: none;
            display: block;
            margin-bottom: 10px;
        }

        .sidebar-left a:hover,
        .sidebar-right a:hover {
            background-color: #666;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <header>
        <h1>Aeropuerto</h1>
    </header>

    <div class="container">
        <div class="sidebar-left">
            <h2>Agregar</h2>
            <nav>
                <ul>
                    <li><a href="agregar.php">Nuevo pasajero</a></li>
                    <li><a href="agregar_destino.php">Agregar Destino</a></li>
                    <li><a href="agregar_piloto.php">Agregar Piloto</a></li>
                    <li><a href="agregar_Personal.php">Agregar Personal</a></li>
                    <li><a href="agregar_gerente.php">Agregar Gerente</a></li>
                    <li><a href="agregar_Equipaje.php">Agregar Equipaje</a></li>
                    <li><a href="agregar_compensacion.php">Agregar compensacion</a></li>
                    <li><a href="agregar_vuelo.php">Agregar vuelo</a></li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <h2>Bienvenido</h2>
            <p>Seleccione una opción en el menú de la izquierda para agregar datos o en el menú de la derecha para ver los registros.</p>
        </div>

        <div class="sidebar-right">
            <h2>Consultar</h2>
            <nav>
                <ul>
                    <li><a href="ver_clientes.php">Ver Clientes</a></li>
                    <li><a href="destinos.php">Ver Destinos</a></li>
                    <li><a href="gerentes.php">Ver Gerentes</a></li>
                    <li><a href="equipaje.php">Ver Equipaje</a></li>
                    <li><a href="sucursales.php">Ver Sucursales</a></li>
                    <li><a href="vuelos.php">Ver Vuelos</a></li>
                    <li><a href="Denegados.php">Ver Denegados</a></li>
                    <li><a href="modelo-aeropuerto.php">Ver Modelos de Aeropuerto</a></li>
                    <li><a href="pilotos.php">Ver Pilotos</a></li>
                    <li><a href="Ver_Personal.php">Ver Personal</a></li>
                    <li><a href="Ver_Gerente.php">Ver Gerente</a></li>
                    <li><a href="Ver_Equipaje.php">Ver Equipaje</a></li>
                    <li><a href="Ver_sueldo.php">Ver sueldo</a></li>
                    <li><a href="piloto_vuelo_destino_sucursal.php">Piloto_vuelo_destino_sucursal</a></li>
                    <li><a href="num_vuelos.php">Número de vuelos de las sucursales</a></li>
                    <li><a href="ver_vuelo.php">Ver vuelo</a></li>
                    <li><a href="ver_ganacias.php">Ver ganancias</a></li>
                    <li><a href="pilotos_madrid.php">Pilotos a Madrid</a></li>
                    <li><a href="masaviones.php">Más aviones</a></li>
                    <li><a href="clientemas10.php">Cliente más 10</a></li>
                    <li><a href="cliente_millas_vuelos.php">Cliente millas vuelos</a></li>
                    <li><a href="maximo.php">Máximo</a></li>
                </ul>
            </nav>
        </div>
    </div>
</body>

</html>
