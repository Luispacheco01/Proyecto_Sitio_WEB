<?php 

	session_start();

	if(isset($_SESSION['Nombre'])==false){
		header("Location:AVISO_Iniciar_Sesion.php");
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

				<li><a href="LogIn.php"><span class="fa fa-user icon-menu"></span>Registrate</a></li>

				<li class="active"><a href="quote.php"><span class="fa fa-shopping-cart icon-menu"></span>Cotizar</a></li>
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
	}
	if(isset($_POST["Cerrar"])){
			session_destroy();
			setcookie("user1", $Login_Name, time() - 84600);
			setcookie("pass1", $Password, time() - 84600);
			header("Location:AVISO_Sesion_Cerrada.php");
		}
		

	 ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-xs-12 col-sm-12 col-md-offset-2 col-md-8 col-lg-offset-2 col-lg-8" id="productos-cabecera">
				<h2 class="text-center"><b>Cotizaciones</b></h2>
				<p class="text-center">Podrás hacer cotizaciones de nuestros productos para luego pasar a nuestra <a href="contactus.php">instalación</a> a cancelar, seguidamente te entregaremos todo tu producto cotizado. <b>Recuerda estar registrado para poder cotizar</b></b></p>
				<hr id="hr-productos">
			</div>

			<div class="wrap">
				<form action="REPORTE_cotizacion.php" method="post" class="cotizar">


			<?php

				include("conexion.php");

				$query = "SELECT * FROM productos";
				$resultado = $conexion->query($query);
				while( $row = $resultado-> fetch_assoc()){
					if($row['Cantidad']>0){
			?>		        

			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4" id="container">
				<div id="productos">

					<img class="img-responsive img-productos" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
					<h3 class="text-center"><b>Descripción</b></h3>
					<p class="text-center"><?php echo $row['Descripcion']; ?>	</p>
					<center>
						<h4 class="text-center precio1 hidden-xs hidden-sm"><?php echo "\$: ".$row['Precio']; ?></h4>
						<h4 class="text-center precio2 hidden-md hidden-lg"><?php echo "\$: ".$row['Precio']; ?></h4>
								
							<div class="checkbox">
								<input type="checkbox" name="cotizar[]" value="<?php echo $row['ID_Producto']; ?>" id="<?php echo $row['ID_Producto']; ?>">
								<label for="<?php echo $row['ID_Producto']; ?>"></label>
							</div>

							<div class="cantidad">
								<input type="number" value="0" name="cantidad[]" id="<?php echo $row['ID_Producto']; ?>" min="0" max="<?php echo $row['Cantidad'];?>" tep="1">
							</div>
						
					</center>
				</div>
			</div>


			<?php
					}
				}

			?>
			
				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-1 col-md-10 col-lg-offset-1 col-lg-10">
							<div class="form-group">

								<button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar">&nbsp&nbsp&nbspRealizar Cotización</button>
								<button type="reset" class="btn btn-warning btn-lg btn-block"><span class="glyphicon glyphicon-refresh"></span>&nbsp&nbsp&nbspRestablecer</button>
								
							</div>
						</div>
					</div>
					
				</div>

				</form>
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