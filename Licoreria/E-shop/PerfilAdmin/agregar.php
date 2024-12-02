<?php
include('../conexion/conexion.php');
$shouldPlaySound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $image = $_FILES['image']['name'];

    // Prevenir SQL Injection
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $stock = $conn->real_escape_string($stock);
    $descripcion = $conn->real_escape_string($descripcion);
    $tipo = $conn->real_escape_string($tipo);
    $image = $conn->real_escape_string($image);

    // Subir la imagen
    $target_dir = "../images/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql = "INSERT INTO licores (nombre, precio, stock, image, descripcion, tipo) VALUES ('$name', '$price', '$stock', '$target_file', '$descripcion', '$tipo')";
    
    if ($conn->query($sql) === TRUE) {
        $shouldPlaySound = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Productos - SAJR MOTORS</title>
    <link rel="shortcut icon" href="../Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styleAgregar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /*.container {
        }*/

        .form-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .form-header h1 {
            font-size: 2.5rem;
            color: #333;
        }

        .form-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            font-size: 2rem;
            margin-bottom: 25px;
            text-align: center;
            color: #333;
        }

        .form-container .form-group {
            margin-bottom: 20px;
        }

        .form-container .form-group label {
            font-size: 1.1rem;
            color: #555;
        }

        .form-container .form-group input,
        .form-container .form-group select,
        .form-container .form-group textarea {
            width: 100%;
            padding: 12px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 1rem;
            color: #555;
            box-sizing: border-box;
        }

        .form-container .form-group input[type="file"] {
            padding: 10px;
        }

        .form-container .form-group button {
            width: 100%;
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px;
            font-size: 1.1rem;
            cursor: pointer;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .form-container .form-group button:hover {
            background-color: #2980b9;
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
        }

        .form-footer a {
            color: #3498db;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }

        .alert {
            display: none;
            background-color: #f44336;
            color: white;
            padding: 15px;
            margin-top: 15px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <div class="container">
        <div class="form-header">
            <h1>Registro de Producto</h1>
            <p class="lead">Rellena los campos para registrar una nueva moto en nuestro sistema.</p>
        </div>

        <div class="form-container">
            <h2>Registrar Moto</h2>
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Nombre del Producto</label>
                    <input type="text" id="name" name="name" placeholder="Nombre del Producto" required>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción del Producto</label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción del Producto" rows="4" required></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Precio</label>
                    <input type="text" id="price" name="price" placeholder="Precio" required>
                </div>
                <div class="form-group">
                    <label for="stock">Stock</label>
                    <input type="text" id="stock" name="stock" placeholder="Stock disponible" required>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo de Licor</label>
                    <input type="text" id="tipo" name="tipo" placeholder="Tipo de moto" required>
                </div>
                <div class="form-group">
                    <label for="image">Imagen del Producto</label>
                    <input type="file" id="image" name="image" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn">Registrar Producto</button>
                </div>
            </form>

            <div class="alert" id="alert-message">
                <span>¡Por favor, completa todos los campos correctamente!</span>
            </div>
        </div>

        <div class="form-footer">
            <p><a href="catalogo.php">Ver todos los productos</a></p>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <script>
        // Mostrar alerta si hay algún error
        function showAlert(message) {
            var alertElement = document.getElementById("alert-message");
            alertElement.style.display = "block";
            alertElement.textContent = message;
        }
        
        // Lógica adicional para validaciones o interacciones puede ir aquí.
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
