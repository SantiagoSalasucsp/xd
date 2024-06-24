<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinos con Ganancias Totales > 50,000</title>
</head>
<body>
    <?php
        include("conexion.php");

        $sql = "SELECT D.aeropuerto, D.ciudad, SUM(V.ganancias) AS ganancias_totales
                FROM Destinos D
                INNER JOIN Vuelos V ON D.id_Destino = V.id_Destino_Destinos
                GROUP BY D.aeropuerto, D.ciudad
                HAVING SUM(V.ganancias) > 50000";
        $resultado = mysqli_query($conexion, $sql);
    ?>

    <h1>Destinos con Ganancias Totales &gt; 50,000</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Aeropuerto</th>
                <th>Ciudad</th>
                <th>Ganancias Totales</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($filas['aeropuerto']); ?></td>
                <td><?php echo htmlspecialchars($filas['ciudad']); ?></td>
                <td><?php echo htmlspecialchars($filas['ganancias_totales']); ?></td>
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
