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
  .affix {
      top: 0;
      width: 100%;
      z-index: 9999 !important;
  }

  .affix + .container-fluid {
      padding-top: 70px;
  }
</style>

			
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
    				<form method="post" id="formsesioncerrar" >
	    				<div class="col-xs-9 col-sm-5 col-md-4 col-lg-3 session">
	    					<h4>Bienvenido <?php echo $_SESSION["empresa"] ;?></h4>
		      			</div>
						<div class="col-xs-2">
		      				<input type="button" id="cerrar-btn" value="Cerrar Session" class="btn btn-default">
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

			<nav class="navbar navbar-default navbar-inverse" data-spy="affix" data-offset-top="240">
			<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1">
						<span class="sr-only">Menu</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
			<div class="container">	
					<div class="collapse navbar-collapse navbar-inverse mynavbar " id="navbar-1">
						<ul class="nav navbar-nav">
							<li><a href="index.php">Inicio</a></li>
							<li><a href="productos.php">Productos</a></li>
							<li><a href="oferta.php"><img src="imagen/ofertas.png" height="40" width="100" /></a></li>
							<li><a href="catalogo.php">Catálogo Digital</a></li>
							<?php if ($_SESSION['tipo'] <> "Administrador"){ ?>
							<li><a href="registro.php">Registrese</a></li>
							<li><a href="contacto.php">Contacto</a></li>
							<li><a href="carrito.php"><img src="imagen/carrito.png" height="35" width="35" /></a></li>
							<li><a href="https://www.facebook.com/debandidistribuciones.debandisrl/" target="_blank"><img src="imagen/face.png" height="30" width="30" /></a></li>
							<?php } else { ?>
							<li><a href="cpanel.php">Panel de Control</a></li>
							<li><a href="carrito.php"><img src="imagen/carrito.png" height="35" width="35" /></a></li>
							<li><a href="https://www.facebook.com/debandisrl/?ref=br_rs" target="_blank"><img src="imagen/face.png" height="30" width="30" /></a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
			</nav>