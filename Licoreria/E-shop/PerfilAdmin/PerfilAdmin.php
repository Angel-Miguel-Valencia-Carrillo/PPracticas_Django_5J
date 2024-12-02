<?php 
session_start();
$admin = $_SESSION['login_user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario - SAJR MOTORS</title>
    <link rel="shortcut icon" href="../Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="stylePerfil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /*.container {
            margin-top: 50px;
        }*/

        .profile-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .profile-box h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        .profile-box p {
            color: #555;
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .btn {
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn:hover {
            background-color: #2980b9;
        }

        .logout-btn {
            background-color: #e74c3c;
            font-size: 1.1rem;
            padding: 10px 20px;
        }

        .logout-btn:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <!-- Contenido principal -->
    <div class="container">
        <div class="profile-box">
            <h2>Bienvenido, <?php echo htmlspecialchars($admin); ?> </h2>
            <p>¿Qué haremos hoy?</p>
            <a href="../index.php" class="btn logout-btn">Cerrar Sesión</a>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
