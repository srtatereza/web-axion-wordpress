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
			<img class="servicio1" src=../imagenes/fondoServicio.jpeg alt="fondo">
			<div class="texto-centrado">Cada negocio es único, ya seas un autónomo, una PYMES o una gran empresa,
				tu proyecto lo diseñamos para ti</div>
		</div>
	</header>


	<main>
		<div class="descripciones">
			<h1>SERVICIOS ESPECIALES PARA PYMES Y AUTONOMOS</h1>
			<h2>Descubre todas las soluciones digitales subvencionables</h2>
		</div>

		<div class="contenedor3">
			<div class="imagenServicio">
				<img class="servicio2" src=../imagenes/banner3.jpg alt="fondo">
			</div>
			<div class="texto-centrado2">
				<h2 class="textoC">PROGRAMA KIT DIGITAL COFINANCIADO POR LOS FONDOS NEXT GENERATION (EU) DEL MECANISMO DE RECUPERACIÓN Y RESILENCIA</h2>
				<p> Sabias que! 3 de cada 10 empresas Españolas no cuentan todavía con una página web, lo que significa que la mayoría
					de tu competencia ya está en la red.</p>
				<img class="imagenSello" src=../imagenes/sellos.png alt="fondo">
			</div>
		</div>
		<h1>PODEMOS OFRECERTE LOS MEJORES SERVICIOS</h1>

		<div class="productoCarrito">
			<?php

			// Utilizamos el metodo DBController para conectarnos a la base de datos. $db_handle como variable de enlace a la base de datos
			require_once("dbcontroller.php");
			$db_handle = new DBController();

			// si existe una peticion GET con la action rellenada
			if (!empty($_GET["action"])) {
				// pasamos por los diferentes casos de action: add, remove, empty
				switch ($_GET["action"]) {
						// caso agregar al carrito
					case "add":
						// si existe una peticion POST con la cantidad rellenada (si no hay cantidad, no entra) 
						if (!empty($_POST["cantidad"])) {
							// ejecutamos la query sobre la table productos para sacar la informacion de los mismos y los metemos en un array
							$productByCode = $db_handle->runQuery("SELECT * FROM servicios WHERE codigo ='" . $_GET["codigo"] . "'");
							$itemArray = array($productByCode[0]["codigo"] => array(
								'nombre' => $productByCode[0]["nombre"], 'codigo' => $productByCode[0]["codigo"], 'cantidad' => $_POST["cantidad"], 'precio' => $productByCode[0]["precio"], 'imagen' => $productByCode[0]["imagen"],
								'id' => $productByCode[0]['id']
							));

							// si el carrito no esta vacio
							if (!empty($_SESSION["cart_items"])) {
								// y si en el carrito hay uno de los servicios del array
								if (in_array($productByCode[0]["codigo"], array_keys($_SESSION["cart_items"]))) {
									// por cada producto del carrito
									foreach ($_SESSION["cart_items"] as $k => $v) {
										// si el producto ya esta en el carrito
										if ($productByCode[0]["codigo"] == $k) {
											// si dicho producto no tiene puesta la cantidad
											if (empty($_SESSION["cart_items"][$k]["cantidad"])) {
												// la ponemos a cero
												$_SESSION["cart_items"][$k]["cantidad"] = 0;
											}
											// si tiene puesta la cantidad, se la sumamos
											$_SESSION["cart_items"][$k]["cantidad"] += $_POST["cantidad"];
										}
									}
								} else {
									// si no lo tiene, lo agregamos
									$_SESSION["cart_items"] = array_merge($_SESSION["cart_items"], $itemArray);
								}
							} else {
								// si el carrito esta vacio, le metemos el producto
								$_SESSION["cart_items"] = $itemArray;
							}
						}
						break;

						// caso quitar del carrito
					case "remove":
						// si el carrito no esta vacio
						if (!empty($_SESSION["cart_items"])) {
							// por cada producto del carrito
							foreach ($_SESSION["cart_items"] as $k => $v) {
								// vemos si el producto a quitar esta en el carrito, y entonces lo quitamos (limpiamos la variable)
								if ($_GET["codigo"] == $k)
									unset($_SESSION["cart_items"][$k]);
								// si no hay productos en el carrito, limpiamos la variable
								if (empty($_SESSION["cart_items"]))
									unset($_SESSION["cart_items"]);
							}
						}
						break;

						// caso limpiar carrito
					case "empty":
						// limpiamos la variable
						unset($_SESSION["cart_items"]);
						break;
				}
			?>
			<?php
			}
			?>


			<!-- CONTENEDOR DE LOS PRODUCTOS -->
			<div class="producto">
				<?php
				// igual que en el home
				session_start();
				require_once("dbcontroller.php");
				$db_handle = new DBController();
				$product_array = $db_handle->runQuery("SELECT * FROM servicios ORDER BY id ASC");
				if (!empty($product_array)) {
					foreach ($product_array as $key => $value) {
				?>
						<div class="product-item">
							<form method="post" action="servicios.php?action=add&codigo=<?php echo $product_array[$key]["codigo"]; ?>">
								<div class="product-image"><img src="<?php echo $product_array[$key]["imagen"]; ?>"></div>
								<div class="product-title"><?php echo $product_array[$key]["nombre"]; ?> </div>
								<div class="product-descripcion"><?php echo $product_array[$key]["descripcion"]; ?> </div>
								<div class="product-duracion">Duracion: <?php echo $product_array[$key]["duracion"]; ?> Meses.</div>

								<div class="cart-action">

									<div class="preciotexto">Precio:</div>
									<div class="precio"><?php echo "" . $product_array[$key]["precio"] . "€"; ?></div>

									<input type="text" class="product-cantidad" name="cantidad" value="1" size="2" />
									<input type="submit" value="Agregar al carrito" class="btnAddAction" />
								</div>
							</form>
						</div>
				<?php
					}
				}
				?>
			</div>

			<div class="shopping-cart">
				<?php
				// vamos a pintar la tabla del carrito, realizamos un if ( isset ) para verificar si la variable esta definida , y un array $_session que nos guardar información a través de los requests
				if (isset($_SESSION["cart_items"])) {
					$total_cantidad = 0;
					$total_price = 0;
				?>
					<div><a class="vaciar" href="servicios.php?action=empty">Vaciar Carrito</a></div>

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
									<td><img src="<?php echo $item["imagen"]; ?>" class="cart-item-image" /><?php echo $item["nombre"]; ?></td>
									<td><?php echo $item["cantidad"]; ?></td>
									<td><?php echo $item["precio"] . "$ "; ?></td>
									<td><?php echo number_format($item_price, 2) . "$ "; ?></td>
									<td><a href="servicios.php?action=remove&codigo=<?php echo $item["codigo"]; ?>" class="btnRemoveAction"><img src="../imagenes/icon-delete.png" class="eliminar" alt="Remove Item" /></a></td>
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
										<input type="submit" name="comprar" class="comprar" value="Comprar" />
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

				<?php
				// random para crear un numero de pedido aleatorio y para evitar colisiones en la bbdd
				function randomNumber($length)
				{
					$result = '';
					for ($i = 0; $i < $length; $i++) {
						$result .= mt_rand(0, 9);
					}
					return $result;
				}

				// al dar a comprar
				if (array_key_exists('comprar', $_POST)) {
					$cart_items = $_SESSION["cart_items"];
					$fecha_inicio = date("Y-m-d");
					$fecha_fin =  date("Y-m-d", strtotime("$fecha->duracion months", strtotime(date("Y-m-d"))));
					$idUsuario = $_SESSION["email"];

					// sacamos el id del usuario con el email de la sesion
					$usuario = $db_handle->runQuery("SELECT id FROM usuarios WHERE email = '$idUsuario'");

					// para cada producto del carrito, creamos una nueva fila con el numero del servicio, el id del usuario y el id del servicio en bbdd
					foreach ($cart_items as $key => $item) {
						$query = "INSERT INTO usuarios_has_servicios ( fecha_inicio, fecha_fin, usuarios_id, servicios_id) VALUES (
								'" . $fecha_inicio . "', 
								'" . $fecha_fin . "', 
								'" . $usuario[0]['id']. "', 
								'" . $item['id'] . "'
							)";
						$db_handle->query($query);

						
					}
				}
				?>
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