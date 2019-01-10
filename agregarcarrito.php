
<script language="javascript" type="text/javascript">

var cantidad = prompt ("Ingrese la cantidad a pedir", "1") 

</script>

<?php session_start();

						include("conexion.php");
		            			$fecha = date("Y-m-d") ;
		            			$idu = $_SESSION["codigou"];
		            			$cantidad = $_GET["cantidad"];
		            			$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
		            			if(mysqli_num_rows($carrito) > 0){
								    $pedido = mysqli_fetch_array($carrito);

								    $cpedi = $pedido ["CodiPedi"];
								    $codigop = $_GET["id"];
								    $articulo =  mysqli_query($conectado,"SELECT PrecProd FROM producto WHERE CoddProd = '".$codigop."'");
								    $product = mysqli_fetch_array($articulo);
								    $precio = $product["PrecProd"];
								    $repetido =  mysqli_query($conectado,"SELECT CantUsPr FROM usuaprod WHERE CodiProdu = '".$codigop."' AND CodiPedi = '".$cpedi."'");
		            				if(mysqli_num_rows($repetido) > 0){
		            					$cant = mysqli_fetch_array($repetido);
								    $ccant = $cant["CantUsPr"];
								    $ccant = $ccant + $cantidad;
								    mysqli_query($conectado,"UPDATE usuaprod SET CantUsPr = '".$ccant."' WHERE CodiProdu = '".$codigop."' AND CodiPedi = '".$cpedi."'");
		            				} else{
		            					//$cantidad = 1 ;
		            					
								    	mysqli_query($conectado,"INSERT INTO usuaprod (CodiPedi, CodiProdu, TotaUsPr, CantUsPr) values ('".$cpedi."','".$codigop."', '".$precio."','".$cantidad."')");
		            				}


								    $calcular =  mysqli_query($conectado,"SELECT TotaUsPr,CantUsPr FROM usuaprod WHERE CodiPedi = '".$cpedi."'");
								    	 while ($calculo = mysqli_fetch_array($calcular))
						  						{
						  							$total = $calculo["TotaUsPr"] * $calculo["CantUsPr"]; 
						  							$totalped = $totalped + $total;
						  						}
						  			mysqli_query($conectado,"UPDATE pedido SET TTotPedi = '".$totalped."' WHERE CodiPedi = '".$cpedi."'");		
						  			
							    } else {

							    	$codigop = $_GET["id"];
								    $articulo =  mysqli_query($conectado,"SELECT PrecProd FROM producto WHERE CoddProd = '".$codigop."'");
								    $product = mysqli_fetch_array($articulo);
								    $precio = $product["PrecProd"];


							    	mysqli_query($conectado,"INSERT INTO pedido (CodiUsua, TIvaPedi, TTotPedi, EstaPedi, FechPedi) values ('".$idu."', '0','".$precio."','Pendiente','".$fecha."')");

							    	$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
							    	$pedido = mysqli_fetch_array($carrito);

								    $cpedi = $pedido ["CodiPedi"];
								   
								    mysqli_query($conectado,"INSERT INTO usuaprod (CodiPedi, CodiProdu, IvaUsPr, TotaUsPr, CantUsPr) values ('".$cpedi."','".$codigop."', '0', '".$precio."','".$cantidad."')");
									
									$calcular =  mysqli_query($conectado,"SELECT TotaUsPr FROM usuaprod WHERE CodiPedi = '".$cpedi."'");
								    	 while ($calculo = mysqli_fetch_array($calcular))
						  						{
						  							$total = $calculo["TotaUsPr"] * $calculo["CantUsPr"]; 
						  							$totalped = $totalped + $total;
						  						}
						  			mysqli_query($conectado,"UPDATE pedido SET TTotPedi = '".$totalped."' WHERE CodiPedi = '".$cpedi."'");	

							    }
?>