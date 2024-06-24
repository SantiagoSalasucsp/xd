<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes y Vuelos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://example.com/aeropuerto-fondo.jpg'); /* Cambia esta URL por una imagen adecuada */
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
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
    <?php
        // Incluir archivo de conexión
        include("conexion.php");

        // Consultar clientes y vuelos relacionados
        $sql = "SELECT 
                    Cliente.id_cliente,
                    Cliente.nombres AS cliente_nombre,
                    Cliente.primer_apellido,
                    Cliente.segundo_apellido,
                    Cliente.millas_acumuladas,
                    Vuelos.id_vuelo,
                    Vuelos.hora_salida,
                    Vuelos.hora_llegada
                FROM 
                    Cliente
                INNER JOIN 
                    Vuelos ON Cliente.id_vuelo_Vuelos = Vuelos.id_vuelo";
        $resultado = mysqli_query($conexion, $sql);
    ?>

    <h1>Clientes y Vuelos</h1>
    <table border="1">
        <thead>
            <tr>
                <th>ID Cliente</th>
                <th>Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Millas Acumuladas</th>
                <th>ID Vuelo</th>
                <th>Hora de Salida</th>
                <th>Hora de Llegada</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($filas['id_cliente']); ?></td>
                <td><?php echo htmlspecialchars($filas['cliente_nombre']); ?></td>
                <td><?php echo htmlspecialchars($filas['primer_apellido']); ?></td>
                <td><?php echo htmlspecialchars($filas['segundo_apellido']); ?></td>
                <td><?php echo htmlspecialchars($filas['millas_acumuladas']); ?></td>
                <td><?php echo htmlspecialchars($filas['id_vuelo']); ?></td>
                <td><?php echo htmlspecialchars($filas['hora_salida']); ?></td>
                <td><?php echo htmlspecialchars($filas['hora_llegada']); ?></td>
            </tr>
            <?php
                }
       
                mysqli_close($conexion);
            ?>
        </tbody>
    </table>
    <a href="index.php">Regresar</a>
</body>

</html>
