<?php 
$enlace = "pdf/ListaDebandi.pdf";
header ("Content-Disposition: attachment; filename= ListaDebandi.pdf");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>