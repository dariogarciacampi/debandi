<?php session_start();?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Debandi Distribuciones</title>
	<link rel="icon" type="image/png" href="imagen/icon.png" />
	<link rel="stylesheet" href="css/img.css">
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





<script type="text/javascript">

				


				  $(document).ready(function(){

				  	$("#mostrarmodal").on('hidden.bs.modal', function() {
					  location.reload();
					});
				  	
				  	$("#cerrar-btn").click(function(){
				    $.ajax({
				      url:"cerrarse.php",
				      type: "POST",
				      success: function(respuesta){
				      	
				        if (respuesta == 1) {
				        	$("#mostrarmodal").modal("show");
				        }
				      }
				    });

				  });
				  	
			
				  	var href;

				 
					function cargando(){
						alertify.log("Cancelando Pedido..."); 
						return false;
						}	

				  	function ok(){
					alertify.success("Pedido Cancelado con Éxito"); 
					return false;
					}	

							$('.delete').click(function(e) {
					          e.preventDefault();
					          //recogemos la dirección del Proceso PHP
					          href = $(this).attr('href');
					          cargando();
					          //alert(href);
					          $.ajax({
				     			 url: href,
				     			  success: function(){
				     			  	location.reload();
				     			  	ok();
				     			  }

				     			});
				     			
					          });

							
				


				  	$("#resp").hide()
				  	$(".session").css('color','white')
				    $("#iniciar-btn").click(function(){

				    	var login = $("#login").val();
				    	var password = $("#password").val();
				    	

				    	if (login == "") {
							$("#login").focus();
							return false;
						}
						if (password == "") {
							$("#password").focus();
							return false;
						}
					

				    	var dataString = 'login=' + login + '&password=' + password ;
				    $.ajax({
				      url:"iniciarse.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				      	 if (respuesta == 1) {
				        	$("#mostrarmodal").modal("show");
				        } else {
				        	$("#resp").show()
				        $("#resp").html(respuesta);
				        }
				      }
				    });

				  });


				});

				</script>

</head>
<body> 

	<header>
			
			<?php include("cabecera.php"); ?>
	</header>
<div class="container-fluid" style="border-bottom: 1px">

		<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
	      <div class="modal-dialog">
	        <div class="modal-content">
	           <div class="modal-header" style="color: red; font-family: Ravie;">
	          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	              <h1><b>¡OFERTAS de la semana!</b></h1>
	           </div>
	           <div class="modal-body">
	              <a href="oferta.php"><img class="img-responsive" src="imagen/0001.jpg"></a>  
	       </div>
	      </div>
	   </div>
	</div>
</div>
	<div class="container">

		<div class="col-md-2 column margintop20">
		   <ul class="nav nav-pills nav-stacked">
		  <li><a href="carrito.php"><span class="glyphicon glyphicon-chevron-right"></span> Artículos en el Carrito</a></li>
		  <li class="active"><a href="historial.php"><span class="glyphicon glyphicon-chevron-right"></span> Historial de Compras</a></li>

		</ul>
		</div>
		<div class="col-md-10">
			<div class="col-xs-12">
				
		</div>

		<div id="listaarticulos">
			<?php
				session_start();
				include("conexion.php");
				$idu = $_SESSION["codigou"];
				$carrito =  mysqli_query($conectado,"SELECT CodiPedi,TTotPedi,FechPedi,EstaPedi FROM pedido WHERE CodiUsua = '".$idu."' ORDER BY CodiPedi DESC");
		            			if(mysqli_num_rows($carrito) > 0){
		            				
									

									?>
									<table class="table table-striped">
								  <thead>
								    <tr>
								      <th>Codigo</th>
								      <th>Fecha del Pedido</th>
								      <th>Total</th>
								      <th>Estado</th>
								      
								    </tr>
								  </thead>
								  <tbody>
								  <?php
									while( $ped = mysqli_fetch_array($carrito) ) {
										$cpedi = $ped ["CodiPedi"];
					    			?>
					    			<tr>
					      			<td><?php echo $cpedi ; ?></td>
					      			<td><?php echo $ped["FechPedi"] ; ?></td>
					      			<td>$ <?php echo $ped["TTotPedi"] ; ?> + IVA</td>
					      			<td><?php echo $ped["EstaPedi"] ; ?></td>
					      			<?php $id = $cpedi ;


					      			?>
      								<td><?php echo "<a title='Ver' href='verped.php?id=" . $id . "'><img src='imagen/ver.jpg' border='0' width='20' class='img-responsive'></a>"; ?></td>
					      			</tr>			
							        <?php } 
							        ?>
							        </tbody>
								</table>
								<?php
							} else {
								
								echo "Usted aún no ha realizado ningun pedido";
								
							}

			?>

		</div>


		</div>

	</div>	
		
		<div id="footer">
	      <div class="well">
	        <p class="text-muted credit" style="text-align: center">Debandi Distribuciones © Copyright 2017 </p>
	     	<p class="text-muted credit" style="text-align: center">Pje. Julian Aguirre 81 - Río Cuarto - Córdoba</p>
	     	<p class="text-muted credit" style="text-align: center">0358-4636065 </p>
	      </div>
   		 </div>


	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js" integrity="sha512-K1qjQ+NcF2TYO/eI3M6v8EiNYZfA95pQumfvcVrTHtwQVDG+aHRqLi/ETn2uB+1JqwYqVG3LIvdm9lj6imS/pQ==" crossorigin="anonymous"></script>
</body>
</html>