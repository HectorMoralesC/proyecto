<?php session_start();

// Comprobamos si ya tiene una sesion
# Si ya tiene una sesion redirigimos al contenido, para que no pueda acceder al formulario
if (isset($_SESSION['inicio'])) {
	header('Location: index1.php');
	die();
}

// Comprobamos si ya han sido enviado los datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$usuario = filter_var(strtolower($_POST['inicio']), FILTER_SANITIZE_STRING);
	$contraseņa = $_POST['contraseņa'];
	$contraseņa = hash('123456', $contraseņa);

	// Nos conectamos a la base de datos
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=inicio_sesion', 'root', '');
	} catch (PDOException $e) {
		echo "Error:" . $e->getMessage();
	}

	$statement = $conexion->prepare('SELECT * FROM inicio WHERE inicio = :inicio AND contraseņa = :contraseņa');
	$statement->execute(array(
			':usuario' => $usuario,
			':contraseņa' => $contraseņa
		));

	$resultado = $statement->fetch();
	if ($resultado !== false) {
		$_SESSION['usuario'] = $usuario;
		header('Location: index1.php');
	} else {
		$errores = '<li>Datos incorrectos</li>';
	}
}

require 'views/login.view.php';

?>