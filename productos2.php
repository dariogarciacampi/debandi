<?php session_start();?>
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
	<script type="text/javascript" src="lib/alertify.js"></script>
	<link rel="stylesheet" href="themes/alertify.core.css" />
	<link rel="stylesheet" href="themes/alertify.default.css" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">


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
							<li><a href="carrito.php"><img src="imagen/carrito.png" height="25" width="25" />  Carrito de Compras</a></li>
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
		  <li class="active"><a href="productos.php"><span class="glyphicon glyphicon-chevron-right"></span> Todos</a></li>
		  <?php

							include("conexion.php"); 
							$gen =  mysqli_query($conectado,"SELECT * FROM categoria ORDER BY NombCate ASC");
    		 				while( $tipo = mysqli_fetch_array($gen) ) {
			
								echo "<li><a href='productos.php?categoria=".$tipo['CodiCate']."'><span class='glyphicon glyphicon-chevron-right'></span>".$tipo['NombCate']."</a></li>" ;
								} ?>

		</ul>
		</div>
		<div class="col-md-10">
			<div class="col-xs-12">
				<form class="form-horizontal" id="formbuscador" method="post" action="productos.php">
		    
		    <div class="form-group">
		    <div class="col-xs-4 col-sm-3  col-md-2  col-lg-1">
		        <label class="control-label">Buscar:</label>
		        </div>
		        <div class="col-xs-5 col-sm-6  col-md-6  col-lg-7">
		            <input type="text" class="form-control" name="criterio" id="criterio" placeholder="Buscar">
		        </div>
		        <div class="col-xs-3 col-sm-3  col-md-4  col-lg-4">
		            <input type="submit" id="enviar-btn" class="btn btn-primary" value="Buscar" >
		        </div>
		    </div>
		</form>
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
				$rs =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE producto.CodiCate = ".$cat."");

				$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE producto.CodiCate = ".$cat." LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
			} else {

			$rs =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE NombProd LIKE '%".$txt_criterio."%' OR  CoddProd LIKE '%".$txt_criterio."%'");

				$producto =  mysqli_query($conectado,"SELECT CoddProd, NombProd, NombCate, PrecProd, EstaProd, FechProd, ImagProd FROM producto INNER JOIN categoria ON categoria.CodiCate = producto.CodiCate WHERE NombProd LIKE '%".$txt_criterio."%' OR  CoddProd LIKE '%".$txt_criterio."%' LIMIT ".$inicio. ",".$TAMANO_PAGINA."");
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
		          echo "<li class='page-item'><a class='page-link' href='productos.php?pagina=" . $i . " &categoria=".$cat."'>" . $i . "</a></li> ";
		    }
		} } else {
				if ($total_paginas > 1){
		    for ($i=1;$i<=$total_paginas;$i++){
		       if ($pagina == $i)
		          //si muestro el índice de la página actual, no coloco enlace
		          echo "<li class='page-item disabled'><a class='page-link'>" . $pagina . "</a></li> ";
		       else
		          //si el índice no corresponde con la página mostrada actualmente, coloco el enlace para ir a esa página
		          echo "<li class='page-item'><a class='page-link' href='productos.php?pagina=" . $i . " &criterio=".$txt_criterio."'>" . $i . "</a></li> ";
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