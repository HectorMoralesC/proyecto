<!-- <!DOCTYPE html>
<html lang="en">
  	<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>POKEDEX</title>
      <link rel="stylesheet" href="estilos.css">
  	</head>
  	<body onload="getPokemon()">
      <h1 style="text-align:center">POKEDEX</h1>
      <div class="pokedex">
          <div class="info-display center">
            <form name="pokemonKeySend" method="POST" action="">
              <input type="text" id="pokemonId" name="pokemonId" class="id-display" value="" onKeyUp="pokemonKeyId()"/>
            </form>
            <div class="name-display">
              <b id="name-display"></b>
            </div>
          </div>
          <div style="clear: both;"></div>
          <div class="pokemon-display">
            <div class="pokemon">
              <img id="imgPokemon" src="" width="100%" height="100%">
            </div>
            <div class="pokemon type">
              <span id="pokemonType"></span>
            </div>
          <div class="api">
          </div>
          <div class="center dev">
            </a>
          </div>
        </div>
        <script src="javaScript.js"></script> 
    </body>
</html> -->

  <?php 
  session_start();

  // Comprobamos tenga sesion, si no entonces redirigimos y MATAMOS LA EJECUCION DE LA PAGINA.
  if (isset($_SESSION['nombre'])) {
    require 'consulta.php';
  } else {
    header('Location: /proyecto/inicio-registro/login.php');
    die();
  }
?>