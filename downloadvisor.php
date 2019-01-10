<?php 
$enlace = "pdf/readerdc.exe";
header ("Content-Disposition: attachment; filename= readerdc.exe");
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);
?>