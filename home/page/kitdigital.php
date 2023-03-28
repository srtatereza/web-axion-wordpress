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
				<div class="texto-encima">¿Lo tuyo no son las tecnologías?</div>
				<div class="centrado"> No te preocupes, déjalo en nuestras manos.</div>

				<div class="botones">
					<spam><a href="contacto.php">Solicita Información</a></spam>
				</div>
			</div>
		</header>


		<main>
			<div class="descripciones">
				<h1>¿Quieres digitalizar tu empresa de forman gratuita?</h1>
				<h2>Consigue las subvenciones gratuitas para la digitalización 2022 de hasta 12.000 €</h2>
			</div>

			<div class="contenedor3">
				<div class="imagenServicio">
					<img class="servicio2" src=../imagenes/kitdigital.png alt="kit">
				</div>
				<div class="texto-centrado2">
					<h2 class="textoC"> ¿QUÉ ES EL KIT DIGITAL?</h2>
					<p> Es un programa público del gobierno de España que pretende subvencionar las mejoras e implantaciones de herramientas y servicios digitales disponibles en el mercado para modernizar tu empresa.
					</p>
					<p> Mediante ayudas económicas financiado por los fondos Next Generation EU dirigido a autónomos y
						pymes de España se quiere contribuir a la adopción de soluciones tecnológicas para su digitalización.</p>

					<img class="imagenSello" src=../imagenes/sellos.png alt="fondo">
				</div>
			</div>

			<div class="descripciones">
				<h1>DESCUBRE TODAS LAS SOLUCIONES DIGITALES QUE TE PUEDES SUBVENCIONAR</h1>
			</div>

			<div class="contenedor3">
				<div class="imagenServicio">
					<img class="servicio2" src=../imagenes/ofertas.png alt="kit">
				</div>
				<div class="texto-centrado2">
					<h2 class="textoC">¿Qué empresas podrán beneficiarse del Kit Digital?</h2>
					<p> Podrán ser beneficiarias de estas ayudas las pequeñas empresas, microempresas y personas en situación de autoempleo cuyo domicilio fiscal esté ubicado en territorio español.
					</p>
					<p> El objetivo principal es que las pequeñas y medianas empresas compren servicios que existan en el mercado para mejorar la ciberseguridad o para desarrollar una página web, entre otras finalidades.Las empresas tienen que inscribirse en el portal Acelera Pyme y podrán contratar los servicios a partir de febrero de 2022.</p>
				</div>
			</div>


			<div class="contenedor">
				<h1> Las empresas tienen que inscribirse en el portal Acelera Pyme y podrán contratar los servicios a partir de febrero de 2022.</h1>
				<p>El objetivo principal es que las pequeñas y medianas empresas compren servicios que existan en el mercado para mejorar la ciberseguridad o para desarrollar una página web, entre otras finalidades.</p>
				<img class="hero" src=../imagenes/promociones.png alt="promociones" class="fondo">
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