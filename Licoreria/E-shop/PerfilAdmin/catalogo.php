<?php
include('../conexion/conexion.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST['rol'];
    if ($rol == "eliminar") {
        $productID = $_POST['id'];
        $sql5 = "DELETE FROM producto WHERE id_producto='$productID'";
            if ($conn->query($sql5) === TRUE) {
                //echo "<script type='text/javascript'>alert('Actualizado');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    else {
        $ids=$_POST['id'];
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

    $sql = "UPDATE licores SET nombre = '$name', precio = '$price', stock = '$stock',descripcion='$descripcion', tipo='$tipo', image = '$target_file' WHERE id_producto = $ids";
    
    if ($conn->query($sql) === TRUE) {
        $shouldPlaySound = true;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    }
        
        
        

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - SAJR MOTORS</title>
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

        .table-responsive {
            overflow-x: auto;
        }

        .table {
            width: 100%;
            margin: 20px 0;
            border-collapse: collapse;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .table th, .table td {
            padding: 15px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #ddd;
        }

        .table th {
            background-color: #3498db;
            color: white;
            font-weight: bold;
        }

        .table td {
            color: #555;
        }

        .table img {
            width: 50px;
            height: 50px;
            border-radius: 5px;
        }

        .btn-action {
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-edit {
            background-color: #f39c12;
        }

        .btn-edit:hover {
            background-color: #e67e22;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        .no-products {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
            margin: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .header h1 {
            font-size: 2rem;
            color: #333;
        }

        .header a {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 1rem;
            transition: background-color 0.3s;
        }

        .header a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <div class="container">
        <!-- Header de la página -->
        <div class="header">
            <h1>Inventario de Motos</h1>
            <a href="agregar.php">Agregar Producto</a>
        </div>

        <!-- Tabla de productos -->
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Moto</th>
                        <th>ID</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM licores";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='" . $row['image'] . "' alt='" . $row['nombre'] . "'></td>";
                            echo "<td>" . $row['nombre'] . "</td>";
                            echo "<td>" . $row['id_producto'] . "</td>";
                            echo "<td>$" . $row['precio'] . "</td>";
                            echo "<td>" . $row['stock'] . "</td>";
                            echo "<td>" . $row['tipo'] . "</td>";
                            echo "<td>" . $row['descripcion'] . "</td>";
                            echo "<td>";
                            echo "<form action='edicion.php' method='POST' style='display:inline-block;'>";
                            echo "<input type='hidden' name='id' value='" . $row['id_producto'] . "'>";
                            echo "<button type='submit' name='editar' class='btn-action btn-edit'>Editar</button>";
                            echo "</form>";
                            echo "<form action='catalogo.php' method='POST' style='display:inline-block; margin-left:10px;'>";
                            echo "<input type='hidden' name='id' value='" . $row['id_producto'] . "'>";
                            echo "<button type='submit' name='eliminar' class='btn-action btn-delete'>Eliminar</button>";
                            echo "</form>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8' class='no-products'>No hay productos en el inventario</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
