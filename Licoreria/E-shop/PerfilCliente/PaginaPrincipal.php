<?php 
include('../conexion/conexion.php');
session_start();
$aviso = false;

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['nombre'];
    $imagen = $_POST['img'];
    $price = $_POST['precio'];
    $stock = $_POST['stock'];
    $productID = $_POST['product_id'];

    $stock2 = $stock;
    $name = $conn->real_escape_string($name);
    $price = $conn->real_escape_string($price);
    $productID = $conn->real_escape_string($productID);
    $imagen = $conn->real_escape_string($imagen);
    $stock2 = $conn->real_escape_string($stock2);


    $stock = $stock - 1;

    $stock = $conn->real_escape_string($stock);

    if($stock < 0) {
        $aviso = true;
        //echo "<script type='text/javascript'>alert('NO HAY PRODUCTO');</script>";
    }
    else {
        $sql = "UPDATE licores SET stock = $stock WHERE id_producto = $productID";

    if ($conn->query($sql) === TRUE) {
        //echo "<script type='text/javascript'>alert('Actualizado');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $sql = "SELECT price, stock, precioTotal FROM carrito WHERE id_producto='$productID'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nuevoStock = $row['stock'] + 1;
        $nuevoPrecio = $nuevoStock * $row['price'];

        $sql3 = "UPDATE carrito SET stock = $nuevoStock, precioTotal = $nuevoPrecio WHERE id_producto = $productID";
            if ($conn->query($sql3) === TRUE) {
                //echo "<script type='text/javascript'>alert('Agregado');</script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        
            
        
        
    }
    else {
        $sql = "INSERT INTO carrito (id_producto,name,price,precioTotal, stock, cantidad,image) VALUES ('$productID','$name', '$price', '$price', '1', $stock,'$imagen')";
            if ($conn->query($sql) === TRUE) {
                //echo "<script type='text/javascript'>alert('Agregado');</script>";

            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
    }

    
    }
    

    $_SESSION['nombre'] = $name;
    $_SESSION['img'] = $imagen;
    $_SESSION['precio'] = $price;
    $_SESSION['stock'] = $stock;
    $_SESSION['productID'] = $productID;

    

    //echo "<script type='text/javascript'>alert('$stock');</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleMover.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Productos | Valenciaga Drinks</title>
    <link rel="shortcut icon" href="Imagenes/Logo.png" type="image/x-icon">
    <style>
        /* Estilos para las tarjetas de productos */
        .card-container .card {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, rgba(143, 0, 0, 0.1), rgba(0, 0, 0, 0.1));
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-container .card:hover {
            transform: translateY(-15px);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.3);
        }

        /* Fondo de imagen dentro de la carta */
        .card-container .card-img-top {

            height: auto;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        /* Texto dentro de la tarjeta */
        .card-container .card-body {
            text-align: center;
            padding: 20px;
            color: #000;
        }

        .card-container .card-body h5 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-container .card-body p {
            font-size: 1rem;
            margin-top: 10px;
        }

        .card-container .card-body .text-primary {
            font-size: 1.2rem;
            font-weight: bold;
        }

        /* Botón "Agregar al Carrito" */
        .card-container .btn-primary {
            background-color: #191c57; /* Color burdeos para el botón */
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            margin-top: 15px;
            transition: background-color 0.3s;
            border-radius: 5px;
        }

        .card-container .btn-primary:hover {
            background-color: #9c4747;
        }

        /* Distintivo para productos en oferta o destacados */
        .badge {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #ff4c4c;
            color: white;
            padding: 5px 10px;
            font-size: 0.85rem;
            border-radius: 5px;
            font-weight: bold;
        }

        /* Estilo del botón "Volver Arriba" */
        .back_to_top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #8c3d3d;
            color: white;
            border-radius: 50%;
            padding: 10px;
            cursor: pointer;
            font-size: 24px;
            display: none;
            z-index: 1000;
        }

        .back_to_top.show {
            display: block;
        }

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
<?php include 'header.php'; ?>

<div class="container mt-5">
    <h1 class="text-center">Nuestros Productos</h1>
    <p class="text-center text-muted">Explora nuestra amplia gama de licores premium, vinos exclusivos y cervezas artesanales.</p>
    <div class="row card-container">
        <?php
        $sql = "SELECT * FROM licores";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='col-md-4 mb-4'>";
                echo "<form action='PaginaPrincipal.php' method='POST' class='card shadow-sm'>";
                // Si el producto tiene una etiqueta de "Oferta", agregamos un distintivo
                
                echo "<img src='" . $row['image'] . "' alt='" . $row['nombre'] . "' class='card-img-top'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['nombre'] . "</h5>";
                echo "<p class='card-text text-primary fw-bold'>$" . $row['precio'] . "</p>";
                echo "<p class='text-muted'>Stock: " . $row['stock'] . "</p>";

                echo "<input name='img' type='hidden' value='" . $row['image'] . "'>";
                echo "<input name='nombre' type='hidden' value='" . $row['nombre'] . "'>";
                echo "<input name='precio' type='hidden' value='" . $row['precio'] . "'>";
                echo "<input name='stock' type='hidden' value='" . $row['stock'] . "'>";
                echo "<input name='product_id' type='hidden' value='" . $row['id_producto'] . "'>";

                echo "<button type='submit' class='btn btn-primary w-100'>Agregar al Carrito</button>";
                echo "</div>";
                echo "</form>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12 text-center'>";
            echo "<p class='text-muted'>No se encontraron productos disponibles.</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>

<!-- Botón "Volver Arriba" -->
<div class="back_to_top">
    <ion-icon name="chevron-up-outline"></ion-icon>
</div>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-button" onclick="cerrarModal()">&times;</span>
        <p id="modal-message">Lo lamentamos, pero ya no hay de este producto</p>
    </div>
</div>

<?php include 'footer.php'; ?>

<script src="script4.js"></script>
<script
    type="module"
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js">
</script>
<script
    nomodule
    src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<script>
    // Mostrar botón de "volver arriba" al hacer scroll
    const backToTopButton = document.querySelector(".back_to_top");
    window.addEventListener("scroll", () => {
        if (window.pageYOffset > 100) {
            backToTopButton.classList.add("show");
        } else {
            backToTopButton.classList.remove("show");
        }
    });

    // Desplazarse suavemente hacia arriba al hacer clic en el botón
    backToTopButton.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
</script>
</body>
</html>
