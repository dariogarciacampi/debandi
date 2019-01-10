<?php session_start();
		
	 	include("conexion.php");
	$id = $_GET["id"];
	$fecha = date("Y-m-d") ;
	 mysqli_query($conectado,"UPDATE pedido SET EstaPedi = 'Concretado', FechPedi = '".$fecha."' WHERE CodiPedi = '".$id."'");
	 $email =  mysqli_query($conectado,"SELECT MailUsua FROM usuario INNER JOIN pedido ON pedido.CodiUsua = usuario.CodiUsua WHERE pedido.CodiPedi = '".$id."'");
	 /*
	 mysqli_query($conectado,"SELECT CodiPedi,TTotPedi,FechPedi, EmprUsua, NombLoca, NombProv FROM pedido INNER JOIN usuario ON usuario.CodiUsua = pedido.CodiUsua
	 */
		            			
								    $emailu = mysqli_fetch_array($email);
								    $emailusua = $emailu["MailUsua"];

	 $mensaje = "Su pedido esta siendo preparado. Muchas gracias por su compra!";
					
	mail($emailusua , 'Debandi Distribuciones Pedido', $mensaje);
	 
?>