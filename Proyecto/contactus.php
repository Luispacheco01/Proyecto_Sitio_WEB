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

				<li class="active"><a href="contactus.php"><span class="fa fa-envelope icon-menu"></span>Contactanos</a></li>

				<li><a href="LogIn.php"><span class="fa fa-user icon-menu"></span>Registrate</a></li>

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

	session_start();

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
	}
	if(isset($_POST["Cerrar"])){
			session_destroy();
			setcookie("user1", $Login_Name, time() - 84600);
			setcookie("pass1", $Password, time() - 84600);
			header("Location:AVISO_Sesion_Cerrada.php");
		}
		

	 ?>

	<br>
	<div id="container">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="form-contactanos">
					<h2 class="text-center"><b>Contactate con nosotros</b></h2>
					<p class="text-center">LLena este formulario para enviarnos tu consulta, te responderemos a la brevedad posible.</p>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
						<form action="send_contactus.php" method="post" class="form-horizontal" autocomplete="off" autocomplete="nope">
							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Nombre:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='text' class='form-control' name='name' required='' placeholder='Introduce tu nombre' id="campos">
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Teléfono:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='tel' class='form-control' name='tel' placeholder='Introduce tu numero de teléfono (opcional)' maxlength="8" minlength="8" value="" id="campos">
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Correo:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='email' class='form-control' name='email' required='' placeholder='Introduce tu dirección de correo electrónico' id="campos">
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Asunto:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='text' class='form-control' name='affair' required='' placeholder='Asunto de tu mensaje' id="campos">
								</div>
							</div>
							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Mensaje:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<textarea name="messege" id="campos" rows="7" placeholder="Su mensaje (máximo 200 caracteres)" maxlength="200" required class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8">
									<button type="submit" class="btn btn-primary btn-lg btn-block" id="boton"><span class="glyphicon glyphicon-send"></span>&nbsp&nbsp&nbspEnviar Mensaje</button>
									<button type="reset" class="btn btn-warning btn-lg btn-block"><span class="glyphicon glyphicon-refresh"></span>&nbsp&nbsp&nbspRestablecer</button>
								</div>
							</div>
						</form>
					</div>
					<div class="hidden-xs hidden-sm col-md-4 col-lg-4" id="imagen-contacto">
						<img src="images/contacto.png" class="img-responsive">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="horarios">
				<h2 class="text-center"><b>Visita nuestra instalacion</b></h2>
				<p class="text-center">Calle diagonal, Pasaje Nicaragua, Casa #4, Santa Ana.</p>
					<h4 class="text-center"><b>HORARIOS DE ATENCIÓN</b></h4>
					<p class="text-center">Lunes a Viernes <br>De 8:00 AM a 6:00 PM.<br>Sábados <br>De 8:00 AM a 2:00 PM.</p>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="ubicacion">
				<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d2220.6476750890583!2d-89.56589084188758!3d13.98002190031351!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1ses!2ssv!4v1555805154895!5m2!1ses!2ssv" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
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