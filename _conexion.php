<?php /*
$conectado=mysql_connect("mysql16.000webhost.com","a5116094_globalw","global305");
mysql_select_db("a5116094_globalw",$conectado)or die("Error en la conexion"); */

/*

$conectado=mysql_connect("localhost","root","");
mysql_select_db("debandi",$conectado)or die("Error en la conexion");

*/


/* conexion PHP 7*/

$conectado = mysqli_connect("mysql.hostinger.com.ar","u726267359_debau","deban17","u726267359_deban");

if (!$conectado) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuraciÃ³n: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuraciÃ³n: " . mysqli_connect_error() . PHP_EOL;
    exit;
} 
?>