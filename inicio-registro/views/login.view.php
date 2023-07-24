<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/estilos.css">
	<title>Iniciar Sesion</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">Iniciar Sesion</h1>
		
		<hr class="border">

		<form class="formulario" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="form-group">
				<i class="icono izquierda fa fa-user"></i><input class="name" type="text" name="nombre" placeholder="Name">
			</div>

			<div class="form-group">
				<i class="icono izquierda fa fa-lock"></i><input class="password_btn" type="password" name="password" placeholder="Password">
				<i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
			</div>

			<!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
			<?php if(!empty($errores)): ?>
				<div class="error">
					<ul>
						<?php echo $errores; ?>
					</ul>
				</div>
			<?php endif; ?>
		</form>

		<p class="texto-registrate">
			Aun no tienes cuenta ?
			<a href="registrate.php">Registrate</a>
		</p>

	</div>
	<script>
        // Detectar el evento "keydown" en los campos de entrada
        document.addEventListener("keydown", function (event) {
            // Verificar si la tecla presionada es la tecla "Enter"
            if (event.key === "Enter") {
                // Obtener el elemento que tiene el foco actualmente
                const focusedElement = document.activeElement;

                // Si el elemento con el foco es un campo de entrada, enviar el formulario
                if (focusedElement.tagName === "INPUT") {
                    document.login.submit();
                }
            }
        });
    </script>
</body>
</html>