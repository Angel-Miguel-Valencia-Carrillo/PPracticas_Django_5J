<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Valenciaga Drinks | Licorería Premium</title>
    <link rel="shortcut icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
  <?php include("header.php") ?>

  <main>
    <!-- Banner Principal -->
    <div class="container-fluid p-5 text-center bg-dark text-white" style="background-image: url('Imagenes/banner-licoreria.jpg'); background-size: cover; background-position: center;">
        <h1 class="display-4">¡Bienvenido a Valenciaga Drinks!</h1>
        <p class="lead">Descubre los mejores licores premium, vinos exclusivos y cervezas artesanales.</p>
        <a href="productos.php" class="btn btn-warning btn-lg">Explora Nuestros Productos</a>
    </div>

    <!-- Sección de Destacados -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Nuestros Productos Destacados</h2>
        <div class="row text-center">
            <div class="col-md-4">
                <img src="Imagenes/vino1.jpg" alt="Vino Tinto Premium" class="img-fluid rounded">
                <h3>Vino Tinto Reserva</h3>
                <p>Un vino de calidad excepcional para los paladares más exigentes.</p>
            </div>
            <div class="col-md-4">
                <img src="images/whiskyescocia.jpg" alt="Whisky Escocés" class="img-fluid rounded">
                <h3>Whisky Escocés</h3>
                <p>El sabor clásico de un whisky escocés premium, con notas ahumadas y especiadas.</p>
            </div>
            <div class="col-md-4">
                <img src="Imagenes/cerveza1.jpg" alt="Cerveza Artesanal" class="img-fluid rounded">
                <h3>Cerveza Artesanal</h3>
                <p>Disfruta de la frescura y el sabor único de nuestra cerveza artesanal.</p>
            </div>
        </div>
    </div>

    <!-- Slider de Promociones -->
    

    <!-- Sección Sobre Nosotros -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Sobre Valenciaga Drinks</h2>
        <p class="text-center">En Valenciaga Drinks nos especializamos en ofrecer licores exclusivos, vinos premium y cervezas artesanales de la más alta calidad. Nuestro compromiso es brindarte solo lo mejor para tus momentos especiales.</p>
    </div>

    <!-- Sección de Contacto -->
    <div class="container mt-5">
        <h2 class="text-center">Contáctanos</h2>
        <p class="text-center">¿Tienes dudas sobre nuestros productos? ¿Buscas algo específico? ¡Estamos aquí para ayudarte!</p>
        <div class="d-flex justify-content-center">
            <a href="contacto.php" class="btn btn-secondary btn-lg">Ir a Contacto</a>
        </div>
    </div>
  </main>

  <?php include("footer.php") ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
