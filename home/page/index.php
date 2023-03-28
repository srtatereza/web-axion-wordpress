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

		<header>
			<div class="contenedor">
				<img class="hero" src=../imagenes/fondo.jpg alt="fondo" class="fondo">
				<div class="texto-encima">Si fuera tú, no me lo pensaría dos veces</div>
				<div class="centrado">Apuesta por la Mejor Tecnologia</div>

				<div class="botones">
					<spam><a href="contacto.php">Solicita Información</a></spam>
				</div>
			</div>
		</header>

		<main>
			<h1>Bienvenido a la nueva era Digital , tenemos multiples Servicio adaptados para ti a Precios Accesibles</h1>
			<div class="main-container">
				<div class="main-container__block1">
					<p> Lo más importante de un proyecto de digitalización es analizar
						la situación actual de nuestros clientes e identificar sus necesidades reales.
						Nuestro equipo te acompaña en todo el proceso de creación,
						mantenimiento y evolicuón de todo tu negocio digital.</p>
					<ul class="listaServicios">
						<li><a href="servicios.php">Diseño Web y SEO</a></li>
						<li><a href="servicios.php">Gestión de Redes Sociales</a></li>
						<li><a href="servicios.php">Ciberseguridad</a></li>
						<li><a href="servicios.php">Gestión de Clientes CRM</a></li>
					</ul>
				</div>

				<div class="main-container__block2">
					<img src=../imagenes/servicio.jpeg alt="servicios" class="servicios3">
					<div>
						<spam><a href="contacto.php">Contáctanos</a></spam>
					</div>
				</div>
			</div>
		</main>

		<div class="contenedor2">
			<h1 class="digital"> ¿Quieres trabajar con las mejores herramientas y soportes del mercado? </h1>
			<p class="texto2"> Nuestro principal objetivo es hacer crecer tu marca, y para ello contamos con un gran equipo compuesto por profesionales
				jóvenes, con ilusión, dinámicos y proactivos, especialistas cada uno de ellos en los diferentes ámbitos del marketing
				digital. Tenemos los conocimientos, las herramientas y las ganas necesarias para situar tu proyecto en el
				lugar que se merece.</p>
			<img class="herramientas" src=../imagenes/herramientas.png alt="herramienta">
		</div>


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