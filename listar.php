<?php
				session_start();
				include("conexion.php");
				$idu = $_SESSION["codigou"];
				$carrito =  mysqli_query($conectado,"SELECT CodiPedi FROM pedido WHERE CodiUsua = '".$idu."' AND EstaPedi = 'Pendiente'");
		            			if(mysqli_num_rows($carrito) > 0){
								    $pedido = mysqli_fetch_array($carrito);
								    $cpedi = $pedido ["CodiPedi"];
									$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, PrecProd, ImagProd, CantUsPr FROM usuaprod INNER JOIN producto ON producto.CoddProd = usuaprod.CodiProdu WHERE usuaprod.CodiPedi = '".$cpedi."'");

									?>
									<table class="table table-striped">
								  <thead>
								    <tr>
								      <th>Codigo</th>
								      <th>Producto</th>
								      <th>-</th>
								      <th>Cant</th>
								      <th>+</th>
								      <th>Precio</th>
								      <th>Imagen</th>
								    </tr>
								  </thead>
								  <tbody>
								  <?php
									while( $prod = mysqli_fetch_array($producto) ) {
					    			?>
					    			<tr>
					      			<td><?php echo $prod["CoddProd"] ; ?></td>
					      			<td><?php echo $prod["NombProd"] ; ?></td>
					      			<?php $id = $prod["CoddProd"] ; ?>
					      			<td><?php echo "<a class='calcular' href='restar.php?id=" . $id . "'>-</a>"; ?></td>
					      			<td style="text-align: center;"><?php echo $prod["CantUsPr"] ; ?></td>
					      			<td><?php echo "<a class='calcular' href='sumar.php?id=" . $id . "'>+</a>"; ?></td>
					      			<td>$ <?php echo $prod["PrecProd"] ; ?></td>
					      			<?php 
					      			 $imagen = $prod["ImagProd"]; ?>
					      			<td><?php echo "<img src='".$imagen."' border='0' width='40px' height='40px'>"; ?></td>
					      			</tr>			
							        <?php } ?>
							        </tbody>
								</table>
									<?php
							} else {
								
								echo "Usted no tiene articulos ingresados en el carrito de compras.";
								
							}

			?>