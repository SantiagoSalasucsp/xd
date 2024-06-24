<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Equipaje</title>
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
    
        include("conexion.php");

        if(isset($_POST['enviar'])){
            $id_equipaje = htmlspecialchars($_POST['id_equipaje']);
            $peso = htmlspecialchars($_POST['peso']);
            $id_cliente = htmlspecialchars($_POST['id_cliente']);

          
            $sql_verificar_cliente = "SELECT id_cliente FROM Cliente WHERE id_cliente = '$id_cliente'";
            $resultado_verificar_cliente = mysqli_query($conexion, $sql_verificar_cliente);

            if (mysqli_num_rows($resultado_verificar_cliente) > 0) {
      
                $sql_insertar = "INSERT INTO Equipaje(id_Equipaje, peso, id_cliente_Cliente)
                                 VALUES ('$id_equipaje', '$peso', '$id_cliente')";
                $resultado = mysqli_query($conexion, $sql_insertar);
                
                if ($resultado) {
                    echo "<script language='JavaScript'>
                            alert('El equipaje fue registrado correctamente.');
                            location.assign('index.php');
                          </script>";
                } else {
                    echo "<script language='JavaScript'>
                            alert('Error: No se pudo registrar el equipaje.');
                            location.assign('agregar_equipaje.php');
                          </script>";
                }
            } else {
                echo "<script language='JavaScript'>
                        alert('El ID del cliente no existe.');
                        location.assign('agregar_equipaje.php');
                      </script>";
            }

    
            mysqli_close($conexion);

        } else {
        ?>
        <h1>Agregar nuevo equipaje</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>ID Equipaje:</label>
            <input type="text" name="id_equipaje" required><br>
            <label>Peso:</label>
            <input type="text" name="peso" required><br>
            <label>ID Cliente:</label>
            <input type="text" name="id_cliente" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
