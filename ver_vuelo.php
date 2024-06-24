<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos Registrados</title>
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

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 800px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        h1 {
            text-align: center;
            color: #005b96;
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

        a {
            display: inline-block;
            text-align: center;
            text-decoration: none;
            color: #005b96;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border-radius: 5px;
        }

        a:hover {
            background-color: #555;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Vuelos Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Vuelo</th>
                    <th>Distancia</th>
                    <th>Hora de Llegada</th>
                    <th>Ganancias</th>
                    <th>Hora de Salida</th>
                    <th>ID del Piloto</th>
                    <th>ID del Destino</th>
                    <th>ID de la Sucursal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    include("conexion.php");

                    $sql = "SELECT * FROM Vuelos";
                    $resultado = mysqli_query($conexion, $sql);

                    while($filas = mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($filas['id_vuelo']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['distancia']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['hora_llegada']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['ganancias']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['hora_salida']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['id_pilotos_pilotos']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['id_Destino_Destinos']) . "</td>";
                        echo "<td>" . htmlspecialchars($filas['id_sucursal_sucursales']) . "</td>";
                        echo "</tr>";
                    }

                    mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="index.php">Regresar</a>
    </div>
</body>
</html>
