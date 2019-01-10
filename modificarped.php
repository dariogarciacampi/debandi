<?php
		
	 	include("conexion.php");
	$id = $_GET["id"];
	 mysqli_query($conectado,"UPDATE pedido SET EstaPedi = 'Pendiente' WHERE CodiPedi = '".$id."'");
	 header ("Location: carrito.php");
?>