<?php
		$email = $_POST["email"];
	 	$pass = $_POST["pass"];
	 	$empresa = $_POST['empresa'];
	 	$nombre = $_POST["nombre"];
	 	$apellido = $_POST["apellido"];
	 	$direccion = $_POST["direccion"];
	 	$telefono = $_POST["telefono"];
	 	$estado = $_POST["estado"];
	 	$fecha = date("Y-m-d") ;
	 	include("conexion.php"); 
	 	mysqli_query($conectado,"UPDATE usuario SET PassUsua = '".$pass."',EmprUsua = '".$empresa."',NombUsua = '".$nombre."',ApelUsua = '".$apellido."',DireUsua = '".$direccion."',TeleUsua = '".$telefono."',EstaUsua = '".$estado."',FecAUsua = '".$fecha."' WHERE MailUsua = '".$email."'");
	 	if ($estado=="Activo") {
	 		$mensaje2 = "Ya se encuentra habilitado en la pagina de Debandi Distribuciones, podra Iniciar su Sesion con los siguientes datos. \r\n Email: ".$email." \r\n Contraseña: ".$pass." \r\n www.ferreteradebandi.com.ar ";

			mail($email, 'Solicitud de Registro Aprobada Debandi Distribuciones', $mensaje2);
	 	}
	 	
	

	echo("La modificacion se realizo exitosamente. ".'<a href="maestrocliente.php" title="">Volver a Maestro de Clientes</a>'.""); 
   

?>