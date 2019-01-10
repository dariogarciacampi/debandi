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


<style>
.mynavbar {
	text-align:center;
}
.mynavbar .nav {
	float:none;
}
.mynavbar .nav li {
	display:inline-block;
	float:none;
	margin:0 20px;
	vertical-align:middle;
}
.mynavbar .nav li a {
	border-radius:10px;
	color:#fff;
}
.mynavbar .nav li a:hover {
	color:gray;
}
.mynavbar .nav li.mylogo a, .mynavbar .nav li.mylogo a:hover {
	background:transparent;
	max-width:150px;
}
.mynavbar .nav li.mylogo a img {
	width:100%;
	height:auto;
	vertical-align:middle;
	display:inline-block;
}
.navbar-brand {
	display:none
}
 @media screen and (max-width:768px) {
.navbar-brand {
	display:inline
}
.mynavbar .nav li {
	display:block;
	margin:0
}
.mynavbar .nav li a {
	border-radius:0;
	display:block;
	border-bottom:1px solid #fff
}
.mynavbar li.mylogo {
	display:none
}
}
</style>





<script>


</script>


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
						alertify.log("Mandado a Preparar..."); 
						return false;
						}	

				  	function ok(){
					alertify.success("Pedido Cancelado con Éxito"); 
					return false;
					}	

							$('.preparar').click(function(e) {
					          e.preventDefault();
					          //recogemos la dirección del Proceso PHP
					          href = $(this).attr('href');
					          cargando();
					          //alert(href);
					          $.ajax({
				     			 url: href,
				     			  success: function(){
				     			  	location.reload();
				     			  	
				     			  }

				     			});
				     			
					          });

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
			
			<direccion class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
				<div class="container">
					<?php if (!isset($_SESSION["user"])){ ?>
					<form method="post" id="formsesion" >
						<div class="col-xs-5 col-sm-5 col-md-3 col-lg-2">
	      				<input type="text" id="login" name="login" value="" placeholder="Email" class="form-control">
	      				</div>
	      				<div class="col-xs-5 col-sm-5 col-md-3 col-lg-2">
	      				<input type="password" id="password" name="password" value="" placeholder="Contraseña" class="form-control">
	      				</div>
	      				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
	      				<input type="button" id="iniciar-btn" value="Iniciar Session" class="btn btn-default">
	      				</div>
    				</form>
    				<h4 class="col-xs-12 session" id="resp" name="resp">
	      				</h4>
    				<?php } else { ?>
    				<form method="post" action="cerrarse.php" >
	    				<div class="col-xs-9 col-sm-5 col-md-4 col-lg-3 session">
	    					<h4>Bienvenido <?php echo $_SESSION["empresa"] ;?></h4>
		      			</div>
						<div class="col-xs-2">
		      				<input type="submit" id="cerrar-btn" value="Cerrar Session" class="btn btn-default">
		      			</div>
	      			</form>
	      			<?php   } ?>
    			</div>
			</direccion>
			<div class="container">
				<div class="col-xs-0 col-sm-2 col-md-3 col-lg-3">
				</div>
				<div class="col-xs-12 col-sm-8 col-md-6 col-lg-6">
					<a href="index.php"><img src="imagen/logo.jpg" height="150" class="img-responsive"/> </a> 
				</div> 
				<div class="col-xs-0 col-sm-2 col-md-3 col-lg-3">
				</div>
			</div>

			<nav class="navbar navbar-default navbar-inverse">
			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			<div class="container">	
					<div class="collapse navbar-collapse navbar-inverse mynavbar" id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="productos.php">Productos</a></li>
							<li><a href="catalogo.php">Catálogo Digital</a></li>
							<?php if ($_SESSION['tipo'] <> "Administrador"){ ?>
							<li><a href="registro.php">Registrese</a></li>
							<li><a href="contacto.php">Contacto</a></li>
							<?php } else { ?>
							<li><a href="cpanel.php">Panel de Control</a></li>
							<li><a href="carrito.php"><img src="imagen/carrito.png" height="25" width="25" />  Carrito de Compras</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			
			</nav>
	</header>

	<body>

	<div class="container">

		<div class="col-md-2 column margintop20">
		   <ul class="nav nav-pills nav-stacked">
		  <li ><a href="pendientes.php"><span class="glyphicon glyphicon-chevron-right"></span> Online</a></li>
		  <li class="active"><a href="pedidos.php"><span class="glyphicon glyphicon-chevron-right"></span> A Preparar</a></li>
		  <li ><a href="concretados.php"><span class="glyphicon glyphicon-chevron-right"></span> Confirmados</a></li>
		  <!-- <li><a href="concretados.php"><span class="glyphicon glyphicon-chevron-right"></span>Concretados</a></li> -->
		</ul>
		</div>
		<div class="col-md-10">
			<div class="col-xs-12">
				
		</div>

		<div id="listaarticulos">
			<?php
				session_start();
				include("conexion.php");

				

				$carrito =  mysqli_query($conectado,"SELECT CodiPedi,TTotPedi,FechPedi, EmprUsua, NombLoca, NombProv FROM pedido INNER JOIN usuario ON usuario.CodiUsua = pedido.CodiUsua INNER JOIN localidad ON localidad.CodiLoca = usuario.CodiLoca INNER JOIN provincia ON provincia.CodiProv = localidad.CodiProv WHERE pedido.EstaPedi = 'Pedido' ORDER BY CodiPedi DESC");
		            			if(mysqli_num_rows($carrito) > 0){
									?>
									<table class="table table-striped">
								  <thead>
								    <tr>
								      <th>Pedido</th>
								      <th>Fecha</th>
								      <th>Empresa</th>
								      <th>Localidad</th>
								      <th>Provincia</th>
								      <th>Total</th>
								      
								      
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
					      			<td><?php echo $ped["EmprUsua"] ; ?></td>
					      			<td><?php echo $ped["NombLoca"] ; ?></td>
					      			<td><?php echo $ped["NombProv"] ; ?></td>
					      			<td>$ <?php echo $ped["TTotPedi"] ; ?> + IVA</td>
					      			
					      			<?php $id = $cpedi ;


					      			?>
      								<td><?php echo "<a title='Ver' href='verpedadm.php?id=" . $id . "'><img src='imagen/ver.jpg' border='0' width='20' class='img-responsive'></a>"; ?></td>
      								<td><?php echo "<a title='Imprimir' href='imprimirped.php?id=" . $id . "' target='_blank'><img src='imagen/imprimir.png' border='0' width='20' class='img-responsive'></a>"; ?></td>
      								<td><?php echo "<a title='Venta Concretada' class='preparar' href='concretar.php?id=" . $id . "'><img src='imagen/ok.jpg' border='0' width='20' class='img-responsive'></a>"; ?></td>
      								<td><?php echo "<a title='Eliminar' class='delete' href='deleteped.php?id=" . $id . "'><img src='imagen/eliminar.png' border='0' width='20' class='img-responsive'></a>"; ?></td>

      								
					      			</tr>			
							        <?php } 
							        ?>
							        </tbody>
								</table>
								<?php
							} else {
								
								echo "No hay pedidos pendientes";
								
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