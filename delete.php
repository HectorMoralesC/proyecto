<?php
// Conexion a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}
// Operacion DELETE - Eliminar un Pokemon
if (isset($_GET["delete"])) {
    $id_entrenador = $_GET["delete"];

    $sql = "DELETE FROM entrenador WHERE id_entrenador=?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_entrenador]);

    echo "Entrenador eliminado exitosamente.";
}
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>  <style>
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
        input[type="text"] {
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
    <!-- Formulario para eliminar un Pokemon -->
<h2>Eliminar Pokemon</h2>
<form action="" method="GET">
    ID del Entrenador: <input type="number" name="delete" required><br>
    <input type="submit" value="Eliminar">
</form>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>