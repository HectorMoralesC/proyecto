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
// Datos de los Pokémon (puedes extender esta lista con más Pokémon)
$pokemonData = [
    ['name' => 'Bulbasaur', 'number' => '001', 'type' => 'Grass/Poison'],
    ['name' => 'Ivysaur', 'number' => '002', 'type' => 'Grass/Poison'],
    ['name' => 'Venusaur', 'number' => '003', 'type' => 'Grass/Poison'],
    ['name' => 'Charmander', 'number' => '004', 'type' => 'Fire'],
    ['name' => 'Charmeleon', 'number' => '005', 'type' => 'Fire'],
    ['name' => 'Charizard', 'number' => '006', 'type' => 'Fire/Flying'],
    ['name' => 'Squirtle', 'number' => '007', 'type' => 'Water'],
    ['name' => 'Wartortle', 'number' => '008', 'type' => 'Water'],
    ['name' => 'Blastoise', 'number' => '009', 'type' => 'Water'],
    ['name' => 'Caterpie', 'number' => '010', 'type' => 'Bug'],
    ['name' => 'Pikachu', 'number' => '025', 'type' => 'Electric'],
    ['name' => 'Raichu', 'number' => '026', 'type' => 'Electric'],
    ['name' => 'Sandshrew', 'number' => '027', 'type' => 'Ground'],
    ['name' => 'Sandslash', 'number' => '028', 'type' => 'Ground'],
    ['name' => 'Nidoran♀', 'number' => '029', 'type' => 'Poison'],
    ['name' => 'Nidorina', 'number' => '030', 'type' => 'Poison'],
    ['name' => 'Nidoqueen', 'number' => '031', 'type' => 'Poison/Ground'],
    ['name' => 'Nidoran♂', 'number' => '032', 'type' => 'Poison'],
    ['name' => 'Nidorino', 'number' => '033', 'type' => 'Poison'],
    ['name' => 'Nidoking', 'number' => '034', 'type' => 'Poison/Ground'],
    ['name' => 'Clefairy', 'number' => '035', 'type' => 'Fairy'],
    ['name' => 'Clefable', 'number' => '036', 'type' => 'Fairy'],
    ['name' => 'Vulpix', 'number' => '037', 'type' => 'Fire'],
    ['name' => 'Ninetales', 'number' => '038', 'type' => 'Fire'],
    ['name' => 'Jigglypuff', 'number' => '039', 'type' => 'Normal/Fairy'],
    ['name' => 'Wigglytuff', 'number' => '040', 'type' => 'Normal/Fairy'],
    ['name' => 'Zubat', 'number' => '041', 'type' => 'Poison/Flying'],
    ['name' => 'Golbat', 'number' => '042', 'type' => 'Poison/Flying'],
    ['name' => 'Oddish', 'number' => '043', 'type' => 'Grass/Poison'],
    ['name' => 'Gloom', 'number' => '044', 'type' => 'Grass/Poison'],
    ['name' => 'Vileplume', 'number' => '045', 'type' => 'Grass/Poison'],
    ['name' => 'Paras', 'number' => '046', 'type' => 'Bug/Grass'],
    ['name' => 'Parasect', 'number' => '047', 'type' => 'Bug/Grass'],
    ['name' => 'Venonat', 'number' => '048', 'type' => 'Bug/Poison'],
    ['name' => 'Venomoth', 'number' => '049', 'type' => 'Bug/Poison'],
    ['name' => 'Diglett', 'number' => '050', 'type' => 'Ground'],
    ['name' => 'Dugtrio', 'number' => '051', 'type' => 'Ground'],
    ['name' => 'Meowth', 'number' => '052', 'type' => 'Normal'],
    ['name' => 'Persian', 'number' => '053', 'type' => 'Normal'],
    ['name' => 'Psyduck', 'number' => '054', 'type' => 'Water'],
    ['name' => 'Golduck', 'number' => '055', 'type' => 'Water'],
    ['name' => 'Mankey', 'number' => '056', 'type' => 'Fighting'],
    ['name' => 'Primeape', 'number' => '057', 'type' => 'Fighting'],
    ['name' => 'Growlithe', 'number' => '058', 'type' => 'Fire'],
    ['name' => 'Arcanine', 'number' => '059', 'type' => 'Fire'],
    ['name' => 'Poliwag', 'number' => '060', 'type' => 'Water'],
    ['name' => 'Poliwhirl', 'number' => '061', 'type' => 'Water'],
    ['name' => 'Poliwrath', 'number' => '062', 'type' => 'Water/Fighting'],
    ['name' => 'Abra', 'number' => '063', 'type' => 'Psychic'],
    ['name' => 'Kadabra', 'number' => '064', 'type' => 'Psychic'],
    ['name' => 'Alakazam', 'number' => '065', 'type' => 'Psychic'],
];

header('Content-Type: application/json');
echo json_encode($pokemonData);

// Cerrar la conexiÃ³n a la base de datos
$conexion = null;
?>
