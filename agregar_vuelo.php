<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Vuelo</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 50px auto;
        }

        h1 {
            text-align: center;
            color: #005b96;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        input[type="submit"] {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input[type="submit"] {
            background-color: #005b96;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #003f6b;
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

        .error-message {
            color: red;
            margin-top: 5px;
        }
    </style>
<body>
    <?php
      
        include("conexion.php");

        if(isset($_POST['enviar'])){
         
            $id_vuelo = $_POST['id_vuelo'];
            $distancia = $_POST['distancia'];
            $hora_llegada = $_POST['hora_llegada'];
            $ganancias = $_POST['ganancias'];
            $hora_salida = $_POST['hora_salida'];
            $id_pilotos_pilotos = $_POST['id_pilotos_pilotos'];
            $id_Destino_Destinos = $_POST['id_Destino_Destinos'];
            $id_sucursal_sucursales = $_POST['id_sucursal_sucursales'];

         
            $sql_verificar_pilotos = "SELECT id_pilotos FROM Pilotos WHERE id_pilotos = ?";
            $stmt_pilotos = mysqli_prepare($conexion, $sql_verificar_pilotos);
            mysqli_stmt_bind_param($stmt_pilotos, "s", $id_pilotos_pilotos);
            mysqli_stmt_execute($stmt_pilotos);
            $resultado_verificar_pilotos = mysqli_stmt_get_result($stmt_pilotos);

        
            $sql_verificar_destinos = "SELECT id_Destino FROM Destinos WHERE id_Destino = ?";
            $stmt_destinos = mysqli_prepare($conexion, $sql_verificar_destinos);
            mysqli_stmt_bind_param($stmt_destinos, "s", $id_Destino_Destinos);
            mysqli_stmt_execute($stmt_destinos);
            $resultado_verificar_destinos = mysqli_stmt_get_result($stmt_destinos);

            if (mysqli_num_rows($resultado_verificar_pilotos) > 0 && mysqli_num_rows($resultado_verificar_destinos) > 0) {
            
                $sql_insertar_vuelo = "INSERT INTO Vuelos(id_vuelo, distancia, hora_llegada, ganancias, hora_salida, id_pilotos_pilotos, id_Destino_Destinos, id_sucursal_sucursales)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                $stmt_insertar_vuelo = mysqli_prepare($conexion, $sql_insertar_vuelo);
                mysqli_stmt_bind_param($stmt_insertar_vuelo, "sddsssss", $id_vuelo, $distancia, $hora_llegada, $ganancias, $hora_salida, $id_pilotos_pilotos, $id_Destino_Destinos, $id_sucursal_sucursales);
                $resultado = mysqli_stmt_execute($stmt_insertar_vuelo);

                if ($resultado) {
                    echo "<script language='JavaScript'>
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                        </script>";
                } else {
                    echo "<script language='JavaScript'>
                        alert('ERROR: Los datos no fueron ingresados a la BD');
                        location.assign('agregar_vuelo.php');
                        </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                    alert('El ID de piloto o el ID de destino no existen en la BD');
                    location.assign('agregar_vuelo.php');
                    </script>";
            }
      
            mysqli_stmt_close($stmt_pilotos);
            mysqli_stmt_close($stmt_destinos);
     
            mysqli_close($conexion);
        }
    ?>
    <h1>Insertar Nuevo Vuelo</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label>ID Vuelo:</label>
        <input type="text" name="id_vuelo" required><br>
        <label>Distancia:</label>
        <input type="text" name="distancia" required><br>
        <label>Hora de Llegada:</label>
        <input type="time" name="hora_llegada" required><br>
        <label>Ganancias:</label>
        <input type="text" name="ganancias" required><br>
        <label>Hora de Salida:</label>
        <input type="time" name="hora_salida" required><br>
        <label>ID Piloto:</label>
        <input type="text" name="id_pilotos_pilotos" required><br>
        <label>ID Destino:</label>
        <input type="text" name="id_Destino_Destinos" required><br>
        <label>ID Sucursal:</label>
        <input type="text" name="id_sucursal_sucursales" required><br>
        <input type="submit" name="enviar" value="AGREGAR">
        <a href="index.php">Regresar</a>
    </form>
</body>
</html>
