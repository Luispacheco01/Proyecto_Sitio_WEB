<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Libreria Carolina - Santa Ana</title>
	<link rel='icon' type='image/png' href='images/barra.png' />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body>

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
      Swal.fire({
      title: '¡ERROR!',
      text: "Usuario y/o Contraseña incorrecta. Por favor verifica tus datos",
      icon: 'error',
      confirmButtonColor: '#3085d6',  confirmButtonText: 'OK'
    }).then((result) => {
      if (result.value) {
        location.href="LogIn.php";
      }
    })
</script>
</body>
</html>