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
				        $("#resp").html(respuesta);
				        $("#formularioregistro").hide()
				      }
				    });

				  });
				});




				   $(document).ready(function(){
				  	$('.error').hide();
				  	$('.error').css('color','red');
				    $("#modificar-btn").click(function(){

				    	var email = $("#email").val();
				    	var pass = $("#pass").val();
				    	var empresa = $("#empresa").val();
				    	var nombre = $("#nombre").val();
				    	var apellido = $("#apellido").val();
				    	var direccion = $("#direccion").val();
				    	var telefono = $("#telefono").val();
				    	var pass2 = $("#pass2").val();
				    	var estado = $("#estado").val();

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


				    	var datasString = 'email=' + email + '&pass=' + pass + '&empresa=' + empresa + '&nombre=' + nombre + '&apellido=' + apellido + '&estado=' + estado + '&direccion=' + direccion + '&telefono=' + telefono;
				    $.ajax({
				      url:"modificli.php",
				      type: "POST",
				      data: datasString,
				      success: function(respuesta){
				        $("#resp2").html(respuesta);
				        $("#formularioregistro").hide()
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

	<?php 
	include("conexion.php");
	$id = $_GET["id"];
			if (!$id) {
			    $email = "";
			    $pass = "";
			    $pass2 = "";
			    $empresa = "";
			    $nombre = "";
			    $apellido = "";
			    $provincia = "";
			    $local = "";
				$direccion = "";
				$telefono= "";
				$estado = "";
			    $fecha= "";
			}
			else{
				
			    $producto =  mysqli_query($conectado,"SELECT MailUsua, PassUsua, EmprUsua, NombUsua, ApelUsua, TeleUsua, DireUsua, EstaUsua, FecAUsua, CodiLoca FROM usuario WHERE CodiUsua = '".$id."'");
			    $prod = mysqli_fetch_array($producto);

			    $email = $prod["MailUsua"];
			    $pass = $prod["PassUsua"];
			    $pass2 = $prod["PassUsua"];
			    $empresa = $prod["EmprUsua"];
			    $nombre = $prod["NombUsua"];
			    $apellido = $prod["ApelUsua"];
			    
			    $local = $prod["CodiLoca"]; 
			    $direccion = $prod["DireUsua"];
			    $telefono= $prod["TeleUsua"];
			    $estado = $prod["EstaUsua"];
			    $fecha= $prod["FecAUsua"];
			}
	?>



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
		        <?php if ($_SESSION['tipo'] <> "Administrador"){ ?>
		            <input type="password" class="form-control" id="pass" placeholder="Password" <?php echo 'value="'.$pass.'"' ?> >
		            <?php } else { ?>
		            <input type="email" class="form-control" id="pass" placeholder="Password" <?php echo 'value="'.$pass.'"' ?> >
		            <?php } ?>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="pass_error">Debe introducir un Password</label>
		        	<label class="error" id="pass3_error">Deben coincidir los password introducidos</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Confirmar Password:</label>
		        <div class="col-xs-5">
		        <?php if ($_SESSION['tipo'] <> "Administrador"){ ?>
		            <input type="password" class="form-control" id="pass2" placeholder="Confirmar Password" <?php echo 'value="'.$pass2.'"' ?> >
		            <?php } else { ?>
		            <input type="email" class="form-control" id="pass2" placeholder="Confirmar Password" <?php echo 'value="'.$pass2.'"' ?> >
		            <?php } ?>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="pass2_error">Debe Repetir el Password</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Empresa:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="empresa" placeholder="Nombre de la Empresa" <?php echo 'value="'.$empresa.'"' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="empresa_error">Debe introducir el nombre de la Empresa</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Nombre:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="nombre" placeholder="Nombre" <?php echo 'value="'.$nombre.'"' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="nombre_error">Debe introducir su Nombre</label>
		        </div>
		    </div>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Apellido:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" id="apellido" placeholder="Apellido" <?php echo 'value="'.$apellido.'"' ?> >
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="apellido_error">Debe introducir su Apellido</label>
		        </div>
		    </div>
			<?php if (!$id) { ?>
		    <div class="form-group">
		        <label class="control-label col-xs-3">Provincia:</label>
		        <div class="col-xs-5">
		            <select type="post" class="form-control" name="prov" id="prov">
		            <?php
		            	include("conexion.php");
		            	$result = mysqli_query($conectado,"select CodiProv, NombProv from provincia");
		            	  $opciones = '<option value="0"> Seleccione una Provincia</option>';
						  while($fila = mysqli_fetch_array($result))
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

		    <?php } else{ 
		    	$ciudad =  mysqli_query($conectado,"SELECT NombLoca, CodiProv FROM localidad WHERE CodiLoca = '".$local."'");
			    $ciud = mysqli_fetch_array($ciudad);
			    $ciudady = $ciud["CodiProv"];
			    $provincia =  mysqli_query($conectado,"SELECT NombProv FROM provincia WHERE CodiProv = '".$ciudady."'");
			    $provi = mysqli_fetch_array($provincia);
			    $ciudadx = $ciud["NombLoca"];
			    $provinciax = $provi["NombProv"];
		    	?>

		    		<div class="form-group">
			        <label class="control-label col-xs-3">Provincia:</label>
			        <div class="col-xs-5">
			            <input type="dir" class="form-control"  disabled="true" <?php echo 'value="'.$provinciax.'"' ?>>
			        </div>
			    	</div>

			    	<div class="form-group">
			        <label class="control-label col-xs-3">Localidad:</label>
			        <div class="col-xs-5">
			            <input type="dir" class="form-control" disabled="true"  <?php echo 'value="'.$ciudadx.'"' ?>>
			        </div>
			    	</div>
					
					
			    

		    <?php } ?>	

			<div class="form-group">
		        <label class="control-label col-xs-3">Dirección:</label>
		        <div class="col-xs-5">
		            <input type="dir" class="form-control" id="direccion" placeholder="Dirección"  <?php echo 'value="'.$direccion.'"' ?>>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="direccion_error">Debe introducir su direccion</label>
		        </div>
		    </div>
			
		    <div class="form-group">
		        <label class="control-label col-xs-3" >Telefono:</label>
		        <div class="col-xs-5">
		            <input type="tel" class="form-control" id="telefono" placeholder="Telefono"  <?php echo 'value="'.$telefono.'"' ?>>
		        </div>
		        <div class="col-xs-4">
		        	<label class="error" id="telefono_error">Debe introducir un telefono</label>
		        </div>
		    </div>

		   
		    <?php if (!$id) { ?>
		    </br>
		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="button" id="enviar-btn" class="btn btn-primary" value="Registrar" >
		            <input type="reset" class="btn btn-default" value="Limpiar">
		        </div>
		    </div>
		    <?php }else
		    {?>
		    <div class="form-group">
		    <label class="control-label col-xs-3">Estado:</label>
		        <div class="col-xs-5">
		            <select class="form-control" name="estado" id="estado" placeholder="Seleccionar">
		            	<option <?php 'value='.$estado.'' ?> ><?php echo $estado ?></option>
		            	<option value="Solicitado">Solicitado</option>
		            	<option value="Activo">Activo</option>
		            	<option value="No Activo">No Activo</option>
		            	<option value="Administrador">Administrador</option>
		            </select>
		        </div>
		        </div>

		     </br>
		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="button" id="modificar-btn" class="btn btn-primary" value="Guardar" >
		            <input type="reset" class="btn btn-default" value="Limpiar">
		        </div>
		    </div>
		    	
		    <?php } ?>
		</form>
		</div>
		<h4 id="resp2" name="resp2" >
		            
		    </h4>
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