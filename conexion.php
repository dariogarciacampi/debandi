<?php /*
$conectado=mysql_connect("mysql16.000webhost.com","a5116094_globalw","global305");
mysql_select_db("a5116094_globalw",$conectado)or die("Error en la conexion"); */



$conectado=mysqli_connect("localhost","root","");
mysqli_select_db($conectado,"debandi")or die("Error en la conexion");




/* conexion PHP 7

$conectado = mysqli_connect("localhost","root","","debandi");

if (!$conectado) {
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}  */
?>

