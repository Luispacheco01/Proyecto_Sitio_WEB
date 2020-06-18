<?php 

	define("BD_HOST", "localhost");
	define("BD_USER", "root");
	define("BD_PASS", "");
	define("BD_NAME", "libreriacarolina");

	class BaseDatos{
		private $bd;
		public function __construct() {
			try {
				$this->bd=new PDO("mysql:dbname=".BD_NAME.";host=".BD_HOST,BD_USER,BD_PASS);

			} catch (Exception $e) {
				#cliete
				echo "ERROR: Intente en unas horas";
				#programador
				#echo "ERROR:";
				#var_dump($e);
			}
		}

		public function LOGIN($usuario, $clave, $recordar){

			if($recordar == "Recordar" or $recordar == ""){
				$key = "7hi5 i5 7h3 k3y 70 3ncryp7 @nd d3cryp7 7h3 pa5w0rd 0f 7hi5 w3b5i73";
				$metodo = "aes-256-cbc";
				$iv = base64_decode("C9fBx11EWtYTL1/M8jfstw==");
				$encriptar = function($valor) use ($metodo, $key, $iv){
					return openssl_encrypt($valor, $metodo, $key, false, $iv);
				};
				$pass = "";
				$pass = $encriptar($clave);
			}elseif ($recordar == "Ya") {
				$pass = $clave;
			}

			$sentencia="SELECT * FROM Usuario WHERE Login_Name=:user AND Clave=:password";
			$sql=$this->bd->prepare($sentencia);
			$sql->bindParam(':user', $usuario, PDO::PARAM_STR);
			$sql->bindParam(':password', $pass, PDO::PARAM_STR);
			if($sql->execute()){
				#si no hay error
				$filas=$sql->fetchALL(PDO::FETCH_ASSOC);
				if(count($filas)>0){
					foreach ($filas as $fila => $value) {
						$ID_Usuario = "$value[ID_Usuario]";
						$Nombre = "$value[Nombre]";
						$Email = "$value[Email]";
						$Login_Name = "$value[Login_Name]";
						$Password = "$value[Clave]";
						$Rol = "$value[Rol]";
					}
					session_start();
					$_SESSION["ID_Usuario"] = $ID_Usuario;
					$_SESSION["Nombre"] = $Nombre;
					$_SESSION["Email"] = $Email;
					$_SESSION["Login_Name"] = $Login_Name;
					$_SESSION["Rol"] = $Rol;

					if(count($_COOKIE) > 0){
						if($recordar == "Recordar"){
							setcookie("user1", $Login_Name, time() + 84600);
							setcookie("pass1", $Password, time() + 84600);
						}
					}

					return true;
				}else{
					return false;
				}
			}else{
				#si hay error
				return false;
			}
		}


		public function RegistroUsuario($nombre, $email, $usuario, $clave){

			$key = "7hi5 i5 7h3 k3y 70 3ncryp7 @nd d3cryp7 7h3 pa5w0rd 0f 7hi5 w3b5i73";
			$metodo = "aes-256-cbc";
			$iv = base64_decode("C9fBx11EWtYTL1/M8jfstw==");
			$encriptar = function($valor) use ($metodo, $key, $iv){
				return openssl_encrypt($valor, $metodo, $key, false, $iv);
			};
			$pass = "";
			$pass = $encriptar($clave);
			
			$inicio = "A";
			$fin = "Z";
			$letra1 = chr(rand(ord($inicio), ord($fin)));
			$letra2 = chr(rand(ord($inicio), ord($fin)));
			$num = rand(10000000,99999999);
			$ID = "";
			$ID = "$num"."-"."$letra1$letra2";

			$sentencia="INSERT INTO Usuario VALUES ('$ID', '$nombre', '$email', '$usuario', '$pass', 763026)";
			$sql=$this->bd->prepare($sentencia);
			if($sql->execute()){
				#si no hay error
				return true;
			}else{
				#si hay error
				return false;
			}
		}



		public function RegistrarProducto($nombre, $descripcion, $precio, $cantidad, $imagen){

			$inicio = "A";
			$fin = "Z";
			$letra1 = chr(rand(ord($inicio), ord($fin)));
			$letra2 = chr(rand(ord($inicio), ord($fin)));
			$letra3 = chr(rand(ord($inicio), ord($fin)));
			$num = rand(1000000000,9999999990);
			$ID = "";
			$ID = "$letra1$letra2$letra3"."-"."$num";

			$sentencia="INSERT INTO productos VALUES ('$ID', '$nombre', '$descripcion', '$precio', '$cantidad', '$imagen')";
			$sql=$this->bd->prepare($sentencia);
			if($sql->execute()){
				#si no hay error
				return true;
			}else{
				#si hay error
				return false;
			}
		}





		public function ModificarProducto($ID, $nombre, $descripcion, $precio, $cantidad, $imagen){


			$sentencia="UPDATE Productos SET Nombre='$nombre', Descripcion='$descripcion', Precio='$precio', Cantidad='$cantidad', imagen='$imagen' WHERE ID_Producto= '$ID'";
			$sql=$this->bd->prepare($sentencia);
			if($sql->execute()){
				#si no hay error
				return true;
			}else{
				#si hay error
				return false;
			}
		}



		public function ModificarProducto2($ID, $cantidad){


			$sentencia="UPDATE Productos SET Cantidad='$cantidad' WHERE ID_Producto= '$ID'";
			$sql=$this->bd->prepare($sentencia);
			if($sql->execute()){
				#si no hay error
				return true;
			}else{
				#si hay error
				return false;
			}
		}











	}
 ?>