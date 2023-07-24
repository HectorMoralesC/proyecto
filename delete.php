<?php
$identrenadoractual = $_SESSION["id_entrenador"];
  
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
    font-family: 'Arial', sans-serif;
    background-color: #f5f5f5;
    padding: 20px;
    color: #333;
    background-image: url('pokedex_bg.jpg');
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
}

h2 {
    color: #4682B4; /* Pokémon-themed color */
}

form {
    margin-bottom: 20px;
}

input[type="number"],
input[type="text"] {
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #4682B4; /* Pokémon-themed color */
}

input[type="submit"] {
    background-color: #00CED1; /* Pokémon-themed color */
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
    <!-- Formulario para eliminar un Pokemon -->
<h2>Eliminar Entrenador</h2>
<form action="" method="GET">
    ID del Entrenador: <input type="number" name="delete" required><br>
    <input type="submit" value="Eliminar">
</form>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>