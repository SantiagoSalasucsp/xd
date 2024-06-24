<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelo con Más Ganancias</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://example.com/aeropuerto-fondo.jpg'); 
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
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

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
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
        <h1>Vuelo con Más Ganancias</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Vuelo</th>
                    <th>Hora de Salida</th>
                    <th>Hora de Llegada</th>
                    <th>Ganancias</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    include("conexion.php");
                    
               
                    $sql = "SELECT id_vuelo, hora_salida, hora_llegada, ganancias FROM Vuelos ORDER BY ganancias DESC LIMIT 1";
                    $resultado = mysqli_query($conexion, $sql);

                    if ($resultado) {
                     
                        $fila = mysqli_fetch_assoc($resultado);
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_vuelo']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['hora_salida']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['hora_llegada']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['ganancias']) . "</td>";
                        echo "</tr>";
                    } else {
                        echo "<tr><td colspan='4'>No se encontraron datos</td></tr>";
                    }

                
                    mysqli_free_result($resultado);
                    mysqli_close($conexion);
                ?>
            </tbody>
        </table>
        <a href="index.php">Regresar</a>
    </div>
</body>

</html>
