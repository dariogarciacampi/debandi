<?php session_start();

						include("conexion.php");
		            			$fecha = date("Y-m-d") ;
		            			$idu = $_SESSION["codigou"];
		            			$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
		            			
								    $pedido = mysqli_fetch_array($carrito);

								    $cpedi = $pedido ["CodiPedi"];
								    $codigop = $_GET["id"];
								    $articulo =  mysqli_query($conectado,"SELECT PrecProd FROM producto WHERE CoddProd = '".$codigop."'");
								    $product = mysqli_fetch_array($articulo);
								    $precio = $product["PrecProd"];
								    $cantidad =  mysqli_query($conectado,"SELECT CantUsPr FROM usuaprod WHERE CodiProdu = '".$codigop."' AND CodiPedi = '".$cpedi."'");
								    $cant = mysqli_fetch_array($cantidad);
								    $ccant = $cant["CantUsPr"];
								    $ccant = $ccant - 1;
								    mysqli_query($conectado,"UPDATE usuaprod SET CantUsPr = '".$ccant."' WHERE CodiProdu = '".$codigop."' AND CodiPedi = '".$cpedi."'");
								    


								    $calcular =  mysqli_query($conectado,"SELECT TotaUsPr, CantUsPr FROM usuaprod WHERE CodiPedi = '".$cpedi."'");
								    	 while ($calculo = mysqli_fetch_array($calcular))
						  						{
						  							$total = $calculo["TotaUsPr"] * $calculo["CantUsPr"];
						  							$totalped = $totalped + $total;
						  						}
						  			mysqli_query($conectado,"UPDATE pedido SET TTotPedi = '".$totalped."' WHERE CodiPedi = '".$cpedi."'");
						  						
						  			
							            		
?>