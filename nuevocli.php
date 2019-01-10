<?php 
	
	
	 	$email = $_POST["email"];
	 	$pass = $_POST["pass"];
	 	$empresa = $_POST['empresa'];
	 	$nombre = $_POST["nombre"];
	 	$apellido = $_POST["apellido"];
	 	$local = $_POST["local"];
	 	$direccion = $_POST["direccion"];
	 	$telefono = $_POST["telefono"];
	 	$fecha = date("Y-m-d") ;

	 	$estado = "Solicitado" ;
		include("conexion.php");
	 	$repetido =  mysqli_query($conectado,"SELECT * FROM usuario WHERE MailUsua = '".$email."'");
		            				if(mysqli_num_rows($repetido) > 0){
		            					echo("Usted ya se encuentra registrado en la pagina, pongase en contacto con la empresa para Iniciar Sesion");
		            				} else {

	
	$result = mysqli_query($conectado,"INSERT INTO usuario (MailUsua, PassUsua, EmprUsua, NombUsua, ApelUsua, TeleUsua, CodiLoca, DireUsua, EstaUsua, FecAUsua) values ('".$email."', '".$pass."','".$empresa."','".$nombre."','".$apellido."','".$telefono."',".$local.",'".$direccion."', '".$estado."','".$fecha."')");

	$mensaje = "Solicitud de registro de: ".$empresa.". Email: ".$email."";
					
	mail('debandidistribuciones@hotmail.com', 'Solicitud de Registro', $mensaje);

	//mail('gc.globalcom@gmail.com', 'Solicitud de Registro', $mensaje);

	$mensaje2 = "El registro se realizo exitosamente, a la brevedad sera revisado para su aprobacion y asi podra iniciar sesion con su email y contraseña \r\n Una vez autorizado sera notificado por este medio.";

	mail($email, 'Solicitud de Registro Debandi Distribuciones', $mensaje2);

	echo("El registro se realizo exitosamente, será notificado via email. (si no lo recibe, revise la sección Spam o Correo No Deseasdo)"); 
}
?>