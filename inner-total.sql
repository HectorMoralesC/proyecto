SELECT capturas.id_captura , entrenador.nombre AS nombre_entrenador, pokedex.name AS pokemons_capturados
FROM (entrenador
INNER JOIN capturas ON entrenador.id_entrenador = capturas.id_entrenador)
INNER JOIN pokedex ON capturas.id_pokemon = pokedex.number  WHERE entrenador.id_entrenador = 12 ORDER BY capturas.id_captura;