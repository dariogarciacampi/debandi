<?php
		$codigo = $_POST['codigo'];
	 	$categoria = $_POST["categoria"];
	 	$estado = $_POST["estado"];
	 	$nombre = $_POST["nombre"];
	 	$precio = $_POST["precio"];
	 	$imagen = "";
	 	$destino = "productos/".$imagen;
	 	$fecha = date("Y-m-d") ;
	 	include("conexion.php");
	 	if (!empty($_FILES["archivo"]["name"])) {
	 		$imagen = $_FILES["archivo"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["archivo"]["tmp_name"];
	 	$destino = "productos/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	mysqli_query($conectado,"UPDATE producto Set NombProd = '".$nombre."', PrecProd = '".$precio."',CodiCate = ".$categoria.",EstaProd = '".$estado."',FechProd = '".$fecha."', ImagProd = '".$destino."'  WHERE CoddProd = '".$codigo."'");
	 	}else{
	 mysqli_query($conectado,"UPDATE producto SET NombProd = '".$nombre."', PrecProd = '".$precio."',CodiCate = ".$categoria.",EstaProd = '".$estado."',FechProd = '".$fecha."' WHERE CoddProd = '".$codigo."'");
	}

	header('Location:maestroarticulo.php');

?>