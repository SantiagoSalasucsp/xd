<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR Gerente</title>
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
    </style>
</head>
<body>
    <div class="container">
        <?php

        if(isset($_POST['enviar'])){

            $id_gerente = htmlspecialchars($_POST['id_gerente']);
            $fecha_nacimiento = htmlspecialchars($_POST['fecha_nacimiento']);
            $id_sucursal_sucursales = htmlspecialchars($_POST['id_sucursal_sucursales']);

            include("conexion.php");

            $sql_verificar_gerente = "SELECT id_gerente FROM Gerente WHERE id_gerente = '$id_gerente'";
            $resultado_verificar_gerente = mysqli_query($conexion, $sql_verificar_gerente);
            if (mysqli_num_rows($resultado_verificar_gerente) > 0) {
                echo "<script language='JavaScript'>
                    alert('El ID del gerente ya existe en la BD');
                    location.assign('agregar_gerente.php');
                    </script>";
            } else {

                $sql_verificar_sucursal = "SELECT id_sucursal_sucursales FROM Gerente WHERE id_sucursal_sucursales = '$id_sucursal_sucursales'";
                $resultado_verificar_sucursal = mysqli_query($conexion, $sql_verificar_sucursal);
                if (mysqli_num_rows($resultado_verificar_sucursal) > 0) {
                    echo "<script language='JavaScript'>
                        alert('El ID de sucursal ya existe en la BD');
                        location.assign('agregar_gerente.php');
                        </script>";
                } else {

                    $sql_insertar_gerente = "INSERT INTO Gerente(id_gerente, fecha_nacimiento, id_sucursal_sucursales)
                        VALUES ('$id_gerente', '$fecha_nacimiento', '$id_sucursal_sucursales')";
                    $resultado = mysqli_query($conexion, $sql_insertar_gerente);
                    if ($resultado) {
                        echo "<script language='JavaScript'>
                            alert('Los datos fueron ingresados correctamente a la BD');
                            location.assign('index.php');
                            </script>";
                    } else {
                        echo "<script language='JavaScript'>
                            alert('ERROR: Los datos no fueron ingresados a la BD');
                            location.assign('agregar_gerente.php');
                            </script>";
                    }
                }
            }

            mysqli_close($conexion);
        } else {
        ?>
        <h1>Agregar nuevo gerente</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>ID Gerente:</label>
            <input type="text" name="id_gerente" required><br>
            <label>Fecha de Nacimiento:</label>
            <input type="date" name="fecha_nacimiento" required><br>
            <label>ID Sucursal:</label>
            <input type="text" name="id_sucursal_sucursales" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
