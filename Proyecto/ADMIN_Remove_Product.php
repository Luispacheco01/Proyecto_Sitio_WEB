<?php

include("conexion.php");
$ID= $_REQUEST['ID'];

$query = "DELETE FROM Productos  WHERE ID_Producto = '$ID'";
$resultado = $conexion->query($query);

if ($resultado) {    
    header("Location: AVISO_Producto_Eliminado.php");
}else{
    header("Location: AVISO_Producto_No_Eliminado.php");
};

?>