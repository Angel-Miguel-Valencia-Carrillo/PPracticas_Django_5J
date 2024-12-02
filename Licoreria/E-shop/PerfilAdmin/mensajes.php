<?php
include('../conexion/conexion.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensajes de Usuarios - Admin</title>
    <link rel="shortcut icon" href="../Imagenes/Logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styleMensajes.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        /*.container {
            margin-top: 50px;
        }*/

        .messages-box {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 0 auto;
        }

        .messages-box h2 {
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
            text-align: center;
        }

        table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #3498db;
            color: white;
        }

        tr:hover {
            background-color: #f2f2f2;
        }

        .action-btn {
            background-color: #3498db;
            color: white;
            padding: 8px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 0.9rem;
            text-decoration: none;
        }

        .action-btn:hover {
            background-color: #2980b9;
        }

        .delete-btn {
            background-color: #e74c3c;
        }

        .delete-btn:hover {
            background-color: #c0392b;
        }

        /* Ajustar el td que contiene el mensaje */
        td {
            word-wrap: break-word; /* Permite que el texto se ajuste */
            white-space: pre-line; /* Mantiene los saltos de línea en el mensaje */
            max-width: 400px; /* Limita el ancho para que no se expanda demasiado */
            overflow: hidden; /* Evita el desbordamiento si el mensaje es muy largo */
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <?php include("header.php") ?>

    <!-- Contenido principal -->
    <div class="container">
        <div class="messages-box">
            <h2>Mensajes de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>Autor</th>
                        <th>Email</th>
                        <th>Mensaje</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // Consulta para obtener mensajes
                        $sql = "SELECT * FROM mensajes ORDER BY fecha DESC"; // Asegúrate de tener la tabla de mensajes
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['nombre']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td>" . nl2br(htmlspecialchars($row['mensaje'])) . "</td>"; 
                                
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='4'>No hay mensajes de usuarios.</td></tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pie de página -->
    <?php include("footer.php") ?>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
