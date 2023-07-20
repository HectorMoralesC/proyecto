<?php
// Conexión a la base de datos
try {
    $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

    $sql = "SELECT * FROM entrenador";
    $stmt = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
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
            background-color: #5F9EA0;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>nombre</th>
            <th>nivel</th>
        </tr>
        <?php foreach ($stmt as $entrenador): ?>
            <tr>
                <td><?php echo $entrenador['nombre']; ?></td>
                <td><?php echo $entrenador['nivel']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <a href="/proyecto"><h3>Volver a POKEDEX</h3>
</body>
</html>


