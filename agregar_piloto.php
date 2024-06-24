<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Piloto</title>
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
</head>
<body>
    <div class="container">
        <?php
        if(isset($_POST['enviar'])){
            $id = htmlspecialchars($_POST['id']);
            $nombres = htmlspecialchars($_POST['nombres']);
            $primer_apellido = htmlspecialchars($_POST['primer_apellido']);
            $segundo_apellido = htmlspecialchars($_POST['segundo_apellido']);
            $ultimo_vuelo = htmlspecialchars($_POST['ultimo_vuelo']);
            
            include("conexion.php");

            $sql_verificar = "SELECT id_pilotos FROM Pilotos WHERE id_pilotos = '$id'";
            $resultado_verificar = mysqli_query($conexion, $sql_verificar);
            if (mysqli_num_rows($resultado_verificar) > 0) {
                echo "<p class='error-message'>El ID del piloto ya existe en la BD</p>";
            } else {

                $sql_insertar = "INSERT INTO Pilotos (id_pilotos, nombres, primer_apellido, segundo_apellido, ultimo_vuelo)
                    VALUES ('$id', '$nombres', '$primer_apellido', '$segundo_apellido', '$ultimo_vuelo')";
                $resultado = mysqli_query($conexion, $sql_insertar);
                if ($resultado) {
                    echo "<script>alert('Los datos fueron ingresados correctamente a la BD');</script>";
                    echo "<script>location.assign('index.php');</script>";
                } else {
                    echo "<p class='error-message'>ERROR: Los datos no fueron ingresados a la BD</p>";
                }
            }
            mysqli_close($conexion);

        }
        ?>
        
        <h1>Agregar nuevo piloto</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label>ID:</label>
            <input type="text" name="id" required><br>
            <label>Nombres:</label>
            <input type="text" name="nombres" required><br>
            <label>Primer Apellido:</label>
            <input type="text" name="primer_apellido" required><br>
            <label>Segundo Apellido:</label>
            <input type="text" name="segundo_apellido" required><br>
            <label>Último Vuelo:</label>
            <input type="date" name="ultimo_vuelo" required><br>
            <input type="submit" name="enviar" value="AGREGAR">
            <a href="index.php">Regresar</a>
        </form>
    </div>
</body>
</html>
