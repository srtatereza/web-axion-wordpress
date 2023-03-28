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
				<li><?php ($_SESSION['email']) ??  false  ? $enlace = '<a href="usuario.php">Mi Área</a>'  : $enlace = '<a href="login.php">Login</a>'; ?>
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
				<img class="servicio1" src=../imagenes/fondoServicio.jpeg alt="fondo">
				<div class="texto-centrado">Cada negocio es único, ya seas un autónomo, una PYMES o una gran empresa,
					tu proyecto lo diseñamos para ti</div>
			</div>
		</header>


		<?php
		// sacamos el email de la sesion
		session_start();
		$email = $_SESSION['email'];

		// creamos la conexion
		require_once("dbcontroller.php");
		$db_handle = new DBController();

		// sacamos los datos del usuario conociendo su email
		$sql = "SELECT usuarios.id, usuarios.nombre, usuarios.apellido,
	 usuarios.telefono , usuarios.email , usuarios.password FROM usuarios WHERE email='$email';";
		$resultado = $db_handle->runQueryNoFetch($sql);

		/* Lectura de la información en un array. */
		while ($registro = mysqli_fetch_assoc($resultado)) {
			$usuario = array();
			$usuario['nombre'] = $registro['nombre'];
			$usuario['apellido'] = $registro['apellido'];
			$usuario['telefono'] = $registro['telefono'];
			$usuario['email'] = $registro['email'];
			$usuario['password'] = $registro['password'];
		}

		?>
		<main class="contactoFormulario">
			<h1 class="titulocontacto">MI AREA</h1>
			<p class="titulocontacto">¡» Si de todas formas tienes que pensar, piensa en grande «!</p>
			<div class="contacimg">


				<div class="formulariocontacto">
					<!-- El formulario del update. -->
					<form action="usuario.php" method="POST" class="formulario">
						<h1>Mis datos</h1>
						<!-- Tenemos que pasar como campos ocultos los id de persona-->
						<div class="form-group">
							<label>Nombre
							</label>
							<input type="text" name="nombre" value="<?php echo $usuario['nombre']; ?>" ; />
						</div>

						<div class="form-group">
							<label>Apellido
							</label>
							<input type="text" name="apellido" value="<?php echo $usuario['apellido']; ?>" ; />

						</div>

						<div class="form-group">
							<label>Telefono
							</label>
							<input type="number" name="telefono" value="<?php echo $usuario['telefono']; ?>" ; />
						</div>

						<div class="form-group">
							<label>Email
							</label>
							<input type="text" name="email" value="<?php echo $usuario['email']; ?>" ; />
						</div>

						<div class="form-group">
							<label>Contraseña
							</label>
							<input type="password" name="password" value="<?php echo $usuario['password']; ?>" ; />
						</div>
					</form>

				</div>

				<div class="formulario3">
					<h1>Mis Servicios</h1>
					<div class="shopping-cart2">
						<?php
						// vamos a pintar la tabla del carrito, realizamos un if ( isset ) para verificar si la variable esta definida , y un array $_session que nos guardar información a través de los requests
						if (isset($_SESSION["cart_items"])) {
							$total_cantidad = 0;
							$total_price = 0;
						?>
							<table class="tbl-cart">
								<tbody>
									<tr>
										<th>Nombre</th>
										<th>Cantidad</th>
										<th>Precio</th>
										<th>Precio Total</th>
										<th>Remove</th>
									</tr>
									<?php
									// para cada producto que agregamos al carrito, sacamos el precio.
									foreach ($_SESSION["cart_items"] as $item) {
										$item_price = $item["cantidad"] * $item["precio"];
									?>
										<tr>
											<td><img src="<?php echo $item["imagen"]; ?>" class="cart-item-image2" /><?php echo $item["nombre"]; ?></td>
											<td><?php echo $item["cantidad"]; ?></td>
											<td><?php echo $item["precio"] . "$ "; ?></td>
											<td><?php echo number_format($item_price, 2) . "$ "; ?></td>
											<td><a href="servicios.php?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="../imagenes/icon-delete.png" class="eliminar2" alt="Remove Item" /></a></td>
										</tr>
									<?php
										// cantidad y calculo del producto
										$total_cantidad += $item["cantidad"];
										$total_price += ($item["precio"] * $item["cantidad"]);
									}
									?>
									<tr>
										<td align="right">Total:</td>
										<td align="right"><?php echo $total_cantidad; ?></td>
										<td align="right" colspan="2"><strong><?php echo "$ " . number_format($total_price, 2); ?></strong></td>
										<td>
											<form method="post">
												<input type="submit" name="comprar" class="comprar2" value="Comprar" />
											</form>
										</td>
									</tr>
								</tbody>
							</table>
						<?php
						} else {
						?>
						<?php
						}
						?>

					</div>

				</div>
			</div>

			<div class="botonesCerrar">
					<spam><a href="cerrar.php">Cerrar Sesión</a></spam>
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

</body>

</html>