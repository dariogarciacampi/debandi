<?php
		
	 	include("conexion.php");
	$id = $_GET["id"];
	 mysqli_query($conectado,"DELETE FROM pedido WHERE CodiPedi = ".$id."");
?>