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
$sql1 = "SELECT * FROM entrenador WHERE id_entrenador = $identrenadoractual ";
    $stmt = $conexion->query($sql1);
    $resultado = $stmt -> fetch();
    $sql = "SELECT * FROM entrenador";
    $stmt = $conexion->query($sql);
    
// Obtener información de capturas
$sqlCapturas = "SELECT capturas.id_captura, capturas.id_pokemon, entrenador.nombre AS nombre_entrenador, pokedex.name AS pokemons_capturados
               FROM (entrenador
               INNER JOIN capturas ON entrenador.id_entrenador = capturas.id_entrenador)
               INNER JOIN pokedex ON capturas.id_pokemon = pokedex.number
               WHERE entrenador.id_entrenador = $identrenadoractual
               ORDER BY capturas.id_captura";
$queryCaptura = $conexion->query($sqlCapturas);
$resultadoCapturas = $queryCaptura->fetchAll();
//var_dump($resultadoCapturas);
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       body {
    font-family: 'Arial', sans-serif;
    text-align: center;
    background-color: #f5f5f5;
    padding: 20px;
    color: #333;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #00CED1; /* Pokémon-themed color */
    color: #fff;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

tr:hover {
    background-color: #ddd;
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
</br>
</br>
</br>
</br>
</br>
    <table>
        <tr>
            <th>Número Captura</th>
            <th>Pokémon</th>
            <th>Imagen</th>
        </tr>
        <?php foreach ($resultadoCapturas as $captura): ?> <!-- Utilizamos $resultadoCapturas en lugar de $stmt -->
        <tr>
            <td><?php echo $captura['id_captura']; ?></td> <!-- Utilizamos el nombre del entrenador de la captura -->
            <td><?php echo $captura['pokemons_capturados']; ?></td> <!-- Mostramos el nombre del Pokémon capturado -->
            <td> <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/<?php echo $captura['id_pokemon']; ?>.png"> </td> <!-- Ajustamos el índice para obtener el número correcto del Pokémon -->
        </tr>
    <?php endforeach; ?>
    </table>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>


