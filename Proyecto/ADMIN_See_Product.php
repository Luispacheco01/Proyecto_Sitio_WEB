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
		  <li role="presentation"><a href="ADMIN_New_Product.php">Nuevo Producto</a></li>
		  <li role="presentation" class="active"><a href="ADMIN_See_Product.php">Ver Productos</a></li>
		</ul>
	</div>

	<br>

		<div class="container-fluid">
			<div class="row">
				<div class="hidden-xs hidden-sm col-md-12 col-lg-12" >
					<br>
					<center>

						<div class="hidden-xs hidden-sm col-md-1 col-lg-1">
					    	<h5><b>ID</b></h5>				    	
					    </div>

					    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
					    	<h5><b>Nombre</b></h5>				    	
					    </div>

					     <div class="hidden-xs hidden-sm col-md-3 col-lg-3">
					     	<h5><b>Descripción</b></h5>				     	
					    </div>

					     <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
					     	<h5><b>Precio</b></h5>				     	
					    </div>

					     <div class="hidden-xs hidden-sm col-md-1 col-lg-1">
					     	<h5><b>Cantidad</b></h5>				     	
					    </div>

					     <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
					     	<h5><b>Imagen</b></h5>				    	
					    </div>

					    <div class="hidden-xs hidden-sm col-md-2 col-lg-2">
					    	<h5><b>Opciones</b></h5>				    	
					    </div>
				     </center>	    	
				</div>					
				
				    <?php

				        include("conexion.php");

				        $query = "SELECT * FROM productos";
				        $resultado = $conexion->query($query);
				        while( $row = $resultado-> fetch_assoc()){
				    ?>

				 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" >
					
					<center>

						<div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
							<h5 class="hidden-md hidden-lg"><b>ID</b></h5>
					    	<?php echo $row['ID_Producto']; ?>
					    	<br><br>
					    </div>

					    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					    	<h5 class="hidden-md hidden-lg"><b>Nombre</b></h5>
					    	<?php echo $row['Nombre']; ?>
					    	<br><br>				    	
					    </div>

					     <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
					     	<h5 class="hidden-md hidden-lg"><b>Descripción</b></h5>
					     	<?php echo $row['Descripcion']; ?>
					     	<br><br>	     	
					    </div>

					     <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
					     	<h5 class="hidden-md hidden-lg"><b>Precio</b></h5>
					     	<?php echo "\$: ".$row['Precio']; ?>
					     	<br><br>				     	
					    </div>

					     <div class="col-xs-12 col-sm-12 col-md-1 col-lg-1">
					     	<h5 class="hidden-md hidden-lg"><b>Cantidad</b></h5>
					     	<?php echo $row['Cantidad']; ?>
					     	<br><br>				     	
					    </div>

					     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
					     	<h5 class="hidden-md hidden-lg"><b>Imagen</b></h5>
					     	<img height="60px" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>">
					     	<br><br>

					    </div>

					    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
							<br class="hidden-md hidden-lg">
					    	<a href="ADMIN_Modify_Product.php?ID=<?php echo $row['ID_Producto'];?>"><button type="button" class="btn btn-warning">Modificar</button></a>

					    	<a href="ADMIN_Remove_Product.php?ID=<?php echo $row['ID_Producto'];?>"><button type="button" class="btn btn-danger">ELiminar</button></a>
					    	<br class="hidden-xs hidden-sm"><br class="hidden-xs hidden-sm">
					    	<hr class="hidden-md hidden-lg info">
					    </div>
				     </center>	    	
				</div>			     
				                    
				        <?php
				        }

				        ?>
				    
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