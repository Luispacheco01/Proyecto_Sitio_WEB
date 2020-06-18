<?php 
	session_start();
	if(isset($_SESSION['Nombre'])){
		if ($_SESSION['Rol']==763026){
			header("Location:index.php");
		}
	}
	else{
		header("Location:index.php");
	}


	require_once("BD_conexion.php");
	$objDB=new BaseDatos();

		if(isset($_POST["guardar"])){
			$nombre = $_POST["nombre"];
			$descripcion = $_POST["descripcion"];
			$precio = $_POST["precio"];
			$cantidad = $_POST["cantidad"];
			$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

			if($objDB->RegistrarProducto($nombre, $descripcion, $precio, $cantidad, $imagen)==true){
					header("Location:AVISO_Producto_Guardado.php");
				}else{
					header("Location:AVISO_Producto_Guardado_Error.php");
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

				<li><a href="product.php"><span class="fa fa-tag icon-menu"></span>Productos</a></li>

				<li class="active"><a href="index.php"><span class="fa fa-arrow-left icon-menu"></span>Volver</a></li>

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
					<h1 class="text-center" id="titulo">ÁREA ADMINISTRATIVA</h1>
				</div>
			</div>
		</div>
	</header>

	<div>
		<ul class="nav nav-pills nav-justified">
		  <li role="presentation" class="active"><a href="ADMIN_New_Product.php">Nuevo Producto</a></li>
		  <li role="presentation"><a href="ADMIN_See_Product.php">Ver Productos</a></li>
		</ul>
	</div>

	<br>

	<div id="container">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="form-contactanos">
					<h2 class="text-center"><b>Ingresar nuevo producto</b></h2>
					<br>
					<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

						<form action="" method="post" class="form-horizontal" autocomplete="off" autocomplete="nope" enctype="multipart/form-data">

							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Nombre:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='text' class='form-control' name='nombre' required='' placeholder='Introduce nombre del producto' id="campos">
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Descripción:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<textarea name="descripcion" id="campos" rows="3" placeholder="Descripción del producto (máximo 70 caracteres)" maxlength="70" required class="form-control"></textarea>
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Precio Unitario $:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='number' class='form-control' name='precio' required value=0.00 min="0.00" pattern="^[0-9]+" step="0.01" id="campos">
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Cantidad:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='number' class='form-control' name='cantidad' required value="1" min="1" pattern="^[0-9]+" step="1" id="campos">
								</div>
							</div>

							<div class="form-group">
								<label for="nombre" class="control-label col-xs-12 col-sm-3 col-md-3 col-lg-3">Imagen:</label>
								<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
									<input type='file' class='form-control' name='imagen' required id="campos">
								</div>
							</div>

							<div class="form-group">
								<div class="col-xs-12 col-sm-offset-2 col-sm-8 col-md-offset-4 col-md-8 col-lg-offset-4 col-lg-8">
									<button type="submit" class="btn btn-primary btn-lg btn-block" id="guardar" name="guardar"><span class="glyphicon glyphicon-ok"></span>&nbsp&nbsp&nbspGuardar Producto</button>
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
<br>
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