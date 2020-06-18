<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Enviado</title>
</head>
<body oncontextmenu="return false" bgcolor="#6E6E6E">

	<?php 
	
		$destino = "azopotamadre503alv@gmail.com";
		$nombre = $_POST["name"];
		$telefono = $_POST["tel"];
		$correo = $_POST["email"];
		$asunto = $_POST["affair"];
		$mensaje = $_POST["messege"];

		if($telefono == "")
		{

			$contenido = "Nombre:\n" . $nombre . "\n\nCorreo:\n" . $correo . "\n\nAsunto:\n" . $asunto . "\n\nMensaje:\n" . $mensaje;

			mail($destino, "Libreria Carolina", $contenido);

		}elseif ($telefono != "") {
			
			$contenido = "Nombre:\n" . $nombre . "\n\nTeléfono:\n" .$telefono . "\n\nCorreo:\n" . $correo . "\n\nAsunto:\n" . $asunto . "\n\nMensaje:\n" . $mensaje;

			mail($destino, "Libreria Carolina", $contenido);

		}

 ?>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="enviado.js"></script>
</body>
</html>