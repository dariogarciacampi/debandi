<?php
if (isset($_GET['term'])){
include("conexion.php");
$return_arr = array();
	$fetch = mysqli_query($conectado,"SELECT * FROM producto where NombProd like '%" . mysqli_real_escape_string($conectado,($_GET['term'])) . "%'"); 
	


	/* Recuperar y almacenar en conjunto los resultados de la consulta.*/
	while ($row = mysqli_fetch_array($fetch)) {
		$id_producto=$row['CodiProd'];
		$precio=number_format($row['PrecProd'],2,".","");
		$row_array['value'] = $row['CoddProd']." | ".$row['NombProd']." | ".$row['PrecProd'];
		$row_array['id_producto']=$row['CodiProd'];
		$row_array['codigo']=$row['CoddProd'];
		$row_array['descripcion']=$row['NombProd'];
		$row_array['precio']=$precio;
		array_push($return_arr,$row_array);
    }

 
/* Codifica el resultado del array en JSON. */
echo json_encode($return_arr);
 
}
?>