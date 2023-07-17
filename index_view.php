
  <?php 

	$errores = '';
	$enviado = false;

	//Si hemos hecho clic sobre el botÃ³n de BUSCAR:
	if (isset($_POST['submit'])) {
		//Guardaremos el valor asignado por el usuario de la id en la variable $id
		$codigo = $_POST['codigo'];
		//Error si no hay "codigo" seleccionada
		if (empty($codigo)) {
			$errores .= 'Por favor selecciona un código';
		}
		//Si han dado una codigo, cambiamos el $enviado a true, es decir, se enviarÃ¡ el formulario 
		if(!$errores){
			$enviado = true;
		}
	}

	require 'index_view.php';

	//A partir del envio del formulario, se conecta y envia  a la base de datos esa ID
	if ($enviado){
		//ConexiÃ³n PDO a BBDD
		try {
			
			$conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');	
			//echo "ConexiÃ³n OK";

		} catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		}

		//Buscar datos del formulario "READ" SQL
		$statement = $conexion->prepare('SELECT * FROM pokedex WHERE id = :codigo');
		$statement->execute(
			array(':codigo'=> $codigo)
		);

		//Otro paquete de información en un array del registro de la ID seleccionada por el formulario
		$resultados = $statement->fetch();
		
		//Como mostramos los datos
		if($resultados){
			echo "<p class='resultado'> Resultado de la bÃºsqueda:</br> ";
			echo "ID:" . $resultados['id'] . ' </br> ' . "POKEMON:" .$resultados['pokemon']. ' </br> ' . "TIPO:" .$resultados['tipo']. ' </br> ' . "PS:" .$resultados['ps'].' </br> '. "PESO:" . $resultados['peso'];
			echo "</p>";
		} 
		//Si no hay datos en la tabla cliente
		else {
			echo "<p style='text-align:center' class='resultado'>No existe este POKEMON $codigo</p>";
		}

	}




    
	
?>
