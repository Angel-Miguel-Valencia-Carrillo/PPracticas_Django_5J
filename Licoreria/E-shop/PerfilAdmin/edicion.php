<?php
include('../conexion/conexion.php');
$shouldPlaySound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $sql = "SELECT id_producto,nombre,descripcion,precio,stock,tipo,image FROM licores WHERE id_producto = '$id'";
    $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                    $id = $row['id_producto'];
                    $nombre = $row['nombre'];
                    $descripcion = $row['descripcion'];
                    $precio = $row['precio'];
                    $stock = $row['stock'];
                    $tipo = $row['tipo'];
                    $image = $row['image'];
                
            } else {
                
            }
            

    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Moto - SAJR MOTORS</title>
    <link rel="shortcut icon" href="../Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styleCatalogo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        /*.container {
            margin-top: 50px;
        }*/

        .form-container {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            color: #333;
            margin-bottom: 30px;
            font-size: 2rem;
        }

        .form-container .textbox {
            margin-bottom: 20px;
        }

        .form-container .textbox input {
            width: 100%;
            padding: 12px;
            font-size: 1rem;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .form-container input[type="submit"] {
            background-color: #3498db;
            color: white;
            padding: 12px 25px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: #3498db;
            text-decoration: none;
            font-size: 1rem;
        }

        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <div class="container">
        <!-- Título de la página -->
        <div class="form-container">
            <?php  
                echo "<h2>Editar Moto: $nombre</h2>";
            ?>

            <!-- Formulario de edición -->
            <form method="POST" action="catalogo.php" enctype="multipart/form-data">
                <div class="textbox">
                    <?php
                        echo "<input type='text' placeholder='Nombre del Producto' name='name' value='".$nombre."' required>";
                    ?>
                </div>
                <div class="textbox">
                    <?php
                        echo "<input type='text' placeholder='Descripción del Producto' name='descripcion' value='" . $descripcion . "' required>";
                    ?>
                </div>
                <div class="textbox">
                    <?php
                        echo "<input type='text' placeholder='Precio' name='price' value='" . $precio . "' required>";
                    ?>
                </div>
                <div class="textbox">
                    <?php
                        echo "<input type='text' placeholder='Stock' name='stock' value='" . $stock . "' required>";
                    ?>
                </div>
                <div class="textbox">
                    <?php
                        echo "<input type='text' placeholder='Tipo' name='tipo' value='" . $tipo . "' required>";
                    ?>
                </div>
                <div class="textbox">
                    <?php
                        echo "<input type='file' name='image' value='" . $image . "' required>";
                    ?>
                </div>
                <?php
                    echo "<input type='hidden' name='id' value='" . $id . "'>";
                ?>
                <input type='hidden' name='rol' value='editar'>
                <input type="submit" value="Actualizar">
            </form>

            <!-- Enlace para regresar al inventario -->
            <div class="back-link">
                <a href="catalogo.php">Volver al inventario</a>
            </div>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
