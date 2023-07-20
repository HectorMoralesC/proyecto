<?php
// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

// Operación CREATE - Agregar un nuevo Pokémon
if (isset($_POST["create"])) {
    $id_entrenador = $_POST["id_entrenador"];
    $nombre = $_POST["nombre"];
    $nivel = $_POST["nivel"];
    $equipo = $_POST["equipo"];

    $sql = "INSERT INTO entrenador (id_entrenador, nombre, nivel, equipo) VALUES (?, ?, ?, ?)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_entrenador, $nombre, $nivel, $equipo]);

    echo "Pokémon agregado exitosamente.";
}




// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }
        
        h2 {
            color: #5F9EA0;
        }
        
        form {
            margin-bottom: 20px;
        }
        
        input[type="number"],
        input[type="text"],
        textarea {
            padding: 5px;
            margin-bottom: 10px;
        }
        
        input[type="submit"] {
            background-color: #17e628;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <!-- Formulario para agregar un nuevo Pokémon -->
    <h2>Agregar Pokémon</h2>
    <form action="" method="POST">
        ID Entrenador: <input type="number" name="id_entrenador" required><br>
        Nombre: <input type="text" name="nombre" required><br>
        Nivel: <input type="number" name="nivel" required><br>
        Equipo: <textarea name="equipo" required></textarea><br>
        <input type="submit" name="create" value="Agregar">
    </form>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>
