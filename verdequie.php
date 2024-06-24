<?php
    include("conexion.php");
    $sql = "SELECT e.peso, c.nombres FROM Equipaje e INNER JOIN Cliente c ON e.id_cliente_Cliente=c.id_cliente";
    $resultado = mysqli_query($conexion, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Peso del Equipaje por Cliente</title>
</head>
<body>
    <h1>¿Cuánto Peso Traes?</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Peso del Equipaje</th>
                <th>Nombre del Cliente</th>
            </tr>
        </thead>
        <tbody>
            <?php
                while($filas = mysqli_fetch_assoc($resultado)){
            ?>
            <tr>
                <td><?php echo htmlspecialchars($filas['peso']); ?></td>
                <td><?php echo htmlspecialchars($filas['nombres']); ?></td>
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
