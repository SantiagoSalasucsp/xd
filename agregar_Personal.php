<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR Personal</title>
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            include("conexion.php");

            $id_personal = $_POST['id_personal'];
            $nombres = $_POST['nombres'];
            $primer_apellido = $_POST['primer_apellido'];
            $segundo_apellido = $_POST['segundo_apellido'];
            $id_sucursal_sucursales = $_POST['id_sucursal_sucursales'];

       
            $sql_verificar_personal = "SELECT id_personal FROM Personal WHERE id_personal = '$id_personal'";
            $resultado_verificar_personal = mysqli_query($conexion, $sql_verificar_personal);

            if (mysqli_num_rows($resultado_verificar_personal) > 0) {
                echo "<script>alert('El ID del personal ya existe en la BD');</script>";
            } else {
       
                $sql_insertar_personal = "INSERT INTO Personal(id_personal, nombres, primer_apellido, segundo_apellido, id_sucursal_sucursales)
                    VALUES ('$id_personal', '$nombres', '$primer_apellido', '$segundo_apellido', '$id_sucursal_sucursales')";
                $resultado_insertar_personal = mysqli_query($conexion, $sql_insertar_personal);

                if ($resultado_insertar_personal) {
                    echo "<script>alert('Los datos fueron ingresados correctamente a la BD');</script>";
                    echo "<script>location.assign('index.php');</script>";
                } else {
                    echo "<script>alert('ERROR: Los datos no fueron ingresados a la BD');</script>";
                    echo "<script>location.assign('agregar_personal.php');</script>";
                }
            }
            mysqli_close($conexion);
        }
        ?>
        
        <h1>Agregar nuevo personal</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>ID Personal:</label>
            <input type="text" name="id_personal" required><br>
            <label>Nombres:</label>
            <input type="text" name="nombres" required><br>
            <label>Primer Apellido:</label>
            <input type="text" name="primer_apellido" required><br>
            <label>Segundo Apellido:</label>
            <input type="text" name="segundo_apellido" required><br>
            <label>ID Sucursal:</label>
            <input type="text" name="id_sucursal_sucursales" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
        </form>

        <a href="index.php">Regresar</a>
    </div>
</body>
</html>
