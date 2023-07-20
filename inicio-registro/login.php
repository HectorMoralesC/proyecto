<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['nombre'])) {
	header('Location: index.php');
	die();
}

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$nombre = strtolower($_POST['nombre']);
	$password = $_POST['password'];
	$password = hash('sha512', $password);

	// Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=proyectopokedex', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM entrenador WHERE nombre = :nombre AND pass = :password');
	$statement->execute(array(
			':nombre' => $nombre,
			':password' => $password
		));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['nombre'] = $nombre;
		header('Location: index.php');
	} else {
		$errores = '<li>Datos incorrectos</li>';
	}
}

require 'views/login.view.php';

?>