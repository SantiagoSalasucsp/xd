<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sucursales con más de 10 aviones</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
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

        $sql = "SELECT S.ubicacion, S.numero_de_aviones
                FROM sucursales S
                WHERE S.numero_de_aviones > 10";
        $resultado = mysqli_query($conexion, $sql);
        ?>

        <h1>Sucursales con más de 10 aviones</h1>

        <table>
            <thead>
                <tr>
                    <th>Ubicación</th>
                    <th>Número de Aviones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filas = mysqli_fetch_assoc($resultado)) {
                ?>
                    <tr>
                        <td><?php echo htmlspecialchars($filas['ubicacion']); ?></td>
                        <td><?php echo htmlspecialchars($filas['numero_de_aviones']); ?></td>
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
