<?php
		
	 	include("conexion.php");
	$id = $_GET["id"];
	 mysqli_query($conectado,"UPDATE pedido SET EstaPedi = 'En Preparacion' WHERE CodiPedi = '".$id."'");
	 
?>