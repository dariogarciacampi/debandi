<?php session_start();

	 if(isset($_POST["login"]) OR ($_POST["password"]))
 {
						include("conexion.php");
		            	$result = mysqli_query($conectado,"select PassUsua, EmprUsua, EstaUsua,CodiUsua from usuario WHERE MailUsua = '".$_POST["login"]."'");
		            	if(mysqli_num_rows($result) > 0){
		            		$dato = mysqli_fetch_array($result);
		            		if ($dato["PassUsua"] == $_POST["password"]){
		            			if (($dato["EstaUsua"] == "No Activo") OR ($dato["EstaUsua"] == "Solicitado")) {
		            				echo("Usted no se encuentra autorizado");
		            			} else {
		            			$_SESSION["user"] = $_POST["login"] ;
		            			$_SESSION["empresa"] = $dato["EmprUsua"] ;
		            			$_SESSION["tipo"] = $dato["EstaUsua"] ;
		            			$_SESSION["codigou"] = $dato["CodiUsua"] ;
		            			echo 1;
		            			
		            		}
		            		}else {
		            			echo ("El password ingresado es incorrecto");
		            		}
		            	}else {
		            		echo("El usuario ingresado es incorrecto");
		            	}
}



?>