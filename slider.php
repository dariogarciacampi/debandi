<?php 
class slider{

	

	Public function agregarSlider($imagen,$orden,$estado){
		include("conexion.php");
		$sql = "INSERT INTO slider (ImagSlid, OrdeSlid, EstaSlid) VALUES ('".$imagen."','".$orden."','".$estado."')";
		mysqli_query($conectado,$sql);
	}

	Public function mostrarSlider(){
		include("conexion.php");
		$sql = "SELECT * FROM slider ORDER BY OrdeSlid ASC";
		$result = mysqli_query($conectado,$sql);
		return $result;
	}
	Public function buscarSlider($id){
		include("conexion.php");
		$sql = "SELECT * FROM slider WHERE CodiSlid = '".$id."'";
		$result = mysqli_query($conectado,$sql);
		return $result;
	}
	Public function modificaSlider($orden,$estado,$id){
		include("conexion.php");
		$sql = "UPDATE slider SET OrdeSlid = '".$orden."', EstaSlid = '".$estado."' WHERE CodiSlid = '".$id."'";
		mysqli_query($conectado,$sql);
	}
		Public function eliminarSlider($id){
		include("conexion.php");
		$sql = "DELETE FROM slider WHERE CodiSlid = '".$id."'";
		mysqli_query($conectado,$sql);
	}
}
?>
