<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Destino</title>
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
      
            $id = htmlspecialchars($_POST['id']);
            $aeropuerto = htmlspecialchars($_POST['aeropuerto']);
            $pais = htmlspecialchars($_POST['pais']);
            $ciudad = htmlspecialchars($_POST['ciudad']);
            $numero = htmlspecialchars($_POST['numero']);
            

            include("conexion.php");

      
            $sql_verificar = "SELECT id_Destino FROM Destinos WHERE id_Destino = '$id'";
            $resultado_verificar = mysqli_query($conexion, $sql_verificar);

            if (mysqli_num_rows($resultado_verificar) > 0) {
                echo "<script language='JavaScript'>
                    alert('El ID del destino ya existe en la BD');
                    location.assign('agregar_destino.php');
                    </script>";
            } else {
    
                $sql_insertar = "INSERT INTO Destinos(id_Destino, aeropuerto, pais, ciudad, numero_aviones)
                    VALUES ('$id', '$aeropuerto', '$pais', '$ciudad', '$numero')";
                $resultado = mysqli_query($conexion, $sql_insertar);

                if ($resultado) {
                    echo "<script language='JavaScript'>
                        alert('Los datos fueron ingresados correctamente a la BD');
                        location.assign('index.php');
                        </script>";
                } else {
                    echo "<script language='JavaScript'>
                        alert('ERROR: Los datos no fueron ingresados a la BD');
                        location.assign('agregar_destino.php');
                        </script>";
                }
            }
     
            mysqli_close($conexion);

        } else {
        ?>
        <h1>Agregar nuevo destino</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label>ID:</label>
            <input type="text" name="id" required><br>
            <label>Aeropuerto:</label>
            <input type="text" name="aeropuerto" required><br>
            <label>País:</label>
            <input type="text" name="pais" required><br>
            <label>Ciudad:</label>
            <input type="text" name="ciudad" required><br>
            <label>Número de aviones:</label>
            <input type="text" name="numero" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
        <?php
        }
        ?>
    </div>
</body>
</html>
