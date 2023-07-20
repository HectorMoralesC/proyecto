
<?php

// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}
// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POKEDEX</title>
</head>
<body>
    <header>
        <nav>
            <ul> 
                <a href="create.php">Crea un entrenador</a>
                <a href="read.php">Entrenadores</a>
                <a href="update.php">Actualizar Pokemon</a>
                <a href="delete.php">Elimina un entrenador</a>
            </ul>
        </nav>
        <a href="/proyecto/inicio-registro/cerrar.php">Cerrar sesion</a>
    </header>

