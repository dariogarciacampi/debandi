<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Debandi Distribuciones</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	<link rel="stylesheet" href="css/principal.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="style.css">
	<script src="jquery.js" type="text/javascript"></script>
	<script type="text/javascript" src="lib/alertify.js"></script>
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

	<link href="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.css" rel="stylesheet"/>

<link href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/css/bootstrap.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.2/js/bootstrap.js"></script> 








<script>


</script>


<script type="text/javascript">

				


				  $(document).ready(function(){
				  	


				});

				</script>

</head>
<body> 

	

	<body>

	<div class="container">

		
		<div class="col-md-10">
			<div class="col-xs-12">
				
		</div>

		<div id="listaarticulos">
			<?php
				session_start();
				include("conexion.php");
				$idu = $_SESSION["codigou"];
				$cpedi = $_GET["id"];
				$carrito =  mysqli_query($conectado,"SELECT CodiPedi,TTotPedi,ComePedi FROM pedido WHERE CodiPedi = '".$cpedi."'");
		            			if(mysqli_num_rows($carrito) > 0){
								    $pedido = mysqli_fetch_array($carrito);
								    $cpedi = $pedido ["CodiPedi"];
								    $comentario = $pedido["ComePedi"];
									$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, PrecProd, ImagProd, CantUsPr FROM usuaprod INNER JOIN producto ON producto.CoddProd = usuaprod.CodiProdu WHERE usuaprod.CodiPedi = '".$cpedi."'");

									$cliente =  mysqli_query($conectado,"SELECT EmprUsua, NombProv, NombLoca, MailUsua FROM pedido INNER JOIN usuario ON usuario.CodiUsua = pedido.CodiUsua INNER JOIN localidad ON localidad.CodiLoca = usuario.CodiLoca INNER JOIN provincia ON provincia.CodiProv = localidad.CodiProv WHERE pedido.CodiPedi = '".$cpedi."'");

									?>
									<input type="button" name="imprimir" value="Imprimir" onclick="window.print();">
									<u><H4>DATOS DE CLIENTE</H4></u>

									<table class="table">
								  <thead>
								    <tr>
								      <th>Empresa</th>
								      <th>Provincia</th>
								      <th>Localidad</th>
								      <th>Email</th>
								      
								    </tr>
								  </thead>
								  <tbody>
								  <?php
									$datosc = mysqli_fetch_array($cliente);
					    			?>
					    			<tr>
					      			<td><?php echo $datosc["EmprUsua"] ; ?></td>
					      			<td><?php echo $datosc["NombProv"] ; ?></td>
					      			<td><?php echo $datosc["NombLoca"] ; ?></td>
					      			
					      			<td><?php echo $datosc["MailUsua"] ; ?></td>
					      			
					      			
					      			</tr>	
							        </tbody>
								</table>

									<u><H4>DATOS DE PEDIDO</H4></u>
									<h5><?php echo "Comentario:  ".$comentario."" ;?></h5>
									<table class="table">
								  <thead>
								    <tr>
								      <th>Codigo</th>
								      <th>Producto</th>
								      
								      <th>Cant</th>
								      
								      <th>Observacion</th>
								      
								      
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
					      			
					      			<td style="text-align: center;"><?php echo $prod["CantUsPr"] ; ?></td>
					      			
					      			
					      			<td>______________</td>
					      			
					      			</tr>	
					      					
							        <?php } 
							        ?>
							        </tbody>
								</table>
								
								<?php
							} else {
								
								echo "No se puede visualizar este pedido en este momento,comuniquese con el administrador..";
								
							}

			?>

		</div>


		</div>

	</div>	
		


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>