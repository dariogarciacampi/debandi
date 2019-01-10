<?php
		
	 	include("conexion.php");
	$id = $_GET["id"];
	 mysqli_query($conectado,"DELETE FROM usuario WHERE CodiUsua = ".$id."");
	

	echo("La eliminacion se realizo exitosamente. ".'<a href="maestrocliente.php" title="">Volver a Maestro de Clientes</a>'.""); 
   

?>