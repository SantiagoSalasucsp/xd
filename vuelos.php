<?php
    include("conexion.php");
    $sql = "SELECT v.id_vuelo, d.ciudad FROM Vuelos v INNER JOIN Destinos d ON d.id_Destino = v.id_Destino_Destinos";
    $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vuelos y Destinos</title>
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
        <h1>Lista de Vuelos y Destinos</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Vuelo</th>
                    <th>Ciudad Destino</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($filas = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($filas['id_vuelo']); ?></td>
                    <td><?php echo htmlspecialchars($filas['ciudad']); ?></td>
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
