<?php 
$enlace = "pdf/ListaActualizadaPag.115-149.xlsx";
header ("Content-Disposition: attachment; filename= ListaActualizadaPag.115-149.xlsx");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>