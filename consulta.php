<?php
$identrenadoractual = $_SESSION["id_entrenador"];
// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

    $sql = "SELECT * FROM entrenador WHERE id_entrenador = $identrenadoractual ";
    $stmt = $conexion->query($sql);
    $resultado = $stmt -> fetch();
    // var_dump($resultado);

    // Supongamos que $usuarioActual contiene la información del entrenador que ha iniciado sesión, como su nombre o ID.
// $usuarioActual = 'id_entrenador'; // Reemplaza esto con el nombre o ID del entrenador actual

// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <title>POKEDEX</title>
</head>
<body>
    <div>
<table>
    <tr>
        <th>nombre</th>
        <th>nivel</th>
    </tr>
    <tr>
                <td><?php echo $resultado['nombre']; ?></td>
                <td><?php echo $resultado['nivel']; ?></td>
    </tr>
</table>
</div>
    <header>
        <nav>
            <ul> 
                <a href="create.php">Captura tus pokemons</a>
                <a href="read.php">Entrenadores</a>
                <a href="update.php">Actualizar Entrenador</a>
                <a href="delete.php">Elimina un entrenador</a>
            </ul>
        </nav>
        <a href="/proyecto/inicio-registro/cerrar.php">Cerrar sesion</a>
    </header>
</body>
</html>