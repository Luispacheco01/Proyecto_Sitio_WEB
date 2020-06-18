<?php 
	
	require_once("BD_conexion.php");
	$objDB=new BaseDatos();

		if( isset( $_COOKIE['user1']) && isset( $_COOKIE['pass1']) ){
			$usuario = $_COOKIE["user1"];
			$clave = $_COOKIE["pass1"];
			$recordar = "Ya";

			if($objDB->LOGIN($usuario, $clave, $recordar)==true){
				if ($_SESSION['Rol']==763026){
					header("Location:AVISO_Desloguear.php");
				}else{
					header("Location:AVISO_Inicio_Sesion_Admin.php");
				}				
			}else{
				header("Location:AVISO_Inicio_Sesion_Error.php");
			}
		}

		session_start();

		if(isset($_SESSION['Nombre'])){
		header("Location:AVISO_Desloguear.php");
	}
	

	if(isset($_POST['IniciarSesion'])){
		$usuario = $_POST['usuario'];
		$clave = $_POST['clave'];
		$recordar = $_POST['recordar'];
		$no = "";

		if($recordar == "Recordar"){
			if($objDB->LOGIN($usuario, $clave, $recordar)==true){
				if ($_SESSION['Rol']==763026){
					header("Location:AVISO_Inicio_Sesion_Correcto.php");
				}else{
					header("Location:AVISO_Inicio_Sesion_Admin.php");
				}
			
			}else{
				header("Location:AVISO_Inicio_Sesion_Error.php");
			}
		}else{

			if($objDB->LOGIN($usuario, $clave, $no)==true){
			if ($_SESSION['Rol']==763026){
				header("Location:AVISO_Inicio_Sesion_Correcto.php");
			}else{
				header("Location:AVISO_Inicio_Sesion_Admin.php");
			}
			
		}else{
			header("Location:AVISO_Inicio_Sesion_Error.php");
		}
		}

		
	}

	if(isset($_POST["Registrate"])){
		$nombre = $_POST["nombre"];
		$email = $_POST["email"];
		$usuario = $_POST["usuario"];
		$clave1 = $_POST["clave1"];
		$clave2 = $_POST["clave2"];

		if($clave1==$clave2){
			$clave=$clave1;
				if($objDB->RegistroUsuario($nombre, $email, $usuario, $clave)==true){
					header("Location:AVISO_Registrado_Correcto.php");
				}else{
					header("Location:AVISO_Registrado_Error.php");
				}
		}else{
			header("Location:AVISO_Registrado_Error_Pass.php");
		}
	}

 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Libreria Carolina - Santa Ana</title>
	<link rel='icon' type='image/png' href='images/barra.png' />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="estilos.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
	<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
</head>
<body oncontextmenu="return false" onload="startTime()" onload="cielo()">
	<header class="lateral">
		<div class="row">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				<span id="button-menu" class="fa fa-bars"><small class="hidden-xs hidden-sm" id="eslogan">&nbsp Menu</small></span>
			</div>

			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<form action="" class="search">
					
					<div class="col-xs-9 col-sm-9 col-md-offset-4 col-md-7 col-lg-offset-4 col-lg-7">
						<input type='text' class='form-control' name='search' required='' placeholder='¿Qué estas buscas?'>
					</div>
					<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
						<button type='submit' class='btn' name='buscar'>
								<i class="fas fa-search icon"></i>
						</button>
					</div>
				</form>
			</div>
			
		</div>
		
		<nav class="navegacion">
			<ul class="menu">
				<li class="title-menu"><b>MENU</b></li>
				<li><a href="index.php"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

				<li><a href="product.php"><span class="fa fa-tag icon-menu"></span>Productos</a></li>

				<li><a href="contactus.php"><span class="fa fa-envelope icon-menu"></span>Contactanos</a></li>

				<li class="active"><a href="LogIn.php"><span class="fa fa-user icon-menu"></span>Registrate</a></li>

				<li><a href="quote.php"><span class="fa fa-shopping-cart icon-menu"></span>Cotizar</a></li>
			</ul>

		</nav>
	</header>

	<header class="jumbotron" id="principal">
		<div class="container">
			<div class="row">
				<div class="col-xs-2 col-sm-2 hidden-md hidden-lg">
					
				</div>
				<div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">	
					<a href="index.php"><img src="images/logo.png" class="img-responsive" id="logo" title="Ir a Inicio"></a>
				</div>
				<div class="hidden-xs hidden-sm col-md-9 col-lg-9">	 
					<h1 class="text-center" id="titulo">LIBRERIA CAROLINA</h1>
				</div>
			</div>
		</div>
	</header>

	<?php 

	if(isset($_SESSION['Nombre'])){

		echo "
		<div class='container'>
			<div class='row'>
				<div class='col-xs-7 col-sm-7 col-md-8 col-lg-8'>
					<h3>$_SESSION[Nombre]</h3>
				</div>
				<div class='col-xs-5 col-sm-5 col-md-4 col-lg-4'>
				<br>
				<form method=post>
					<button type='submit' class='btn btn-primary btn-md btn-block' name='Cerrar'>Cerrar Sesion</button>
				</form>
				</div>
			</div>
		</div>
		<br>
		";
	}elseif (count($_COOKIE) > 1) {
		echo "
			<div class='fondo_error'>
				<div class='container'>
					<div class='row'>
						<center>
							<h5>Tu navegador no soporta cookies, no podrás guardar tu inicio de seión</h5>
						</center>
					</div>
				</div>
			</div>
		";
	}
	if(isset($_POST["Cerrar"])){
			session_destroy();
			header("Location:AVISO_Sesion_Cerrada.php");
		}
		

	 ?>

	<div class="fondo">
		<div class="container-fluid">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8" id="productos-cabecera">
						<h2 class="text-center"><b>Registrate</b></h2>
					<p class="text-center">Registrate para poder realizar cotizaciones de nuestros productos, luego podrás pasar a nuestra <a href="contactus.php">instalación</a> a cancelar y retirar tu cotización. Te estaremos esperando</p>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6">
						<div class="contenedor-form">
							<div class="toggle">
								<span id="alternar">Crear Cuenta</span>
							</div>
		
							<div class="formulario">
								<h2>Iniciar Sesión</h2>
								<div class="wrap">
								<form action="#" method="post" autocomplete="off" autocomplete="nope" class="LogIn">
									<div class="form">
										<div class="grupo">
											<input type="text" name="usuario" required="" minlength="8" maxlength="16"><span class="barra"></span>
											<label for="">Nombre de Usuario</label>
										</div>
										<div class="grupo">
											<input type="password" name="clave" required="" minlength="8" maxlength="16"><span class="barra"></span>
											<label for="">Contraseña</label>
										</div>
										<div class="recordar">
											<input type="checkbox" name="recordar" value="Recordar" id="recordar">
											<label id="lbRecordar" for="recordar"></label>
										</div>																	
									</div>
									<button type='submit' class='btn btn-primary btn-lg btn-block' name='IniciarSesion'>
										Iniciar Sesión
									</button>
								</form>
							</div>
						</div>
		
							<div class="formulario">
								<h2>Crear Cuenta</h2>
								<form action="" id="form" method="post" autocomplete="off" autocomplete="nope">
									<div class="form">
										<div class="grupo">
											<input type="text" name="nombre" required=""><span class="barra"></span>
											<label for="">Nombre</label>
										</div>
										<div class="grupo">
											<input type="email" name="email" required=""><span class="barra"></span>
											<label for="">Correo Electrónico</label>
										</div>
										<div class="grupo">
											<input type="text" name="usuario" required="" minlength="8" maxlength="16"><span class="barra"></span>
											<label for="">Nombre de Usuario</label>
										</div>
										<div class="grupo">
											<input type="password" name="clave1" required="" minlength="8" maxlength="16"><span class="barra"></span>
											<label for="">Contraseña</label>
										</div>
										<div class="grupo">
											<input type="password" name="clave2" required="" minlength="8" maxlength="16"><span class="barra"></span>
											<label for="">Confirmar Contraseña</label>
										</div>								
									</div>
									<button type="submit" class="btn btn-primary btn-lg btn-block" name="Registrate">Registrate</button>
		
									<button type="reset" class="btn btn-warning btn-lg btn-block">Restablecer</button>
								</form>
							</div>
		
							<div class="reset-password">
								<a href="#">¿Olvidaste tu contraseña?</a>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
	
	<footer>
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
					<br>
					<h4 class="text-center">Librería Carolina - Santa Ana</h4>
					<h4 class="text-center">&copy; 2020 Todos los derechos reservados</h4>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
							<br>
							<ul class="social-icons">
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
								<li><a href="#"><i class="far fa-envelope"></i></a></li>
							</ul>
				</div>
			</div>
		</div>
	</footer>	
	<span class="ir-arriba fas fa-angle-up" id="ir-arriba"></span>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/interaccion.js"></script>
<script src="interaccion.js"></script>
</body>
</html>