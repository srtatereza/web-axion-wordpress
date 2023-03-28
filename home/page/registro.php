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


        <main class="contactoFormulario">
            <h1 class="titulocontacto">REGISTRATE</h1>
            <p class="titulocontacto">¡Descubre aún más formas de promocionar tu negocio!</p>
            <div class="contacimg">

                <div class="imagencontacto">
                    <img src="../imagenes/registro.jpeg" alt="contacto" class="imgcontacto">
                </div>

                <div class="formulariocontacto">
                    <form action="registro.php" method="POST" class="formulario">
                        <div class="form-group">
                            <label>
                                Nombre
                            </label>
                            <input type="text" name="registrado[nombre]" required autocomplete="off" placeholder="Tu nombre..." />
                        </div>
                        <div class="form-group">
                            <label>
                                Apellidos
                            </label>
                            <input type="text" name="registrado[apellido]" required autocomplete="off" placeholder="Tus apellidos..." />
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
                        <div class="form-group">
                            <label>
                                Contraseña
                            </label>
                            <input type="password" name="registrado[password]" required autocomplete="off" placeholder="Tu contraseña..." />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="send_btn">Enviar</button>
                        </div>
                        <div class="form-group1">
                            <?php if (isset($_GET['mensaje'])) { ?>
                                <p>Usuario REGISTRADO con éxito. <a href="login.php">Iniciar Sesion</a>.</p>
                                <p>
                                <?php } ?>
                        </div>

                    </form>
                </div>
            </div>
        </main>

        <?php

        /* En primer lugar, comprobaremos que venimos del formulario de registro y no por entrada directa, en cuyo caso, redirigiríamos al formulario de registro. */
        if (!isset($_POST)) {
            header("location: registro.php");
        }


        /* Si llegamos aquí es porque existen datos de usuario para registrar. */

        $nombre = $_POST['registrado']['nombre'] ?? '';
        $apellido = $_POST['registrado']['apellido'] ?? '';
        $telefono = $_POST['registrado']['telefono'] ?? '';
        $email = $_POST['registrado']['email'] ?? '';
        $password = $_POST['registrado']['password'] ?? '';

        /* A continuación, encriptamos la contraseña. Lo más sencillo es utilizar el método crypt() Requiere un valor de salt según los requisitos de Blowfish (que es nuestro método de encriptación). Empezaremos por $2y$, seguido de un número entre 04 y 31 y una cadena que hace de salt escrita entre símbolos de dólar ($). */
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $numero = "08";
            $fecha = time();
            $cadena = uniqid((string)$fecha, true);
            $salt = "$2y$" . $numero . "$" . $cadena . "$";
            /* Encriptamos la contraseña. */
            $passEncriptada = crypt($password, $salt);

            /* Ahora, vamos a introducir los datos de usuario y contraseña en la base de datos. */
            require_once("dbcontroller.php");
            $db_handle = new DBController();

            /* Antes de insertar el registro en la base de datos tendríamos que comprobar que no exista ya un usuario con el mismo nombre. */
            $sqlConsulta = "SELECT * FROM usuarios WHERE email = '$email';";

            /* Si ejecutamos la consulta y obtenemos algún registro es porque el usuario ya existe. Tendríamos que parar el proceso. */
            $numeroUsuario = $db_handle->numRows($sqlConsulta);

            if ($numeroUsuario > 0) {
                /* El usuario ya existe. */
        ?>
                <p>No se puede registrar con ese nombre de usuario. Ya existe.</p>
        <?php
                die();
            }

            /* 2. Ejecución de la consulta. */
            /* Primero, preparamos la consulta. */
            if ($_POST) {
                $sql = "INSERT INTO usuarios (nombre,apellido,telefono,email,password) VALUES ('$nombre','$apellido', '$telefono','$email','$passEncriptada');";

                /* Ejecuto la consulta. */
                @$resultado = $db_handle->runQueryNoFetch($sql);
                header('Location: registro.php?mensaje=1');
            }
        }

        ?>


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