<?php
include('../conexion/conexion.php');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $rol = $_POST['rol'];
    if ($rol == "eliminar") {
        $productID = $_POST['id'];
        $sql5 = "DELETE FROM cliente WHERE id_cliente='$productID'";
            if ($conn->query($sql5) === TRUE) {
                //echo "<script type='text/javascript'>alert('Actualizado');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }
    else {
    }
        
        
        

        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas Registradas - Admin</title>
    <link rel="shortcut icon" href="../Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styleUsuarios.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: 'Arial', sans-serif;
        }

        /*.container {
            margin-top: 50px;
        }*/

        .main-title {
            text-align: center;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 30px;
        }

        .card-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .user-card {
            background-color: white;
            margin: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 280px;
            text-align: center;
        }

        .user-card h3 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .user-card p {
            font-size: 1rem;
            margin-bottom: 10px;
            color: #555;
        }

        .user-card .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
        }

        .user-card .btn:hover {
            background-color: #2980b9;
        }

        .no-accounts {
            text-align: center;
            font-size: 1.2rem;
            color: #888;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <!-- Título principal -->
    <div class="main-title">Cuentas Registradas</div>

    <!-- Contenedor de tarjetas -->
    <div class="container">
        <div class="card-container">
            <?php
                $sql = "SELECT * FROM cliente";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<div class='user-card'>";
                        echo "<h3>ID: " . $row['id_Cliente'] . "</h3>";
                        echo "<p><strong>Nombre:</strong> " . $row['nombre'] . "</p>";
                        echo "<p><strong>Email:</strong> " . $row['correo'] . "</p>";
                        echo "<p><strong>Dirección:</strong> " . $row['direccion'] . "</p>";
                        echo "<p><strong>Teléfono:</strong> " . $row['telefono'] . "</p>";
                        echo "<form action='' method='POST'>";
                        echo "<input type='hidden' name='id' value='". $row['id_Cliente'] ."'>";
                        echo "<input type='hidden' name='rol' value='eliminar'>";
                        echo "<button type='submit' name='eliminar' class='btn'>Eliminar Cuenta</button>";
                        echo "</form>";
                        echo "</div>";
                    }
                } else {
                    echo "<div class='no-accounts'>No hay cuentas registradas</div>";
                }
            ?>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
