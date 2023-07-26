<?php
//Mantener sesion iniciada
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
//Tabla inicio sesión
$sql1 = "SELECT * FROM entrenador WHERE id_entrenador = $identrenadoractual ";
    $stmt = $conexion->query($sql1);
    $resultado = $stmt -> fetch();


//Operación CREATE - Agregar un nuevo Pokémon
/*if (isset($_POST["create"])) {
    $id_pokemon = $_POST["id_pokemon"];
  
    $sql = "INSERT INTO capturas VALUES (NULL, '$identrenadoractual', :id_pokemon)";

    $stmt = $conexion->prepare($sql);
    $stmt->execute(
        array(':id_pokemon'=> $id_pokemon)
    );

    
    echo "Pokémon capturado exitosamente.";
}*/


$name = "SELECT pokedex.name, capturas.id_captura
FROM pokedex
INNER JOIN capturas ON pokedex.number = capturas.id_pokemon;";

$sqlpokes = "SELECT pokedex.name FROM pokedex";
$consultapokes = $conexion->query($sqlpokes);
$pokemons = $consultapokes -> fetchAll();
// var_dump($pokemons);


    $stmt = $conexion->query($name);
    $resultadoname = $stmt -> fetch();

    $sql = "INSERT INTO capturas VALUES (NULL, '$identrenadoractual', :id_pokemon)";
// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
       body {
    text-align: center;
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    color: #333;
}

h2 {
    color: #00CED1; /* Pokémon-themed color */
}

form {
    margin-bottom: 20px;
}

input[type="number"],
input[type="text"],
textarea {
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #4682B4; /* Pokémon-themed color */
    border-radius: 4px;
}

input[type="number"]:focus,
input[type="text"]:focus,
textarea:focus {
    outline: none;
    border-color: #27408B; /* Pokémon-themed color */
}

input[type="submit"] {
    background-color: #00CED1; /* Pokémon-themed color */
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #769766; /* Pokémon-themed color */
}
div {
        width: 100 px;
        position: absolute;
        top: 20px;
        right: 20px;
        border-collapse: collapse;
        border: 2px solid #000;
        background-color: #5F9EA0; /* Pokémon-themed color */
        }


        th {
        background-color: #4682B4; /* Pokémon-themed color */
        color: #fff;
        padding: 10px;
        }

        td {
        border: 1px solid #000;
        padding: 10px;
        }

    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Capturar Pokémon</title>
</head>
<body>
<div>
    <!--Tabla inicio sesión-->
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
        <!-- Formulario para agregar un nuevo Pokémon  -->
    <h2>Capturar Pokémon</h2>
    <!--<form action="" method="POST">
       ID Pokémon: <input type="number" name="id_pokemon" required><br/>
        <input type="submit" name="create" value="Capturar">
    </form>-->

     Selecciona un Pokemon para atrapar: 
    <form action="capturados.php" method="get">
			<select>
				<option value=""></option>
				<?php foreach ($pokemons as $pokemon): ?>
					<option value="<?php echo $pokemon['id']; ?>">
						<?php echo $pokemon['name']; ?>
					</option>
				<?php endforeach; ?>
			</select>
            <input type="submit" name="submit" class="btn btn-primary" value="Capturar">
        </form> 

    <!-- Botón para volver a inicio -->
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>
