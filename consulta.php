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

// Operación READ - Obtener todos los Pokémon de la Pokédex
if (isset($_GET["read"])) {
    $sql = "SELECT * FROM entrenador";
    $stmt = $conexion->query($sql);

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "id_entrenador: " . $row["id_entrenador"] . "<br>";
            echo "Nombre: " . $row["nombre"] . "<br>";
            echo "nivel: " . $row["nivel"] . "<br>";
            echo "equipo: " . $row["equipo"] . "<br><br>";
        }
    } else {
        echo "No se encontró ningún entrenador.";
    }
}

// Operación UPDATE - Actualizar información de un Pokémon
if (isset($_POST["update"])) {
    $id_entrenador = $_POST["id_entrenador"];
    $nombre = $_POST["nombre"];
    $nivel = $_POST["nivel"];
    $equipo = $_POST["equipo"];

    $sql = "UPDATE entrenador SET nombre=?, nivel=?, equipo=? WHERE id_entrenador=?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $nivel, $equipo, $id_entrenador]);

    echo "Información del Pokémon actualizada exitosamente.";
}

// Operación DELETE - Eliminar un Pokémon
if (isset($_GET["delete"])) {
    $id_entrenador = $_GET["delete"];

    $sql = "DELETE FROM entrenador WHERE id_entrenador=?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$id_entrenador]);

    echo "Entrenador eliminado exitosamente.";
}

// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!-- Formulario para agregar un nuevo Pokémon -->
<h2>Agregar Pokémon</h2>
<form action="" method="POST">
    ID Entrenador: <input type="number" name="id_entrenador" required><br>
    Nombre: <input type="text" name="nombre" required><br>
    Nivel: <input type="number" name="nivel" required><br>
    Equipo: <textarea name="equipo" required></textarea><br>
    <input type="submit" name="create" value="Agregar">
</form>

<!-- Botón para obtener todos los Pokémon -->
<a href="?read">Mostrar todos los entrenadores</a>

<!-- Formulario para actualizar información de un Pokémon -->
<h2>Actualizar información de entrenadores</h2>
<form action="" method="POST">
    ID del Entrenador: <input type="number" name="id_entrenador" required><br>
    Nombre: <input type="text" name="nombre" required><br>
    Nivel: <input type="number" name="nivel" required><br>
    Equipo: <textarea name="equipo" required></textarea><br>
    <input type="submit" name="update" value="Actualizar">
</form>

<!-- Formulario para eliminar un Pokémon -->
<h2>Eliminar Pokémon</h2>
<form action="" method="GET">
    ID del Entrenador: <input type="number" name="delete" required><br>
    <input type="submit" value="Eliminar">
</form>
