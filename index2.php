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
				      url:"cerrarse2.php",
				      type: "POST",
				      success: function(respuesta){
				      	
				        if (respuesta == 1) {
				        	$("#mostrarmodal").modal("show");
				        }
				      }
				    });

				  });

				  	$("#resp").hide();
				  	$(".session").css('color','white');
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
	              <img class="img-responsive" src="imagen/0001.jpg">   
	       </div>
	      </div>
	   </div>
	</div>
</div>
		
		
		<?php include("conexion.php"); ?>

		<div class="col-xs-12">
			<?php include("carrusel.php"); ?>
		</div>

	
	
	<div class="container" style="margin-top: 400px;">
		<div class="col-xs-hidden col-sm-12 col-md-5">
				<a href="catalogo.php" title="Catálogo Digital"><img src="imagen/catalogo.jpg" class="img-responsive" ></a>
		</div> 
		<div class="col-xs-hidden col-sm-12 col-md-2"></div>
		<div class="col-xs-hidden col-sm-12 col-md-5">
		<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13363.747001338097!2d-64.3529549!3d-33.1370262!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xe1afc536048e13dd!2sDebandi+Distribuciones!5e0!3m2!1ses!2sar!4v1539959089926" width="440" height="330" frameborder="0" style="border:0" allowfullscreen></iframe>
		</div>
	</div>
	<div class="container-fluid" style="padding-top: 20px;">
		<div class="col-xs-12">
				<marquee bgcolor="#F5F5F5" width="100%" scrolldelay="100" scrollamount="5" direction="left" loop="infinite">
				
			
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i1.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i2.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i3.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i4.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i5.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i6.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i7.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i8.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i9.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i10.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i11.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i12.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i13.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i132.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i14.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i15.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      				
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i17.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i18.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i19.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i22.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 
      			 	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i25.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i26.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i133.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i28.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i30.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      				
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i32.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i33.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i35.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i36.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i37.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i38.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
      			 
		        <div style="text-align: center; position: relative; display: inline-block;" >
    			 	<div class="containermarq"><img src="tiras/i135.jpg" border="0" class="img-rounded img-responsive crop"></div>
      			 </div>	
		       
			</marquee>
			
		</div>
		
			<div class="col-xs-12">
				<h2><center><b><u>MAYORISTA FERRETERO</u></b></center></h2>
				<div class="col-xs-0 col-sm-0 col-md-0 col-lg-3"></div>
				<div class="col-xs-0 col-sm-0 col-md-0 col-lg-6">
					<img src="imagen/pedido.png" class="img-responsive">
				</div>
				<div class="col-xs-0 col-sm-0 col-md-0 col-lg-3"></div>
				</div>
				<div class="col-xs-12">
				<div class="col-xs-0 col-sm-0 col-md-0 col-lg-2"></div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-8" style="margin-top: 15px;">
				<p>
					<b>Debandi Distribuciones Mayorista Ferretero</b>, es una empresa familiar, ubicada en la Ciudad de Río Cuarto. Nace en el año 1998,  dedicada a la venta mayorista de insumos destinados a CORRALONES y FERRETERIAS como así también  algunos productos para el hogar,  lo que nos ha permitido llegar y satisfacer las necesidades de todos nuestros CLIENTES.</p>
					<p>
					Nuestra ferreteria mayorista cuenta con una cobertura territorial extensa, visitando 5 provincias con mas de 1250 clientes activos, lo que sumado a un intenso trabajo de venta y a la entrega y distribución en cada una de las zonas que visitamos, nos ha permitido permanecer en el tiempo, consolidándonos como una empresa con un crecimiento sostenido desde nuestros comienzos.
				</p>
				</div>
				<div class="col-xs-0 col-sm-0 col-md-0 col-lg-2"></div>
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