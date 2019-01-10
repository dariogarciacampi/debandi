<?php 
	
		$nombre = $_POST["nombre"];
	 	$email = $_POST["email"];
	 	$consulta = $_POST['comentario'];
	 	

	$mensaje = "Consulta de: '".$nombre."'. Email: '".$email."' Consulta: '".$consulta."'" ;
					
	mail('debandidistribuciones@hotmail.com', 'Consulta desde la Web', $mensaje);

	echo("La consulta se envió exitosamente, a la brevedad sera contactado via email para responder a su consulta."); 
	?>