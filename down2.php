<?php 
$enlace = "pdf/ListaActualizadaPag.45-87.xlsx";
header ("Content-Disposition: attachment; filename= ListaActualizadaPag.45-87.xlsx");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>