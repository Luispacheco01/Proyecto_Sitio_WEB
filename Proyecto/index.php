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
						<input type='text' class='form-control hidden-xs hidden-sm' name='search' required='' placeholder='¿Qué estás buscando?'>
						<input type='text' class='form-control hidden-md hidden-lg' name='search' required='' placeholder='¿Qué buscas?'>
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

				<li class="active"><a href="index.php"><span class="fa fa-home icon-menu"></span>Inicio</a></li>

				<li><a href="product.php"><span class="fa fa-tag icon-menu"></span>Productos</a></li>

				<li><a href="contactus.php"><span class="fa fa-envelope icon-menu"></span>Contactanos</a></li>

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
					<br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
					<a href="index.php"><img src="images/logo.png" class="img-responsive" id="logo" title="Ir a Inicio"></a>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">	 
					<h1 class="text-center hidden-xs hidden-sm" id="titulo">LIBRERIA CAROLINA</h1>
					<h2 class="text-center"><small id="eslogan">¡Tu librería!<br>Todo lo que buscas a un precio excelente</small></h2>
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

		if ($_SESSION['Rol']!=763026){
		echo "
		<div class='container'>
			<div class='row'>
				<div class='col-xs-12 col-sm-12 col-md-offset-3 col-md-6 col-lg-offset-3 col-lg-6'>
					<a href=ADMIN_New_Product.php><button class='btn btn-primary btn-md btn-block'>Administracion</button></a>
				</div>
			</div>
		</div>
		<br>
		";
	}
	}

	


	if(isset($_POST["Cerrar"])){
			session_destroy();
			setcookie("user1", $Login_Name, time() - 84600);
			setcookie("pass1", $Password, time() - 84600);
			header("Location:AVISO_Sesion_Cerrada.php");
		}
		

	 ?>

	<br><br>
	<div class="container-fluid">
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			  <ol class="carousel-indicators">
			    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="4"></li>
			    <li data-target="#carousel-example-generic" data-slide-to="5"></li>
			  </ol>
			  <div class="carousel-inner" role="listbox">
			
			    <div class="item active">
			      <img src="images/slider-1.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">
			      </div>
			    </div>
			
			    <div class="item">
			      <img src="images/slider-2.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">   
			      </div>
			    </div>
			
			    <div class="item">
			      <img src="images/slider-3.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">   
			      </div>
			    </div>

			    <div class="item">
			      <img src="images/slider-4.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">   
			      </div>
			    </div>

			    <div class="item">
			      <img src="images/slider-5.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">   
			      </div>
			    </div>

			    <div class="item">
			      <img src="images/slider-6.jpg" class="img-responsive"  id="carousel" alt="...">
			      <div class="carousel-caption">   
			      </div>
			    </div>
			
			  </div>
			
			   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>
	</div>
	<br>
	<div id="container">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="info">
					<h2 class="text-center info"><b>¿Quiénes somos?</b></h2>
					<p class="text-justify">Somos una empresa con más de nueve años de servicio al cliente, dedicándonos a brindarle lo más novedoso y necesario en útiles escolares y papelería con productos de alta calidad, partiendo desde los más básico, hasta lo más necesario. Además del servicio de librería, le brindamos otros servicios como: Digitalización de documentos, Impresiones, Escaneos, Toma de fotografías entre otros. Contamos con un Staff altamente capacitado para brindarle la mejor experiencia y atención de servicio.</p>
				</div>
			</div>
			<br>	
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<img src="images/local.jpg" class="img-responsive" id="local">
				<br>
			</div>
		</div>
	</div>

	<div id="container">
		<div class="container">
			<section class="main row">
				<article class="col-lg-12" id="info">
					<h2 class="text-center info"><b>Misión</b></h2>
					<p class="text-justify">Satisfacer las necesidades de nuestros clientes en el rubro de papelería y librería en todo el país, con productos y servicios que marcan la diferencia en exclusividad y economía mostrando la calidad de nuestros productos.</p>
						<hr class="info">
					<h2 class="text-center info"><b>Visión</b></h2>
					<p class="text-justify">Ser una librería reconocída a nivel nacional e internacional en la venta y distribución de productos escolares; además de ser reconocída por la calidad de nuestro servicio y la contribución a la comunidad educativa.</p>
				</article>
			</section>
			<br>
		</div>
	</div>

	<div id="container">
		<div class="container" id="val">
			<section class="main row">
				<div class="col-lg-12">
					<h2 class="text-center val"><b>Valores</b></h2>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<p><b>RESPETO:</b> A todos los colaboradores, clientes y proveedores de nuestra empresa</p>
						<p><b>INNOVACIÓN:</b> Pensamos constantemente en nuevas ideas</p>
						<p><b>ACTITUD DE SERVICIO:</b> Vocación de servir</p>
					</div>

					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<p><b>INTEGRIDAD:</b> Cumplimos nuestros compromisos y nos conducimos con honestidad</p>
						<p><b>AUTENTICIDAD:</b> Genuinos con libertad de expresión</p>
						<p><b>TRABAJO EN EQUIPO:</b> Valoramos el aporte individual en beneficio del equipo</p>
					</div>

				</div>
			</section>
			<br>
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