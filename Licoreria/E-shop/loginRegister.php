<?php 
session_start();
include('conexion/conexion.php');
$usuarioInfound = false;
$passwordIncorrect = false;
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    if ($accion == "login") {
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $username = $_POST['username'];
            $password = $_POST['clave'];

            
            //Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);

            $sql = "SELECT id_Cliente, password FROM cliente WHERE nombre='$username'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password,$row['password'])) {
                    $_SESSION['login_user']=$username;
                    if ($_SESSION['login_user'] == "Valencia_Admin") {
                        header("Location: PerfilAdmin/PerfilAdmin.php");
                    }
                    else {
                        header("Location: PerfilCliente/PaginaPrincipal.php");
                    }
                    
                }
                else {
                    $usuarioInfound = true;

                /*echo "Invalid password";*/ 
                }
                
            }
            else {
                $passwordIncorrect = true;
                /*echo "No user found.";*/
            }
        }
    }
    else if ($accion == "register") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['user'];
            $password = $_POST['password'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];

            // Prevenir SQL Injection
            $username = $conn->real_escape_string($username);
            $password = $conn->real_escape_string($password);
            $correo = $conn->real_escape_string($correo);
            $direccion = $conn->real_escape_string($direccion);
            $telefono = $conn->real_escape_string($telefono);
        
            // Hash de la contraseña
            $password_hashed = password_hash($password, PASSWORD_BCRYPT);
        
            $sql = "INSERT INTO cliente (nombre, correo, password, direccion, telefono) VALUES ('$username', '$correo','$password_hashed', '$direccion', '$telefono')";
        
            if ($conn->query($sql) === TRUE) {
                $shouldShowAlert = true;
        
            if ($shouldShowAlert) {
                $_SESSION['login_user']=$username;
                //echo "<script type='text/javascript'>alert('Usuario registrado');</script>";
                header("Location: PerfilCliente/PaginaPrincipal.php");
            }
                /*echo "User registered successfully!";*/
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
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
    <title>Valenciaga Drinks - Iniciar sesión / Registro</title>
    <link rel="shortcut icon" href="Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #191c57;
            font-family: 'Arial', sans-serif;
        }

        .main-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #191c57);
        }

        .form-container {
            background: #ffffff;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            transition: transform 0.3s ease-in-out;
        }

        .form-container:hover {
            transform: translateY(-10px);
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }

        .form-container input {
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 10px;
            font-size: 1rem;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #191c57;
            color: white;
            border: none;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease-in-out;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .form-container p {
            text-align: center;
            font-size: 1rem;
            color: #777;
        }

        .form-container a {
            color: #191c57;
            text-decoration: none;
        }

        .form-container a:hover {
            text-decoration: underline;
        }

        .toggle-form {
            text-align: center;
            margin-top: 10px;
            cursor: pointer;
            font-size: 1rem;
            color: #191c57;
        }

        .toggle-form:hover {
            color: #2980b9;
        }

        .form-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-header a {
            color: #333;
            text-decoration: none;
            font-weight: bold;
        }

        .form-header a:hover {
            color: #3498db;
        }

        .alert {
            display: none;
            padding: 10px;
            background-color: #f44336;
            color: white;
            margin-top: 10px;
            border-radius: 5px;
            text-align: center;
        }
    </style>
</head>
<body>
  <?php include("header.php"); ?>

  <main class="main-container">
      <div class="form-container" id="form-login">
          <h2>Iniciar sesión</h2>
          <form action="LoginRegister.php" method="post">
              <input type="hidden" name="accion" value="login">
              <input type="text" name="username" placeholder="Nombre de usuario" class="input" required>
              <input type="password" name="clave" placeholder="Clave" class="input" required>
              <input type="submit" value="Entrar" class="button">
          </form>
          <p>¿No tienes cuenta? <span class="toggle-form" onclick="toggleForms()">Regístrate aquí</span></p>
      </div>

      <div class="form-container" id="form-register" style="display:none;">
          <h2>Crea tu cuenta</h2>
          <form action="LoginRegister.php" method="post">
              <input type="hidden" name="accion" value="register">
              <input type="text" name="user" placeholder="Nombre de usuario" class="input" required>
              <input type="email" name="correo" placeholder="Correo electrónico" class="input" required>
              <input type="password" name="password" placeholder="Clave" class="input" required>
              <input type="text" name="direccion" placeholder="Dirección" class="input" required>
              <input type="number" name="telefono" placeholder="Teléfono" class="input" required>
              <input type="submit" value="Crear cuenta" class="button">
          </form>
          <p>¿Ya tienes cuenta? <span class="toggle-form" onclick="toggleForms()">Inicia sesión aquí</span></p>
      </div>

      <div class="alert" id="alert-message">
          <span>¡Por favor, completa todos los campos!</span>
      </div>
  </main>

  <?php include("footer.php"); ?>

  <script>
      function toggleForms() {
          var loginForm = document.getElementById('form-login');
          var registerForm = document.getElementById('form-register');
          if (loginForm.style.display === "none") {
              loginForm.style.display = "block";
              registerForm.style.display = "none";
          } else {
              loginForm.style.display = "none";
              registerForm.style.display = "block";
          }
      }

      <?php if ($usuarioInfound): ?>
          document.getElementById("alert-message").style.display = "block";
          document.getElementById("alert-message").textContent = "Usuario no encontrado!";
      <?php endif; ?>

      <?php if ($passwordIncorrect): ?>
          document.getElementById("alert-message").style.display = "block";
          document.getElementById("alert-message").textContent = "Contraseña incorrecta!";
      <?php endif; ?>
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
