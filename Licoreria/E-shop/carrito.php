<?php 
include('conexion/conexion.php');
session_start();
$aviso = false;
$aviso2 = false;
if($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['id']) ) {
        $productID = $_POST['id'];
        $num = $_POST['num'];
        $sql = "SELECT stock FROM licores WHERE id_producto='$productID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); 
            $original = $row['stock'];
            $sql5 = "SELECT stock FROM carrito WHERE id_producto='$productID'";
            $resultados = $conn->query($sql5);
            if ($resultados->num_rows > 0) {
                $rows = $resultados->fetch_assoc();
                $nuevoSTOCK = $rows['stock'];
                $actualizar = $original + $nuevoSTOCK;
                $sql = "UPDATE licores SET stock = $actualizar WHERE id_producto = $productID";
                if ($conn->query($sql) === TRUE) {
                    //echo "<script type='text/javascript'>alert('Actualizado');</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
            else {

            }
        }
        else {
            
        }
        
        

        $sql = "DELETE FROM carrito WHERE id = $num";
        if ($conn->query($sql) === TRUE) {
            //echo "<script type='text/javascript'>alert('Borrada la tabla');</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    else {
        $accion = $_POST['accion'];
        
        if($accion == "Vaciar Carrito") {
            
                
            $sql = "SELECT * FROM carrito";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        $RUTA = $row['id_producto'];
                        $RUTA = $conn->real_escape_string($RUTA);

                        $sql2 = "SELECT stock FROM licores WHERE id_producto='$RUTA'";
                        $result2 = $conn->query($sql2);

                        if ($result2->num_rows > 0) {
                            $row2 = $result2->fetch_assoc(); 
                            $original = $row2['stock'];
                            $sql5 = "SELECT stock FROM carrito WHERE id_producto='$RUTA'";
                            $resultados = $conn->query($sql5);
                            if ($resultados->num_rows > 0) {
                                $rows = $resultados->fetch_assoc();
                                $nuevoSTOCK = $rows['stock'];
                                $actualizar = $original + $nuevoSTOCK;
                                $sql = "UPDATE licores SET stock = $actualizar WHERE id_producto = $RUTA";
                                if ($conn->query($sql) === TRUE) {
                                    //echo "<script type='text/javascript'>alert('Actualizado');</script>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                }
                            }
                            else {

                            }
                        }
                        else {

                        }
                        
                    }
                    
                } else {
                    $aviso2 = true;
                    //echo "<tr><td colspan='4'>No products found</td></tr>";
                }
                
            $sql = "DELETE FROM carrito";
            if ($conn->query($sql) === TRUE) {
                $aviso2 = true;
                //echo "<script type='text/javascript'>alert('Borrada la tabla');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            
        }
        else if ($accion == "Comprar") {
            //$sql = "DELETE FROM carrito";
            //if ($conn->query($sql) === TRUE) {
            //    echo "<script type='text/javascript'>alert('Compra realizada exitosamente');</script>";
            //} else {
            //    echo "Error: " . $sql . "<br>" . $conn->error;
            //}
            $aviso = true;
        }
    }
    

    

    
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito | SAJR MOTORS</title>
    <link rel="shortcut icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styleCarrito.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Estilos generales */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1, h2 {
            color: #333;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
        }

        .product-card img {
            border-radius: 10px 10px 0 0;
            width: 100%;
            height: auto;
            object-fit: cover;
        }

        .product-card-body {
            padding: 20px;
            text-align: center;
        }

        .product-card-body h5 {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .product-card-body p {
            font-size: 1rem;
            color: #888;
            margin-top: 10px;
        }

        .product-card-body .price {
            font-size: 1.25rem;
            color: #e74c3c;
            margin-top: 10px;
        }

        .product-card-body .quantity {
            margin-top: 10px;
            font-size: 1.1rem;
        }

        .product-card-body button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-card-body button:hover {
            background-color: #2980b9;
        }

        /* Totales y acciones */
        .summary {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }

        .summary h4, .summary h3 {
            color: #333;
        }

        .btn-action {
            width: 100%;
            background-color: #2ecc71;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            font-size: 1.2rem;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-action:hover {
            background-color: #27ae60;
        }

        .btn-clear {
            background-color: #e74c3c;
            margin-top: 10px;
        }

        .btn-clear:hover {
            background-color: #c0392b;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto;
            padding: 20px;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .close-button {
            color: #aaa;
            font-size: 28px;
            font-weight: bold;
            position: absolute;
            top: 10px;
            right: 25px;
            cursor: pointer;
        }

        .close-button:hover,
        .close-button:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<?php if ($aviso): ?>
        <script type="text/javascript">
            
            var aviso = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var aviso = false;
        </script>
    <?php endif; ?>

    <?php if ($aviso2): ?>
        <script type="text/javascript">
            
            var aviso2 = true;
        </script>
    <?php else: ?>
        <script type="text/javascript">
            var aviso2 = false;
        </script>
    <?php endif; ?>
<?php include("header.php"); ?>

<div class="container">
    <h1 class="text-center">Carrito de Compras</h1>
    <p class="text-muted text-center">Revisa los productos en tu carrito antes de proceder con la compra.</p>

    <div class="row">
        <?php
        $sql = "SELECT * FROM carrito";
        $result = $conn->query($sql);
        $precio = 0.00;

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $precio += $row['precioTotal'];

                echo "<div class='col-md-4'>";
                echo "<div class='product-card'>";
                echo "<img src='" . $row['image'] . "' alt='" . $row['name'] . "'>";
                echo "<div class='product-card-body'>";
                echo "<h5>" . $row['name'] . "</h5>";
                echo "<p class='price'>$" . number_format($row['precioTotal'], 2) . "</p>";
                echo "<p class='quantity'>Cantidad: " . $row['stock'] . "</p>";
                echo "<form action='carrito.php' method='POST'>";
                echo "<input type='hidden' name='id' value='" . $row['id_producto'] . "'>";
                echo "<input type='hidden' name='num' value='" . $row['id'] . "'>";
                echo "<button type='submit' name='eliminar' class='btn btn-danger'>Eliminar</button>";
                echo "</form>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12 text-center'>";
            echo "<p class='text-muted'>Tu carrito está vacío.</p>";
            echo "</div>";
        }
        ?>
    </div>

    <div class="summary">
        <?php 
        $iva = ($precio * 16) / 100;
        $total = $precio + $iva;
        ?>
        <h4>Subtotal: $<?php echo number_format($precio, 2); ?></h4>
        <h4>IVA (16%): $<?php echo number_format($iva, 2); ?></h4>
        <h3>Total: $<?php echo number_format($total, 2); ?></h3>

        <form action="carrito.php" method="post">
            <button type="submit" name="accion" value="Vaciar Carrito" class="btn btn-clear btn-action">Vaciar Carrito</button>
        </form>
        <form action="carrito.php" method="post">
            <button type="submit" name="accion" value="Comprar" class="btn btn-success btn-action">Comprar</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>

<!-- Modal para iniciar sesión -->
<div id="modal" class="modal">
    <div class="modal-content text-center">
        <span class="close-button" onclick="cerrarModal()">&times;</span>
        <p class="mensaje-modal">Lo lamentamos, pero para comprar tiene que iniciar sesión o registrarse.</p>
        <a href="LoginRegister.php" class="btn btn-primary mt-3">Iniciar Sesión / Registrarse</a>
    </div>
</div>

<!-- Modal para productos eliminados -->
<div id="modal2" class="modal">
    <div class="modal-content text-center">
        <span class="close-button" onclick="cerrarModal2()">&times;</span>
        <p class="mensaje-modal">Productos eliminados de su carrito.</p>
    </div>
</div>

<script src="script3.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
