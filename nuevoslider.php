<?php 

$orden = $_POST["orden"];
$estado = $_POST["estado"];
if (!empty($_FILES["imag"]["name"])) {
	 		$imagen = $_FILES["imag"]["name"];
    	$nombre_archivo = rand(100,9999).$imagen;
    	$ruta = $_FILES["imag"]["tmp_name"];
	 	$destino = "slider/".$nombre_archivo ;
	 	move_uploaded_file($ruta, $destino);
	 	}
include("slider.php");
$slider = new slider;
$slider->agregarSlider($destino,$orden,$estado);
echo 1;

?>
