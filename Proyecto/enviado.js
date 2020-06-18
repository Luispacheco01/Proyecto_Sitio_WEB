Swal.fire({
  title: '¡Enviado Correctamente!',
  text: "Te responderemos a la brevedad posible",
  icon: 'success',
  confirmButtonColor: '#3085d6',  confirmButtonText: 'OK'
}).then((result) => {
  if (result.value) {
    location.href="Contactus.php";
  }
})