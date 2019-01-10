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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


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

	
	
		<div class="container">
		<?php if (!isset($_SESSION["user"])){ ?>
			<h4>Debes estar registrado para visualizar esta sección.</h4>
			<?php } else { ?>

				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
					<div class="panel panel-primary">
						<div class="panel-heading">Clientes</div>
	  						<div class="panel-body">
	  						<p><a href="maestrocliente.php" title="">Maestro de Clientes</a></p>
							</div>

					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Carrito de Compras</div>
	  						<div class="panel-body">
	  						<p><a href="pendientes.php" title="">Ventas Online</a></p>
	  						<p><a href="pedidos.php" title="">Ventas Para Preparar</a></p>
	  						<p><a href="concretados.php" title="">Ventas Confirmadas</a></p>
	  						<!-- <p><a href="concretados.php" title="">Ventas Concretadas</a></p> -->
							</div>

					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Slider</div>
	  						<div class="panel-body">
	  						<p><a href="lislider.php" title="">Administrar Slider</a></p>
	  						<!-- <p><a href="concretados.php" title="">Ventas Concretadas</a></p> -->
							</div>

					</div>
					
				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="panel panel-primary">
						<div class="panel-heading">Articulos</div>
	  						<div class="panel-body">
	  						<p><a href="nuevoprod.php" title="">Nuevo Artículo</a></p>
	  						<p><a href="maestroarticulo.php" title="">Maestro de Articulos</a></p>
							</div>

					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Importar</div>
	  						<div class="panel-body">
	  						<p><a href=".php" title="">Archivo de Modificación de Articulos</a></p>
	  						<p><a href=".php" title="">Archivo PDF para descarga de Lista de Precios</a></p>
							</div>

					</div>

				</div>
				<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
				<div class="panel panel-primary">
						<div class="panel-heading">Categoría</div>
	  						<div class="panel-body">
	  						<p><a href="maestrocategoria.php" title="">Nueva/Modificar Categoría</a></p>
							</div>

					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">Servicios Externos</div>
	  						<div class="panel-body">
	  						<p><a href=".php" title="">Creacion de Catálogo Digital</a></p>
	  						<p><a href=".php" title="">Envio de Email Masivos</a></p>
							</div>

					</div>
				</div>
				<?php } ?>
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