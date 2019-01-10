<?php session_start();

						include("conexion.php");
		            			$fecha = date("Y-m-d") ;
		            			$idu = $_SESSION["codigou"];
		            			$comentario = $_POST["comentario"];
		            			$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
		            			
								    $pedido = mysqli_fetch_array($carrito);

								    $cpedi = $pedido ["CodiPedi"];
								    
						  			mysqli_query($conectado,"UPDATE pedido SET EstaPedi = 'Pedido', ComePedi = '".$comentario."' WHERE CodiPedi = '".$cpedi."'");
						  			header ("Location: historial.php");

						  			$empresa = $_SESSION["empresa"];
						  			$mensaje = "Solicitud de pedido nueva de ".$empresa."!, revisa en la web las Ventas para Preparar.";
					
									mail('debandidistribuciones@hotmail.com', 'Solicitud de Pedido', $mensaje);
						  						
						  			
							            		
?>