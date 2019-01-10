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

	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="monitor-signature" content="monitor:player:html5">
 <meta name="apple-mobile-web-app-status-bar-style" content="black" />
 
<meta name="Keywords" content="" />
<meta name="Description" content="ListaDebandi" />
<meta name="Generator" content="Flip PDF 4.3.21  at http://www.flipbuilder.com" />
<link rel="image_src" href="files/shot.png">
<meta name="og:image" content="files/shot.png">
<meta property="og:image" content="files/shot.png">
<title>ListaDebandi</title>

<link rel="stylesheet" href="mobile/style/style.css" />
<link rel="stylesheet" href="mobile/style/player.css" />
<link rel="stylesheet" href="mobile/style/phoneTemplate.css" />

<script src="mobile/javascript/jquery-1.9.1.min.js"></script>

<script src="mobile/javascript/config.js"></script>

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
		<div class="container-fluid">

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

		<?php if (!isset($_SESSION["user"])){ ?>
			<h4>Debes estar registrado para visualizar esta sección.</h4>
			<?php } else { ?>

				<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
					
						<div class="col-xs-12 col-sm-4">
							<form action="downloadvisor.php" method="post" accept-charset="utf-8">
								<input class="btn btn-danger" type="submit" name="guardarvisor" id="guardarvisor" value="Descargar Visor de PDF">
							</form>
							</br>
						</div>
						<div class="col-xs-12 col-sm-4">
							<form action="download.php" method="post" accept-charset="utf-8">
								<input class="btn btn-primary" type="submit" name="guardar" id="guardad" value="Lista Completa en PDF">
							</form>
							</br>
						</div>
					

					
						<div class="col-xs-12 col-sm-4">
							<form action="down1.php" method="post" accept-charset="utf-8">
								<input class="btn btn-success" type="submit" name="guardar1" id="guardar1" value="Lista Completa en Excel">
							</form>
							</br>
						</div>
					
					<iframe width="100%" height="700px" src="cdigital.html"  frameborder="0" allowfullscreen="true"  allowtransparency="true"></iframe>
				</div>
				<div class="col-xs-0 col-sm-0 col-md-1 col-lg-1">
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