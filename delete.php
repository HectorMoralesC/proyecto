
<?php
session_start();
$identrenadoractual = $_SESSION["id_entrenador"];
// Conexion a la base de datos
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
    <title>Document</title>
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
    <!-- Formulario para eliminar un Pokemon -->
<h2>Eliminar Entrenador</h2>
<form action="" method="GET">
    ID del Entrenador: <input type="number" name="delete" required><br>
    <input type="submit" value="Eliminar">
</form>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>