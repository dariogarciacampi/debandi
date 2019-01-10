<?php $sql = "SELECT * FROM slider WHERE EstaSlid = 'Activo' ORDER BY OrdeSlid ASC";
			$consulta = mysqli_query($conectado,$sql);
			$cant = mysqli_num_rows($consulta); ?>
			
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
	  <!-- Indicators -->
			  <ol class="carousel-indicators">
			  	<?php for ($i = 0; $i < $cant; $i++) {
			  		if ($i==0) {
			  		echo "<li data-target='#myCarousel' data-slide-to='".$i."' class='active'></li>";
			  		} else {
			  		echo "<li data-target='#myCarousel' data-slide-to='".$i."'></li>";
			  	}} ?>  
			  </ol>

			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			  	<?php
			  	$x=0;
			  	 while ($sl = mysqli_fetch_array($consulta)){
			  		$imagen = $sl["ImagSlid"];
			  		if ($x==0) {
			  			echo "<div class='item active'><img src='".$imagen."' alt='Chania' class='img-responsive'></div>";
			  			$x=$x+1;
			  		} else {
			  		echo "<div class='item'><img src='".$imagen."' alt='Chania' class='img-responsive'></div>";
				}} ?>
				</div>
			  
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
			    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			    <span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
			    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			    <span class="sr-only">Next</span>
			  </a>
			</div>