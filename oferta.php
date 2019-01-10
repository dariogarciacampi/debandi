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
				  	

				  	function ok(){
				alertify.success("Articulo agregado al carrito"); 
				return false;
				}	
					function error(){
				        //una notificación de error
				      alertify.error("Debe ingresar un número"); 
				      return false; 
				}


							$('.muestra').click(function(e) {

							var cantidad = prompt ("Ingrese la cantidad a pedir", "1");
							if (cantidad === null) {
						    return false;
							}
							else if (isNaN(parseInt(cantidad))) {
								error();
								return false;
							} else {
							          e.preventDefault();
							          //recogemos la dirección del Proceso PHP
							          href = $(this).attr('href');
							          //alert(href);
							          href = href + '&cantidad=' + cantidad ;


									$.ajax({
										 url: href,
										success: ok(),
									});

								}
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

		
		
			


		<div class="col-xs-12">
		<div class="datos" id="articulos">
			<table class="table table-striped">
			  <thead>
			    <tr>
			    <?php if (!isset($_SESSION["user"])){ ?>
			    <?php } else { ?>
			    <th>+</th>
			    <?php } ?>
			      <th>Codigo</th>
			      <th>Producto</th>
			      <th>Categoria</th>
			      <?php if (!isset($_SESSION["user"])){ ?>
			<h4>Debes estar registrado para ver los precios.</h4>
			<?php } else { ?>
			      <th>Precio</th>
			      <?php } ?>
			      <th>Imagen</th>
			    </tr>
			  </thead>
			  <tbody>
			  <?php
			include("conexion.php");
			//Limito la busqueda
			$TAMANO_PAGINA = 50;

			//examino la página a mostrar y el inicio del registro a mostrar
			$pagina = $_GET["pagina"];
			if (!$pagina) {
			    $inicio = 0;
			    $pagina=1;
			}
			else {
			    $inicio = ($pagina - 1) * $TAMANO_PAGINA;
			}

			$txt_criterio = $_GET["criterio"];

			if (isset($_POST['criterio'])) {
				$txt_criterio = $_POST['criterio'];
			}

			if (isset($_REQUEST['categoria'])){
				$cat = $_REQUEST["categoria"];
				$rs =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE producto.CodiCate = '12'");

				$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE producto.CodiCate = '12' LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			} else {

			$rs =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE producto.CodiCate = '12'");

				$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE  producto.CodiCate = '12' LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			}
			/*

			if (isset($_POST['buscar'])) {
				$rs =  mysqli_query("SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE NombProd LIKE '%".$_POST['buscar']."%' ",$conectado);

				$producto =  mysqli_query("SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE NombProd LIKE '%".$_POST['buscar']."%' LIMIT ".$inicio. ",".$TAMANO_PAGINA."",$conectado);

				$valor = 1 ;
			}else{

			$rs = mysqli_query("SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate ",$conectado);


			$producto =  mysqli_query("SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate LIMIT ".$inicio. ",".$TAMANO_PAGINA."",$conectado);

			$valor = 0 ;
			}
			
			*/

			$num_total_registros = mysqli_num_rows($rs);
			//calculo el total de páginas
			$total_paginas = ceil($num_total_registros / $TAMANO_PAGINA); 

			 while( $prod = mysqli_fetch_array($producto) ) {
    			?>
    			<tr>
    			<?php if (!isset($_SESSION["user"])){ ?>
			<?php } else { 
				$id = $prod["CoddProd"] ;
				//agregarcarrito.php?id=" . $id . "
			 ?>
    			<td style="vertical-align: middle;"><?php echo "<a class='muestra' href='agregarcarrito.php?id=" . $id . "'><img src='imagen/carrito.png'  height='20' width='20'></a>"; ?></td>
    			<?php } ?>
      			<td><?php echo $prod["CoddProd"] ; ?></td>
      			<td><?php echo $prod["NombProd"] ; ?></td>
      			<td><?php echo $prod["NombCate"] ; ?></td>
      			<?php if (!isset($_SESSION["user"])){ ?>
			<?php } else { ?>
      			<td>$ <?php echo $prod["PrecProd"] ; ?></td>
      			<?php }
      			 $imagen = $prod["ImagProd"]; ?>
      			<td><?php echo "<img src='".$imagen."' border='0' width='100px' height='100px'>"; ?></td>
      			</tr>			
		        <?php }
				?>
			  </tbody>
			</table>

			</div>
		<div class="col-xs-4">
		</div>
		<div class="col-xs-4">
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		<?php
		if (isset($_REQUEST['categoria'])){
		if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='oferta.php?pagina=" . $i . " &categoria=".$cat."'>" . $i . "</a></li> ";
		    }
		} } else {
				if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='oferta.php?pagina=" . $i . " &criterio=".$txt_criterio."'>" . $i . "</a></li> ";
		    }
		}

			} ?>

		</ul>
		</nav>
		</div>
		<div class="col-xs-4">
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