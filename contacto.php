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

				<script type="text/javascript">
				  $(document).ready(function(){
				  	$('.error').hide();
				  	$('.error').css('color','red');
				    $("#consultar-btn").click(function(){

				    	var nombre = $("#nombre").val();
				    	var email = $("#email").val();
				    	var comentario = $("#comentario").val();
				    	


						if (nombre == "") {
							$("#nombre_error").show();
							$("#nombre").focus();
							return false;
						}else{
							$("#nombre_error").hide();
						}

				    	if (email == "") {
							$("#email_error").show();
							$("#email").focus();
							return false;
						}else{
							$("#email_error").hide();
						}

						if (comentario == "") {
							$("#comentario_error").show();
							$("#comentario").focus();
							return false;
						}else{
							$("#comentario_error").hide();
						}
					


				    	var dataString = 'email=' + email + '&nombre=' + nombre + '&comentario=' + comentario; 
				    $.ajax({
				      url:"consulta.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				        $("#formularioregistro").hide()
				        $("#respp").html(respuesta);
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

					<div class="modal fade" id="mostrarmodal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
				      <div class="modal-dialog">
				        <div class="modal-content">
				           <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				              <h3>Ofertas de la semana</h3>
				           </div>
				           <div class="modal-body">
				              <img class="img-responsive" src="imagen/0001.jpg">   
				       </div>
				      </div>
				   </div>
				</div>


		<div class='col-xs-12 col-sm-2'>
		</div>
			<div class='col-xs-12 col-sm-8'>
				<h3>Consulta</h3>
				<h4 id="respp">  </h4>
					<form class="form-horizontal" id="formularioregistro" method="post" enctype="multipart/form-data">
						<div class="form-group">
					        <label class="control-label col-xs-3">Nombre:</label>
					        <div class="col-xs-5">
					            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre" required="true">
					        </div>
					        <div class="col-xs-4">
					        	<label class="error" id="nombre_error">Debe introducir su nombre</label>
					        </div>
				        </div>
				        <div class="form-group">
					        <label class="control-label col-xs-3">Email:</label>
					        <div class="col-xs-5">
					            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="true">
					        </div>
					        <div class="col-xs-4">
					        	<label class="error" id="email_error">Debe introducir su e-mail</label>
					        </div>
				        </div>
				        <div class="form-group">
					        <label class="control-label col-xs-3">Comentario:</label>
					        <div class="col-xs-5">
					            <textarea  class="form-control" name="comentario" id="comentario" placeholder="Comentario o Consulta" required="true">
					            </textarea>
					        </div>
					        <div class="col-xs-4">
					        	<label class="error" id="comentario_error">Debe introducir su consulta</label>
					        </div>
				        </div>
				        <div class="form-group">
					        <label class="control-label col-xs-3"></label>
					        <div class="col-xs-5">
					            <input type="button" id="consultar-btn" class="btn btn-primary" value="Enviar" >
					            <input type="reset" class="btn btn-default" value="Limpiar">
					        </div>
					    </div>

					</form>
			</div>
			<div class='col-xs-12 col-sm-2'>
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