<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #005b96;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #005b96;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: #005b96;
            margin-top: 20px;
        }

        a:hover {
            color: #003f6b;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        include("conexion.php");
        $sql = "SELECT V.id_vuelo, V.distancia, V.hora_llegada, V.ganancias, V.hora_salida, P.nombres AS nombre_piloto, D.aeropuerto AS aeropuerto_destino, D.ciudad AS ciudad_destino, S.ubicacion AS ubicacion_sucursal
                FROM Vuelos V
                INNER JOIN pilotos P ON V.id_pilotos_pilotos = P.id_pilotos
                INNER JOIN Destinos D ON V.id_Destino_Destinos = D.id_Destino
                INNER JOIN sucursales S ON V.id_sucursal_sucursales = S.id_sucursal";
        $resultado = mysqli_query($conexion, $sql);
        ?>

        <h1>Lista de Vuelos</h1>

        <table>
            <thead>
                <tr>
                    <th>ID Vuelo</th>
                    <th>Distancia</th>
                    <th>Hora de Llegada</th>
                    <th>Ganancias</th>
                    <th>Hora de Salida</th>
                    <th>Nombre del Piloto</th>
                    <th>Aeropuerto Destino</th>
                    <th>Ciudad Destino</th>
                    <th>Ubicación Sucursal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($filas['id_vuelo']); ?></td>
                        <td><?php echo htmlspecialchars($filas['distancia']); ?></td>
                        <td><?php echo htmlspecialchars($filas['hora_llegada']); ?></td>
                        <td><?php echo htmlspecialchars($filas['ganancias']); ?></td>
                        <td><?php echo htmlspecialchars($filas['hora_salida']); ?></td>
                        <td><?php echo htmlspecialchars($filas['nombre_piloto']); ?></td>
                        <td><?php echo htmlspecialchars($filas['aeropuerto_destino']); ?></td>
                        <td><?php echo htmlspecialchars($filas['ciudad_destino']); ?></td>
                        <td><?php echo htmlspecialchars($filas['ubicacion_sucursal']); ?></td>
                    </tr>
                <?php
                }
                mysqli_close($conexion);
                ?>
            </tbody>
        </table>

        <a href="index.php">Regresar</a>
    </div>
</body>

</html>
