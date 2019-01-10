<?php 

$codigo = $_GET["id"];
include("slider.php");
$slider = new slider;
$slider->eliminarSlider($codigo);
echo 1;

?>
