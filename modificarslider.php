<?php 
$codigo = $_POST["codigomodi"];
$orden = $_POST["ordenmodi"];
$estado = $_POST["estadomodi"];
include("slider.php");
$slider = new slider;
$slider->modificaSlider($orden,$estado,$codigo);
echo 1;

?>
