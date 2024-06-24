<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Equipaje</title>
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
            padding: 10px 20px;
            border: 1px solid #005b96;
            border-radius: 5px;
        }

        a:hover {
            background-color: #005b96;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Equipajes</h1>
        <table>
            <thead>
                <tr>
                    <th>ID Equipaje</th>
                    <th>Peso</th>
                    <th>ID Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php
                
                    include("conexion.php");
                    
                 
                    $sql = "SELECT * FROM Equipaje";
                    $resultado = mysqli_query($conexion, $sql);

                  
                    while($fila = mysqli_fetch_assoc($resultado)){
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila['id_Equipaje']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['peso']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['id_cliente_Cliente']) . "</td>";
                        echo "</tr>";
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
