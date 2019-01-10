<?php
 if(isset($_POST["idprov"]))
 {
						include("conexion.php");
		            	$result = mysqli_query($conectado,"select CodiLoca, NombLoca from localidad WHERE CodiProv = ".$_POST["idprov"]);
		            	  $opciones = '<option value="0"> Seleccione una Localidad</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						     $opciones.='<option value="'.$fila["CodiLoca"].'">'.$fila["NombLoca"].'</option>';
						  }

						  echo($opciones);
						}
						?>