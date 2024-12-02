<?php
include('../conexion/conexion.php');
$shouldPlaySound = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    // Prevenir SQL Injection
    $nombre = $conn->real_escape_string($nombre);
    $email = $conn->real_escape_string($email);
    $mensaje = $conn->real_escape_string($mensaje);

    $sql = "INSERT INTO mensajes (nombre, email, mensaje) VALUES ('$nombre', '$email', '$mensaje')";
    
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
    <title>Contacto | SAJR MOTORS</title>
    <link rel="shortcut icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background-color: #f9f9f9;
            font-family: 'Arial', sans-serif;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 {
            color: #333;
            font-weight: bold;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-top: 30px;
        }

        .social-icons a {
            text-decoration: none;
            color: inherit;
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .social-icons a:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .social-icons i {
            font-size: 2.5rem;
            transition: color 0.3s;
        }

        .social-icons .facebook:hover i {
            color: #1877f2;
        }

        .social-icons .tiktok:hover i {
            color: #000000;
        }

        .social-icons .instagram:hover i {
            color: #e4405f;
        }

        .social-icons .twitter:hover i {
            color: #1da1f2;
        }

        .social-icons .youtube:hover i {
            color: #ff0000;
        }

        .social-icons p {
            margin-top: 10px;
            color: #555;
            font-size: 1rem;
        }

        .contact-form {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        .contact-form h3 {
            margin-bottom: 30px;
            color: #333;
            font-size: 1.8rem;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box;
            font-size: 1rem;
        }

        .contact-form button {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
            transition: background-color 0.3s;
        }

        .contact-form button:hover {
            background-color: #2980b9;
        }

        .contact-details {
            display: flex;
            justify-content: space-between;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .contact-details .info-box {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
            margin-bottom: 30px;
        }

        .contact-details .info-box h4 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
        }

        .contact-details .info-box i {
            font-size: 2rem;
            color: #3498db;
        }

        /* Map container */
        .map-container {
            margin-top: 50px;
            position: relative;
            height: 400px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        /* Modal */
        .modal-content {
            text-align: center;
        }
    </style>
</head>
<body>

<?php include("header.php"); ?>

<div class="container text-center">
    <h1>¡Contáctanos!</h1>
    <p class="text-muted mb-4">Estamos aquí para ayudarte. Elige la mejor manera de ponerte en contacto con nosotros.</p>

    <!-- Redes Sociales -->
    <div class="social-icons">
        <a href="https://www.facebook.com/SammysStationeryOficial" target="_blank" class="facebook">
            <i class="bx bxl-facebook"></i>
            <p>Facebook</p>
        </a>
        <a href="https://www.tiktok.com/@Sammys.Stationery" target="_blank" class="tiktok">
            <i class="bx bxl-tiktok"></i>
            <p>TikTok</p>
        </a>
        <a href="https://www.instagram.com/Sammy_Stationery" target="_blank" class="instagram">
            <i class="bx bxl-instagram"></i>
            <p>Instagram</p>
        </a>
        <a href="https://twitter.com/SammysStationery" target="_blank" class="twitter">
            <i class="bx bxl-twitter"></i>
            <p>Twitter</p>
        </a>
        <a href="https://www.youtube.com/SammysStationery" target="_blank" class="youtube">
            <i class="bx bxl-youtube"></i>
            <p>YouTube</p>
        </a>
    </div>

    <!-- Formulario de contacto -->
    <div class="contact-form">
        <h3>Envíanos un mensaje</h3>
        <form action="contacto.php" method="POST">
            <input type="text" name="nombre" placeholder="Tu nombre" required>
            <input type="email" name="email" placeholder="Tu correo electrónico" required>
            <textarea name="mensaje" rows="4" placeholder="Escribe tu mensaje" required></textarea>
            <button type="submit">Enviar mensaje</button>
        </form>
    </div>

    <!-- Datos de contacto -->
    <div class="contact-details">
        <div class="info-box">
            <i class="bx bx-phone"></i>
            <h4>Teléfono</h4>
            <p>+123 456 789</p>
        </div>
        <div class="info-box">
            <i class="bx bx-envelope"></i>
            <h4>Correo Electrónico</h4>
            <p>contacto@sajrmotors.com</p>
        </div>
        <div class="info-box">
            <i class="bx bx-map"></i>
            <h4>Ubicación</h4>
            <p>Calle Ejemplo 123, Ciudad, País</p>
        </div>
    </div>

    <!-- Mapa -->
    <div class="map-container">
        <iframe src="https://www.google.com/maps/embed?pb=..." width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>

<?php include("footer.php"); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
