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


					$('.delete').click(function(e) {
							var option = confirm('¿Desea eliminar el registro?');
							if (!option) {
								return false;
							} else {
							          e.preventDefault();
							          //recogemos la dirección del Proceso PHP
							          href = $(this).attr('href');

									$.ajax({
										 url: href,
										 success:function(respuesta){
										 	if (respuesta == 1) {
										 		location.reload();
										 	}
										 }
									});
									
								}
								
					          });

					$("#btn-modificar").click(function(){
						var codigomodi = $("#codigomodi").val();
				    	var ordenmodi = $("#ordenmodi").val();
				    	var estadomodi = $("#estadomodi").val();
				    	

				    	if (ordenmodi == "") {
							$("#ordenmodi").focus();
							return false;
						}
						

				    	var dataString = 'ordenmodi=' + ordenmodi + '&estadomodi=' + estadomodi + '&codigomodi=' + codigomodi;
				    $.ajax({
				      url:"modificarslider.php",
				      type: "POST",
				      data: dataString,
				     success: function(respuesta){
				      	 if (respuesta == 1) {
				        	window.location.assign("lislider.php");
				        }
				        
				      }
				    });

				  });

					$("#btn-nuevo").click(function(){
				    	var orden = $("#orden").val();
				    	var estado = $("#estado").val();

				    	if (orden == "") {
							$("#orden").focus();
							return false;
						}
						var formData = new FormData();
						formData.append('imag', $('#imag')[0].files[0]);
						formData.append('orden', orden);
						formData.append('estado', estado);
					
				    	
				    $.ajax({
				      url:"nuevoslider.php",
				      type: "POST",
				      data: formData,
				      processData: false,  // tell jQuery not to process the data
       				  contentType: false,
				     success: function(respuesta){
				      	 if (respuesta == 1) {
				        	window.location.assign("lislider.php");
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
				        	location.reload();
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


		<div class="col-md-12">

		<div id="listaslider">
		<?php 	include("slider.php");
				$slider = new slider;
				$lista = $slider->mostrarSlider(); 

				if (isset($_GET['id'])){
					$codigo = $_GET["id"];
					$result = $slider->buscarSlider($codigo);
					$row = mysqli_fetch_array($result);
					$imagen = $row["ImagSlid"];
					$orden = $row["OrdeSlid"];
					$estado = $row["EstaSlid"];
				}
					?>
					<?php if (!isset($_SESSION["user"])){ ?>
			<h4>Debes ser Administrador para operar en esta seccion.</h4>
			<?php } else {?>
									<table class="table table-striped">
								  <thead>

								  	<tr>
								      <th>Codigo</th>
								      <th>Nombre Imagen</th>
								      <th>Orden</th>
								      <th>Estado</th>
								      <th>Acción</th>
								    </tr>

								  	  <tr>

								      <th><input type="text" class="form-control" name="codigo" id="codigo" disabled="true"></th>
								      <th><input type="file" class="file" name="imag" id="imag"></th>
								      <th><input type="text" class="form-control" name="orden" id="orden" placeholder="Orden. Ej:3"></th>
								      <th><select type="post" class="form-control" name="estado" id="estado">
							            	<option value="Activo">Activo</option>
							            	<option value="No Activo">No Activo</option>
							            </select></th>
							            <th><button class="btn btn-block btn-primary" id="btn-nuevo">Nuevo</button></th>
								    </tr>
								   	<tr>
								      <th><input type="text" class="form-control" name="codigomodi" id="codigomodi" disabled="true" <?php echo 'value='.$codigo.'' ?>></th>
								      <th><input type="text" class="form-control" name="img" id="img" disabled="true" <?php echo 'value='.$imagen.'' ?> ></th>
								      <th><input type="text" class="form-control" name="ordenmodi" id="ordenmodi" <?php echo 'value='.$orden.'' ?>></th>
								      <th><select type="post" class="form-control" name="estadomodi" id="estadomodi">
								      		<option <?php 'value='.$estado.'' ?> ><?php echo $estado ?></option>
							            	<option value="Activo">Activo</option>
							            	<option value="No Activo">No Activo</option>
							            </select></th>
							            <th><button class="btn btn-block btn-danger" id="btn-modificar">Modificar</button></th>
								    </tr>
								  </thead>
								  <tbody>
								  <?php
									while( $row = mysqli_fetch_array($lista) ) {
									$id =  $row["CodiSlid"] ;?>
					    			<tr>
					      			<td><?php echo $id ; ?></td>
					      			<td><?php echo $row["ImagSlid"] ; ?></td>
					      			<td><?php echo $row["OrdeSlid"] ; ?></td>
					      			<td><?php echo $row["EstaSlid"] ; ?></td>
					      			<td><?php echo "<a title='Modificar' href='lislider.php?id=" . $id . "'><img src='imagen/modificar.png' border='0' width='20' class='img-responsive'></a>"; ?></td>
					      			<td><?php echo "<a class='delete' title='Eliminar' href='deleteslider.php?id=" . $id . "'><img src='imagen/eliminar.png' border='0' width='20' class='img-responsive'></a>"; ?></td>
					      			</tr>			
							        <?php } ?>
							        </tbody>
								</table>
								<?php } ?>
				
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