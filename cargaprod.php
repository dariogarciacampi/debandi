<?php
		$codigo = $_POST['codigo'];
	 	$categoria = $_POST["categoria"];
	 	$nombre = $_POST["nombre"];
	 	$precio = $_POST["precio"];
	 	$imagen = "default.jpg";
	 	$destino = "productos/".$imagen;
	 	if (!empty($_FILES["archivo"]["name"])) {
	 		$imagen = $_FILES["archivo"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["archivo"]["tmp_name"];
	 	$destino = "productos/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	}
    	
	 	$fecha = date("Y-m-d") ;
	 	$estado = "Activo" ;

	 	

	include("conexion.php");
	$result = mysqli_query($conectado,"INSERT INTO producto (NombProd, PrecProd, CodiCate, CoddProd, EstaProd, ImagProd, FechProd) values ('".$nombre."', '".$precio."',".$categoria.",'".$codigo."', '".$estado."','".$destino."','".$fecha."')");
	

	header('Location:nuevoprod.php');

?>
