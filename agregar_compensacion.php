<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Compensación</title>
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
        if(isset($_POST['enviar'])){

            $id_compensacion = htmlspecialchars($_POST['id_compensacion']);
            $salario_base = htmlspecialchars($_POST['salario_base']);
            $tipo_contrato = htmlspecialchars($_POST['tipo_contrato']);
            $id_personal_personal = htmlspecialchars($_POST['id_personal_personal']);

  
            include("conexion.php");

 
            $sql_verificar_compensacion = "SELECT id_compensacion FROM compensaciones WHERE id_compensacion = '$id_compensacion'";
            $resultado_verificar_compensacion = mysqli_query($conexion, $sql_verificar_compensacion);

            if (mysqli_num_rows($resultado_verificar_compensacion) > 0) {
                echo "<script language='JavaScript'>
                    alert('El ID de compensación ya existe en la BD');
                    location.assign('agregar_compensacion.php');
                    </script>";
            } else {
             
                $sql_verificar_personal = "SELECT id_Personal FROM Personal WHERE id_Personal = '$id_personal_personal'";
                $resultado_verificar_personal = mysqli_query($conexion, $sql_verificar_personal);

                if (mysqli_num_rows($resultado_verificar_personal) === 0) {
                    echo "<script language='JavaScript'>
                        alert('El ID de Personal no existe en la BD');
                        location.assign('agregar_compensacion.php');
                        </script>";
                } else {
            
                    $sql_insertar_compensacion = "INSERT INTO compensaciones(id_compensacion, salario_base, tipo_contrato, id_Personal_Personal)
                        VALUES ('$id_compensacion', '$salario_base', '$tipo_contrato', '$id_personal_personal')";
                    $resultado = mysqli_query($conexion, $sql_insertar_compensacion);

                    if ($resultado) {
                        echo "<script language='JavaScript'>
                            alert('Los datos fueron ingresados correctamente a la BD');
                            location.assign('index.php');
                            </script>";
                    } else {
                        echo "<script language='JavaScript'>
                            alert('ERROR: Los datos no fueron ingresados a la BD');
                            location.assign('agregar_compensacion.php');
                            </script>";
                    }
                }
            }
    
            mysqli_close($conexion);

        } else {
        ?>
        <h1>Agregar nueva compensación</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>ID Compensación:</label>
            <input type="text" name="id_compensacion" required><br>
            <label>Salario Base:</label>
            <input type="text" name="salario_base" required><br>
            <label>Tipo Contrato:</label>
            <input type="text" name="tipo_contrato" required><br>
            <label>ID Personal:</label>
            <input type="text" name="id_personal_personal" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
