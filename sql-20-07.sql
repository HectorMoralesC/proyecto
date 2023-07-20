SELECT entrenador.nombre, capturas.id_captura
FROM entrenador
INNER JOIN capturas ON entrenador.id_entrenador = capturas.id_entrenador;