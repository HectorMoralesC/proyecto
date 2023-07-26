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
// Operación UPDATE - Actualizar información de un Pokémon
if (isset($_POST["update"])) {
    $id_entrenador = $_POST["id_entrenador"];
    $nombre = $_POST["nombre"];
    $nivel = $_POST["nivel"];

    $sql = "UPDATE entrenador SET nombre=?, nivel=? WHERE id_entrenador=?";

    $stmt = $conexion->prepare($sql);
    $stmt->execute([$nombre, $nivel, $id_entrenador]);

    echo "Información del Pokémon actualizada exitosamente.";
}
// Cerrar la conexión a la base de datos
$conexion = null;
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
    background-image:url(https://anexogeek.com/wp-content/uploads/2022/09/6cfe7c143819d5edb18aa9c8e9d5da05.jpg);
    text-align: center;
    font-family: Arial, sans-serif;
            }

        h2 {
    text-align: center;
    color: black; /* Color azul turquesa */
            }

        h3{
    color: red;
            }
        table {
    width: 300px;
    margin: 0 auto;
    border-collapse: collapse;
    border: 2px solid #000000;
    background-color: #FFFFFF;
            }

th {
    background-color: #4684B4; /* Color azul turquesa */
    color: black;
    padding: 10px;
}

td {
    border: 1px solid #000000;
    padding: 10px;
}

input[type="number"],
input[type="text"],
textarea {
    width: 100%;
    padding: 5px;
    box-sizing: border-box;
}

input[type="submit"] {
    width: auto;
    margin-top: 10px;
    padding: 5px 20px;
    background-color: #4682B4; /* Color azul turquesa */
    color: #FFFFFF;
    border: none;
    cursor: pointer;
}

/* Estilos adicionales para el estilo Pokédex */

table {
    background-color: #4682B4;
}

th {
    background-color: #4682B4; /* Color azul turquesa */
}

input[type="submit"] {
    background-color: #00CED1; /* Color azul turquesa */
}
div {
        width: 50 px;
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
        padding: 5px;
        }

        td {
        border: 1px solid #000;
        padding: 5px;
        }
    </style>
</head>
<body>
    <h2>Actualizar información de entrenadores</h2>
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
    <table>
        <form action="" method="POST">
            <tr>
                <th>ID del Entrenador</th>
                <td><input type="number" name="id_entrenador" required></td>
            </tr>
            <tr>
                <th>Nombre</th>
                <td><input type="text" name="nombre" required></td>
            </tr>
            <tr>
                <th>Nivel</th>
                <td><input type="number" name="nivel" required></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="update" value="Actualizar"></td>
            </tr>
        </form>
    </table>

    
    <a href="/proyecto"><h3>VOLVER A LA POKEDEX</h3>
</body>
</html>
