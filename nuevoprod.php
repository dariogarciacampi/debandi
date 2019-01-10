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
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
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

				  	/*
				  	$('.error').hide();
				  	$('.error').css('color','red');
				    $("#enviar-btn").click(function(){

				    	

				    	var codigo = $("#codigo").val();
				    	var categoria = $("#categoria").val();
				    	var nombre = $("#nombre").val();
				    	var precio = $("#precio").val();
				    	
				    	/*
				    	var imagen = $("#imagen").val();
				         //obtenemos un array con los datos del archivo
				        var file = $("#imagen")[0].files[0];
				        //obtenemos el nombre del archivo
				        var fileName = file.name;
				      
				        
				    	

						if (codigo == "") {
							$("#codigo_error").show();
							$("#codigo").focus();
							return false;
						}else{
							$("#codigo_error").hide();
						}

						if (categoria == "0") {
							$("#categoria_error").show();
							$("#categoria").focus();
							return false;
						}else{
							$("#provincia_error").hide();
						}
						
						if (nombre == "") {
							$("#nombre_error").show();
							$("#nombre").focus();
							return false;
						}else{
							$("#nombre_error").hide();
						}
						if (precio == "") {
							$("#precio_error").show();
							$("#telefono").focus();
							return false;
						} else{
							$("#precio_error").hide();
						}

					

				    	var dataString = 'codigo=' + codigo + '&categoria=' + categoria + '&nombre=' + nombre + '&precio=' + precio;
				    	
				    $.ajax({
				      url:"cargaprod.php",
				      type: "POST",
				      data: $("#formularioregistro"),
				      success: function(respuesta){
				        $("#resp").html(respuesta);
				      }
				    });

				  });*/
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
			    $codigo = "";
			    $nombre = "";
			    $categ = "0";
			    $ncateg = "Seleccione un Categoria";
			    $precio = "";
			    $estado = "";
			    $foto = "";
			    $aux = "0";
			}
			else{
				
			    $producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, producto.CodiCate, PrecProd, EstaProd,ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE CoddProd = '".$id."'");
			    $prod = mysqli_fetch_array($producto);

			    $codigo = $prod["CoddProd"];
			    $nombre = $prod["NombProd"];
			    $categ = $prod["CodiCate"];
			    $ncateg = $prod["NombCate"];
			    $precio = $prod["PrecProd"];
			    $estado = $prod["EstaProd"];
			    $foto = $prod["ImagProd"];
			    $aux = "1" ;
			}
	?>
	

	<div class="container">

	<?php if (!isset($_SESSION["user"])){ ?>
			<h4>Debes estar registrado para visualizar esta sección.</h4>
			<?php } else { ?>
		<div class="col-xs-0 col-sm-0 col-md-2">
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8">
		<?php if ($aux == 0) { ?>
			
				<form class="form-horizontal" id="formularioregistro" method="post" action="cargaprod.php" enctype="multipart/form-data">


				<?php } else {

		?>
				<form class="form-horizontal" id="formularioregistro" method="post" action="modifprod.php" enctype="multipart/form-data"> <?php } ?>
		    
		    <div class="form-group">
		        <label class="control-label col-xs-3">Codigo:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" name="codigo" id="codigo" placeholder="Codigo de Producto" required="true" <?php echo 'value="'.$codigo.'"' ?> >
		        </div>
		        
		    </div>
		    
		    <div class="form-group">
		        <label class="control-label col-xs-3">Categoria:</label>
		        <div class="col-xs-5">
		            <select type="post" class="form-control" name="categoria" id="categoria" required="true">
		            <?php

		            	include("conexion.php");
		            	$result = mysqli_query($conectado,"select CodiCate, NombCate from categoria");
		            	  $opciones = '<option value="'.$categ.'">'.$ncateg.'</option>';
						  while( $fila = mysqli_fetch_array($result) )
						  {
						     $opciones.='<option value="'.$fila["CodiCate"].'">'.$fila["NombCate"].'</option>';
						  }
						?>
						<?php echo $opciones; ?>
		            </select>
		        </div>
		        
		    </div>

			<div class="form-group">
		        <label class="control-label col-xs-3">Producto:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre de producto" required="true" <?php echo 'value="'.$nombre.'"' ?> >
		        </div>
		        
		    </div>
			
		    <div class="form-group">
		        <label class="control-label col-xs-3" >Precio:</label>
		        <div class="col-xs-5">
		            <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio" required="true" <?php echo 'value='.$precio.'' ?> >
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3">Estado:</label>
		        <div class="col-xs-5">
		            <select type="post" class="form-control" name="estado" id="estado" required="true">
		            	<option value="Activo">Activo</option>
		            	<option value="No Activo">No Activo</option>
		            </select>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="control-label col-xs-3">Imagen:</label>
		        <div class="col-xs-5">
		            <input type="file" class="file" name="archivo" id="imagen" value=" <?php echo $foto ?>">
		            <br>
		            <img id="imgSalida" width="50%" height="50%" src=""/>
		        </div>
		    </div>
			<script type="text/javascript">
				$(window).load(function(){

					 $(function() {
					  $('#imagen').change(function(e) {
					      addImage(e); 
					     });

					     function addImage(e){
					      var file = e.target.files[0],
					      imageType = /image.*/;
					    
					      if (!file.type.match(imageType))
					       return;
					  
					      var reader = new FileReader();
					      reader.onload = fileOnload;
					      reader.readAsDataURL(file);
					     }
					  
					     function fileOnload(e) {
					      var result=e.target.result;
					      $('#imgSalida').attr("src",result);
					     }
					    });
					  });

			</script>
				
		    </br>
		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="submit" id="enviar-btn" class="btn btn-primary" value="Guardar" >
		            <input type="reset" class="btn btn-default" value="Limpiar">
		        </div>
		    </div>


		    	

		</form>
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
</html>