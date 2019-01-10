<?php 
$enlace = "pdf/lista del sistema.xlsx";
header ("Content-Disposition: attachment; filename= Lista_Debandi.xlsx");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>