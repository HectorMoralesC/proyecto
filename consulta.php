<?php

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    //Buscar datos del formulario "READ" SQL
    $statementEntrenador = $conexion->query('SELECT id FROM entrenador');
    //Otro paquete de información en un array del registro de la ID seleccionada por el formulario
    $resultadosEntrenador = $statementEntrenador->fetchAll();

?>
