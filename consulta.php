<?php

    try {
        $conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
    } catch(PDOException $e){
        echo "Error: " . $e->getMessage();
    }

    //Buscar datos PO
    $statementPokedex = $conexion->query('SELECT id FROM pokedex');
    //Otro paquete de informaci�n en un array del registro de la ID seleccionada por el formulario
    $resultadosPokedex = $statementPokedex->fetchAll();
    //Como mostramos los datos

    //Buscar datos del formulario "READ" SQL
    $statementEntrenador = $conexion->query('SELECT id FROM entrenador');
    //Otro paquete de informaci�n en un array del registro de la ID seleccionada por el formulario
    $resultadosEntrenador = $statementEntrenador->fetchAll();

?>
