<?php 
$enlace = "pdf/ListaActualizadaPag.87-114.xlsx";
header ("Content-Disposition: attachment; filename= ListaActualizadaPag.87-114.xlsx");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>