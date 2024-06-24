<!DOCTYPE html>
<html>

<head>
    <title>Agregar Cliente</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('https://example.com/aeropuerto-fondo.jpg'); /* Cambia esta URL por una imagen adecuada */
            background-size: cover;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 10px;
            max-width: 600px;
            margin: 50px auto;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
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
        if (isset($_POST['enviar'])) {
            $id = htmlspecialchars($_POST['id']);
            $millas = htmlspecialchars($_POST['millas']);
            $nombre = htmlspecialchars($_POST['nombre']);
            $primer = htmlspecialchars($_POST['primer']);
            $segundo = htmlspecialchars($_POST['segundo']);
            $sexo = htmlspecialchars($_POST['sexo']);
            $id_vuelos = htmlspecialchars($_POST['id_vuelos']);

            include("conexion.php");

      
            $sql_verificar_cliente = "SELECT id_cliente FROM Cliente WHERE id_cliente = '$id'";
            $resultado_verificar_cliente = mysqli_query($conexion, $sql_verificar_cliente);

            if (mysqli_num_rows($resultado_verificar_cliente) > 0) {
                echo "<script language='JavaScript'>
                    alert('ERROR: El ID del cliente ya existe en la BD');
                    location.assign('agregar.php');
                    </script>";
            } else {
        
                $sql_verificar_vuelo = "SELECT id_vuelo FROM Vuelos WHERE id_vuelo = '$id_vuelos'";
                $resultado_verificar_vuelo = mysqli_query($conexion, $sql_verificar_vuelo);

                if (mysqli_num_rows($resultado_verificar_vuelo) > 0) {
                    $sql_insertar = "INSERT INTO Cliente (id_cliente, millas_acumuladas, nombres, primer_apellido, segundo_apellido, sexo, id_vuelo_Vuelos) 
                                     VALUES ('$id', '$millas', '$nombre', '$primer', '$segundo', '$sexo', '$id_vuelos')";

                    $resultado = mysqli_query($conexion, $sql_insertar);

                    if ($resultado) {
                        echo "<script language='JavaScript'>
                            alert('Los datos fueron ingresados correctamente a la BD');
                            location.assign('index.php');
                            </script>";
                    } else {
                        echo "<script language='JavaScript'>
                            alert('ERROR: Los datos no fueron ingresados a la BD');
                            location.assign('agregar.php');
                            </script>";
                    }
                } else {
                    echo "<script language='JavaScript'>
                        alert('ERROR: El ID de vuelo no existe en la BD');
                        location.assign('agregar.php');
                        </script>";
                }
            }

            mysqli_close($conexion);
        } else {
        ?>
            <h1>Agregar Nuevo Cliente</h1>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                <label>ID:</label>
                <input type="text" name="id" required><br>
                <label>Millas acumuladas:</label>
                <input type="text" name="millas" required><br>
                <label>Nombre:</label>
                <input type="text" name="nombre" required><br>
                <label>Primer apellido:</label>
                <input type="text" name="primer" required><br>
                <label>Segundo apellido:</label>
                <input type="text" name="segundo" required><br>
                <label>Sexo:</label>
                <input type="text" name="sexo" required><br>
                <label>ID vuelo:</label>
                <input type="text" name="id_vuelos" required><br>

                <input type="submit" name="enviar" value="AGREGAR">
                <a href="index.php">Regresar</a>
            </form>
        <?php
        }
        ?>
    </div>
</body>

</html>
