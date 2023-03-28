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
			<li><?php ($_SESSION['email']) ??  false  ? $enlace = '<a href="usuario.php">Mi Área</a>' : $enlace = '<a href="login.php">Login</a>';?>
            	<?php echo $enlace; ?></li>
				<li><a href="index.php">Conocenos</a></li>
				<li><a href="kitdigital.php">kig-Digital</a></li>
				<li><a href="servicios.php">Servicios</a></li>
				<li><a href="contacto.php">Contacto</a></li>
				<input type="text" placeholder="&#128270" required="buscar" class="buscar">
			</ul>
		</div>


		<main>
			
			<div class="contenedor">
				
					<h1 class="textoC"> Política de protección de datos y cookies </h2>
					<h2> ¿Quién es el responsable del tratamiento? <h2>

				<p> En cumplimiento del REGLAMENTO (UE) 2016/679 DEL PARLAMENTO EUROPEO Y DEL CONSEJO de 27 de abril de 2016, relativo a la protección de las personas físicas en lo que respecta al tratamiento de datos personales y a la libre circulación de estos datos y su normativa de desarrollo, le informamos que AXION DESARROLLOS, S.L., con domicilio en calle Blazquilla 10 2ºB Galapagar Madrid, es el responsable del tratamiento. Dirección electrónica para el ejercicio de derechos: rgpd@axiondesarrollos.com<p>

				<p>En ningún caso AXION DESARROLLOS, S.L., utilizará los datos personales de los interesados para fines distintos de los mencionados a continuación, y se compromete a guardar el debido secreto profesional y a establecer las medidas técnicas y organizativas necesarias para salvaguardar la información conforme a los requerimientos que establece el mencionado Reglamento.<p>

				<h2>¿Con qué finalidad trataremos los datos personales?<h2>

				<p>Se le informa que los datos personales proporcionados por usted serán tratados con las siguientes finalidades:<p>

				<p>Facilitar la información solicitada acerca de nosotros y nuestros servicios.
				Cuando el interesado lo solicite, trataremos los datos con la finalidad de mantenerle informado de nuestros servicios por correo electrónico o aplicaciones de mensajería instantánea, como WhatsApp
				Prestarle el soporte solicitado, incluido por teléfono cuando así lo solicite el interesado
				Para prestarle los servicios por usted contratados. Para la prestación de servicios es necesario contactar con los clientes. Para ello, AXION DESARROLLOS, S.L. podrá contactar con ellos mediante correo electrónico, teléfono, o aplicaciones de mensajería instantánea como WhatsApp
				Dar contestación y gestionar sus comentarios, dudas y sugerencias
				Gestionar su solicitud de registro en nuestros servicios de agencia de colocación como demandante, con la finalidad de ayudar a proporcionarle un empleo adecuado a sus características profesionales
				Con la finalidad de obtener información del uso del sitio web, se analizan el número de páginas visitadas, el número de visitas, así como la actividad de los visitantes y su frecuencia de utilización. A estos efectos, utilizamos la información estadística elaborada por el Proveedor de Servicios de Internet que no permite identificar al interesado en ningún momento.</p>


				<h2>¿Cuál es la base legal del tratamiento?<h2>

				<p>A través de la cumplimentación de formularios de contacto de la Web o mediante el envío de correos electrónicos o cualquier otro tipo de solicitud de información remitida a AXION DESARROLLOS, S.L., el interesado presta su consentimiento expreso para el tratamiento de sus datos personales. La base legal del tratamiento en estos casos es el consentimiento del interesado, que puede retirar en cualquier momento.<p>


				<h2>A quién se comunican los datos personales?</h2>

				<p>Cuando la información requerida por el usuario sea gestionada por nuestras empresas colaboradoras, los datos podrán ser comunicados a la empresa correspondiente para la gestión de servicios.</p>

				<h2>Nuestras empresas colaboradoras son las siguientes:</h2>

				<h2>AC3 EVOLUCIÓN FORMATIVA S.A., Paseo de las Delicias 31, 28045 – Madrid.
				ACADEMIA LAGASCA SERRANO S.A., C/ Tutor 11, 28008 – Madrid.
				CENTRO INFORMÁTICO COSLADA S.L., Marquesas 9 – 11, 28850 – Torrejón de Ardoz.
				INSTITUTO EUROPEO DE COMUNICACIÓN Y MARKETING S.L., Paseo de las Delicias 31, 28045 – Madrid
				¿Qué derechos ostenta el interesado?<h2>

				<p>El interesado puede ejercer sus derechos de acceso, rectificación, supresión y portabilidad de sus datos, de limitación y oposición a su tratamiento, mediante escrito acompañado de documento oficial que le identifique dirigido a AXION DESARROLLOS, S.L., con domicilio en calle Blazquilla 10 2ºB Galapagar Madrid. E-mail: rgpd@axiondesarrollos.com</p>


				

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