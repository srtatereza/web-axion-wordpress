<?php
ob_start();
session_start();
?>

<!doctype html>
<html lang="en">

<head>
	<title>Menu</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="../home.css" rel="stylesheet">
</head>

<body>


	<!-- CONTENEDOR CENTRAL-->
	<div class="contenedorCentral">

		<div class="menu">
			<img src="../imagenes/logo.jpg" alt="logo" class="logo">
			<ul class="menu-content">
				<li><?php ($_SESSION['email']) ??  false  ? $enlace = '<a href="usuario.php">Mi Área</a>' : $enlace = '<a href="login.php">Login</a>'; ?>
					<?php echo $enlace; ?></li>
				<li><a href="index.php">Conocenos</a></li>
				<li><a href="kitdigital.php">kig-Digital</a></li>
				<li><a href="servicios.php">Servicios</a></li>
				<li><a href="contacto.php">Contacto</a></li>
				<input type="text" placeholder="&#128270" required="buscar" class="buscar">
			</ul>
		</div>

		<header class="contactoFormulario">
			<h1 class="titulocontacto">¿EN QUÉ PODEMOS AYUDARTE? CONTACTANOS </h1>
			<p class="titulocontacto">Estamos a tu disposición para cualquier consulta o aclaración que desees realizar. Rellena el formulario y a continuación
				nos pondremos en contacto contigo en la mayor brevedad posible. Gracias por tu interés. </p>
			<div class="contacimg">

				<div class="imagencontacto">
					<img src="../imagenes/formularioContacto.jpg" alt="contacto" class="imgcontacto">
				</div>

				<div class="formulariocontacto">
					<form action="contacto.php" method="POST" class="formulario">
						<div class="form-group">
							<label>
								Nombre
							</label>
							<input type="text" name="registrado[nombre]" required autocomplete="off" placeholder="Tu nombre..." />
						</div>

						<div class="form-group">
							<label>
								Teléfono
							</label>
							<input type="text" name="registrado[telefono]" required autocomplete="off" placeholder="Tu número..." />
						</div>
						<div class="form-group">
							<label>
								E-mail
							</label>
							<input type="email" name="registrado[email]" required autocomplete="off" placeholder="Tu email..." />
						</div>
						<div class="form-group1">
							<label>
								Mensaje
							</label>
							<input type="mensaje" name="registrado[mensaje]" class="massage-bt" required autocomplete="off" placeholder="Tu mensaje..." />
						</div>

						<div class="form-group">
							<button type="submit" class="send_btn"></button><label> He leido y acepto la cláusula de Política de privacidad</label>
						</div>

						<div class="form-group">
							<button type="submit" class="send_btn">Enviar</button>
						</div>

				</div>

				</form>


			</div>

			<?php

			/* Recoger los datos del formulario. */
			$nombre = $_POST['registrado']['nombre'] ?? '';
			$telefono = $_POST['registrado']['telefono'] ?? '';
			$email = $_POST['registrado']['email'] ?? '';
			$mensaje = $_POST['registrado']['mensaje'] ?? '';


			/* Primera consulta: insertar una persona en la tabla personas. */

			/* 1. Conexión. */
			try {

				/* El include nos coge los datos de conexión almacenados en una carpeta privada del servidor. */
				include "conexion.php";

				@$conexion = mysqli_connect($host, $usuario, $pass, $nombreBD);
			} catch (Exception $e) {
			?>
				<p>Error. No se pudo establecer la conexión. Inténtelo más tarde.</p>
			<?php
				die();
			}

			/* Para no tener conflictos con acentos y similares, debemos indicarle a la conexión que nuestros datos se encuentran codificados en utf8. Para hacerlo, inmediatamente después de establecer la conexión, ejecutaremos el siguiente comando: */
			mysqli_set_charset($conexion, "utf8");

			/* 2. Ejecución de la consulta. */
			try {
				/* Primero, preparamos la consulta. */
				$sql1 = "INSERT INTO contacto(nombre, telefono, email, mensaje) VALUES ('$nombre','$telefono','$email', '$mensaje');";
				/* Ejecuto la consulta. */
				@$resultado = mysqli_query($conexion, $sql1);
			} catch (Exception $e) {
			?>
				<p>Error. No se pudo ejecutar la consulta. Inténtelo más tarde.</p>
			<?php
				die();
			}


			/* 3. Cierre de la conexión. */
			try {
				@mysqli_close($conexion);
			?>
				<!-- <p>La conexión se cerró con éxito.</p> -->
			<?php
			} catch (Exception $e) {
			?>
				<p>Error. No se pudo cerrar la conexión.</p>
			<?php
				die();
			}

			?>

	</div>
	<div>

		</header>

		<main class="contactoFormulario">
			<h1 class="titulocontacto"> PUEDES VISITARNOS, ESTAREMOS ENCANTADOS DE ATENDERTE!</h1>
			<p class="titulocontacto">Tenemos a disposición un equipo especializado para guiarte en todos los pases y lograr alcanzar tu objetivo</p>

			<div class="ubicacion">
				<img src="../imagenes/ubicacion.png" alt="ubicacion" class="ubicacion1">
			</div>
		</main>


		<div class="footer">
			<div>
				<div class="contacto">
					&copy; 2022 Axion Desarrollos. Created for free using WordPress and Colibri
					<br>Telefono: 632145203.
				</div>
			</div>
			<div class="Aviso">
				<ul class="politicas">
					<li><a href="politicasycookies.php">Aviso Legal y Política de Privacidad</a></li>
					<li><a href="politicasycookies.php">Política de Cookies</a></li>
				</ul>
			</div>

			<div class="iconos">
				<a href="https://www.facebook.com" target="_blank"><img src="../imagenes/facebook.png" alt="logo" class="icono"></a>
				<a href="https://www.instagram.com/hiroito_sushi/" target="_blank"><img src="../imagenes/instagram.png" alt="logo" class="icono"></a>
			</div>
		</div>

	</div>


</body>

</html>