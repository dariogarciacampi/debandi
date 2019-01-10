<?php session_start();
?>
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
					
				  	$('.error').hide();
				  	$('.error').css('color','red');
				    $("#enviar-btn").click(function(){

				    	var email = $("#email").val();
				    	var pass = $("#pass").val();
				    	var empresa = $("#empresa").val();
				    	var nombre = $("#nombre").val();
				    	var apellido = $("#apellido").val();
				    	var local = $("#local").val();
				    	var direccion = $("#direccion").val();
				    	var telefono = $("#telefono").val();
				    	var pass2 = $("#pass2").val();
				    	var provincia = $("#prov").val();

				    	if (email == "") {
							$("#email_error").show();
							$("#email").focus();
							return false;
						}else{
							$("#email_error").hide();
						}
						if (pass == "") {
							$("#pass_error").show();
							$("#pass").focus();
							return false;
						}else{
							$("#pass_error").hide();
						}
						if (pass2 == "") {
							$("#pass2_error").show();
							$("#pass2").focus();
							return false;
						}else{
							$("#pass2_error").hide();
						}

						if (pass != pass2) {
							$("#pass3_error").show();
							$("#pass").focus();
							return false;
						}else{
							$("#pass3_error").hide();
						}

						if (empresa == "") {
							$("#empresa_error").show();
							$("#empresa").focus();
							return false;
						}else{
							$("#empresa_error").hide();
						}

						if (nombre == "") {
							$("#nombre_error").show();
							$("#nombre").focus();
							return false;
						}else{
							$("#nombre_error").hide();
						}
						if (apellido == "") {
							$("#apellido_error").show();
							$("#apellido").focus();
							return false;
						}else{
							$("#apellido_error").hide();
						}
						if (provincia == "0") {
							$("#provincia_error").show();
							$("#prov").focus();
							return false;
						}else{
							$("#provincia_error").hide();
						}
						if (local == "0") {
							$("#local_error").show();
							$("#local").focus();
							return false;
						}else{
							$("#local_error").hide();
						}
						if (direccion == "") {
							$("#direccion_error").show();
							$("#direccion").focus();
							return false;
						}else{
							$("#direccion_error").hide();
						}
						if (telefono == "") {
							$("#telefono_error").show();
							$("#telefono").focus();
							return false;
						} else{
							$("#telefono_error").hide();
						}


				    	var dataString = 'email=' + email + '&pass=' + pass + '&empresa=' + empresa + '&nombre=' + nombre + '&apellido=' + apellido + '&local=' + local + '&direccion=' + direccion + '&telefono=' + telefono;
				    $.ajax({
				      url:"nuevocli.php",
				      type: "POST",
				      data: dataString,
				      success: function(respuesta){
				        $("#formularioregistro").hide(3000)
				        $("#resp").html(respuesta);
				      }
				    });

				  });
				});

				</script>
				<script type="text/javascript">
				  $(document).ready(function(){
				  	$("#resp2").hide()
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

				



		<div class="col-xs-0 col-sm-0 col-md-2">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8">
				<form class="form-horizontal" id="formularioregistro" method="post" action="">
		    <div class="form-group">
		        <label class="control-label col-xs-3">Email:</label>
		        <div class="col-xs-5">
		            <input type="email" class="form-control" name="email" id="email" placeholder="Email" <?php echo 'value='.$email.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="email_error">Debe introducir su cuenta de E-mail</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Password:</label>
		        <div class="col-xs-5">
		            <input type="password" class="form-control" id="pass" placeholder="Password" <?php echo 'value='.$pass.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="pass_error">Debe introducir un Password</label>
		        	<label class="error" id="pass3_error">Deben coincidir los password introducidos</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Confirmar Password:</label>
		        <div class="col-xs-5">
		            <input type="password" class="form-control" id="pass2" placeholder="Confirmar Password" <?php echo 'value='.$pass2.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="pass2_error">Debe Repetir el Password</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Empresa:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="empresa" placeholder="Nombre de la Empresa" <?php echo 'value='.$empresa.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="empresa_error">Debe introducir el nombre de la Empresa</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Nombre:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="nombre" placeholder="Nombre" <?php echo 'value='.$nombre.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="nombre_error">Debe introducir su Nombre</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Apellido:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="apellido" placeholder="Apellido" <?php echo 'value='.$apellido.'' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="apellido_error">Debe introducir su Apellido</label>
		        </div>
		    </div>
		
		    <div class="form-group">
		        <label class="control-label col-xs-3">Provincia:</label>
		        <div class="col-xs-5">
		            <select type="post" class="form-control" name="prov" id="prov">
		            <?php
		            	include("conexion.php");
		            	$result = mysqli_query($conectado,"select CodiProv, NombProv from provincia");
		            	  $opciones = '<option value="0"> Seleccione una Provincia</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						     $opciones.='<option value="'.$fila["CodiProv"].'">'.$fila["NombProv"].'</option>';
						  }
						?>
						<?php echo $opciones; ?>
		            </select>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="provincia_error">Debe seleccionar una Provincia</label>
		        </div>
		    </div>


		    <script type="text/javascript">
			  $(document).ready(function(){
			    $("#prov").change(function(){
			    $.ajax({
			      url:"cargaprov.php",
			      type: "POST",
			      data:"idprov="+$("#prov").val(),
			      success: function(opciones){
			        $("#local").html(opciones);
			      }
			    })
			  });
			});
			</script>



		    <div class="form-group">
		        <label class="control-label col-xs-3">Localidad:</label>
		        <div class="col-xs-5">
		            <select class="form-control" name="local" id="local" placeholder="Seleccionar">
		            	<option value="">Selecione una Localidad</option>
		            </select>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="local_error">Debe seleccionar una Localidad</label>
		        </div>
		    </div>

		  

			<div class="form-group">
		        <label class="control-label col-xs-3">Dirección:</label>
		        <div class="col-xs-5">
		            <input type="dir" class="form-control" id="direccion" placeholder="Dirección"  <?php echo 'value='.$direccion.'' ?>>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="direccion_error">Debe introducir su direccion</label>
		        </div>
		    </div>
			
		    <div class="form-group">
		        <label class="control-label col-xs-3" >Telefono:</label>
		        <div class="col-xs-5">
		            <input type="tel" class="form-control" id="telefono" placeholder="Telefono"  <?php echo 'value='.$telefono.'' ?>>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="telefono_error">Debe introducir un telefono</label>
		        </div>
		    </div>

		   
		   
		    </br>
		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="button" id="enviar-btn" class="btn btn-primary" value="Registrar" >
		            <input type="reset" class="btn btn-default" value="Limpiar">
		        </div>
		    </div>
		
		</form>
		</div>
	</div>	
		
	<div id="resp" name="resp" >
		            
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