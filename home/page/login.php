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

		<main class="contactoFormulario">
			<h1 class="titulocontacto">INICIA SESIÓN</h1>
			<p class="titulocontacto">¡Hola, es un placer tenerte por aqui nuevamente!</p>
			<div class="contacimg">

            <div class="imagencontacto">
                <img src="../imagenes/registro.jpeg" alt="contacto" class="imgcontacto">
            </div>
    
			<!-- Creamos un formulario para realizar el login en el sitio web. -->
			<div class="formulariocontacto"> 
					<form action="login.php" method="POST" class="formulario2">
						<div class="form-group">
						<label>
							E-mail
						</label>
						<input type="email" name="registrado[email]" required autocomplete="off" placeholder="Tu email..."/>
						</div>
						<div class="form-group">
						<label>
							password
						</label>
						<input id ="password" type="password" name="registrado[password]" required autocomplete="off" placeholder="Tu password..."/>
						</div>
						<div class="form-group">
						<button class="send_btn1" type="button" onclick="mostrarContrasena()">Mostrar password</button>
						</div>
						<div class="form-group">
						<button type="submit" class="send_btn">Enviar</button>
						</div>
					</form>


					<div class="register">
							<p>¿Todavía no eres usuario?
								<a href="registro.php">Regístrate</a>
							</p>
					</div>
			</div>

			<?php

			/* Como siempre, comprobar que venimos del formulario de login y si no, redirigir a él. */
			if (!isset($_POST)) {
				header("location: login.php");
			}
			$email = $_POST['registrado']['email'] ?? '';
			$password = $_POST['registrado']['password'] ?? '';

			/* Si llegamos aquí es porque procedemos del formulario de logueado. */

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				/* 1. Conexión a la base de datos. */
				require_once("dbcontroller.php");
				$db_handle = new DBController();

				/* 2. Consultamos a la base de datos. Vamos a intentar recuperar la password del usuario. Si la consulta devolviese un conjunto vacío, significaría que ni siquiera el usuario existe y tendríamos que actuar en consecuencia. */
				$sql = "SELECT * FROM usuarios WHERE email='$email';";
				@$resultado = $db_handle -> runQueryNoFetch($sql);

				/* Comprobamos el número de resultados de la consulta. */
				$numeroResultados = mysqli_num_rows($resultado);
				if ($numeroResultados == 0) {
					/* El usuario no existe en la base de datos. */
					?>
					<p>El usuario no existe.</p>
					<?php
					die();
				}

				/* Si estamos aquí es porque se ha recuperado una password para el usuario. Ahora, tenemos que leerla y compararla con la password especificada en el formulario para ver si está permitido el acceso del usuario. */

				/* Recordad que el resultado de la consulta está formado por un solo registro con un solo campo que es la password. */

				$registro = mysqli_fetch_assoc($resultado);
				$email = $registro['email'];
				$passBD = $registro['password'];

				/* Sólo nos quedaría comprobar que ambas password son iguales. Para ello, necesitamos la función password_verify. */
				if (password_verify($password, $passBD)) {
					session_start();  
                        $_SESSION['email'] = $email;
						unset($_SESSION["cart_items"]);
						header('Location: usuario.php');
					?>
					<?php
					ob_start();
				} else {
					?>
					<p>La password no es correcta. Inténtalo de nuevo.</p>
					<?php
				}
			}

			?>

			<script>
			function mostrarContrasena(){
				var tipo = document.getElementById("password");
				console.log(tipo)
				if(tipo.type == "password"){
					tipo.type = "text";
				}else{
					tipo.type = "password";
				}
			}
			</script>


	

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