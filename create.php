<?php
session_start();
$identrenadoractual = $_SESSION["id_entrenador"];
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
    //$id_captura = $_POST["id_captura"];
    //$id_entrenador = $_POST["id_entrenador"];
    $id_pokemon = $_POST["id_pokemon"];
  
    $sql = "INSERT INTO capturas VALUES (NULL, '$identrenadoractual', :id_pokemon)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute(
        array(':id_pokemon'=> $id_pokemon)
    );
    
    echo "Pokémon capturado exitosamente.";
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
    <title>Capturar Pokémon</title>
</head>
<body>
        <!-- Formulario para agregar un nuevo Pokémon -->
    <h2>Capturar Pokémon</h2>
    <form action="" method="POST">
       ID Pokémon: <input type="number" name="id_pokemon" required><br>
   

        <input type="submit" name="create" value="Capturar">
    </form>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>
