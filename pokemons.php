<?php
// ConexiÃ³n a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Insertar los datos de los Pokémon en la tabla
foreach ($pokemonData as $pokemon) {
    $name = $pokemon['name'];
    $number = $pokemon['number'];
    $type = $pokemon['type'];

    $sql = "INSERT INTO pokedex (name, number, type) VALUES ('$name', '$number', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "Se insertó el Pokémon $name correctamente.<br>";
    } else {
        echo "Error al insertar el Pokémon $name: " . $conn->error . "<br>";
    }
}

header('Content-Type: application/json');
echo json_encode($pokemonData);

// Cerrar la conexiÃ³n a la base de datos
$conexion = null;
?>
