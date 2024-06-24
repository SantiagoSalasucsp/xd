<?php
    include("conexion.php");
    $sql = "SELECT * FROM Cliente";
    $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes Registrados</title>
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

        th, td {
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
        <h1>Clientes Registrados</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Millas Acumuladas</th>
                    <th>Nombre</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Sexo</th>
                    <th>ID Vuelos</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($filas = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($filas['id_cliente']); ?></td>
                    <td><?php echo htmlspecialchars($filas['millas_acumuladas']); ?></td>
                    <td><?php echo htmlspecialchars($filas['nombres']); ?></td>
                    <td><?php echo htmlspecialchars($filas['primer_apellido']); ?></td>
                    <td><?php echo htmlspecialchars($filas['segundo_apellido']); ?></td>
                    <td><?php echo htmlspecialchars($filas['sexo']); ?></td>
                    <td><?php echo htmlspecialchars($filas['id_vuelo_Vuelos']); ?></td>
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
