<?php

echo "En esta pagina se mostrara el detalle de la aplicacion: " . $_GET["codigo_aplicacion"];
include_once("class/class_conexion.php");
			$conexion = new Conexion();
			$imagenes= $conexion->ejecutarInstruccion(
					'SELECT 	tbl_imagenes.url_imagen, 
								tbl_imagenes.codigo_aplicacion
					FROM tbl_imagenes '
			);
			$resultado = $conexion->ejecutarInstruccion(
					'SELECT 	a.codigo_aplicacion, a.codigo_desarrollador, 
								a.nombre_aplicacion,a.descripcion, 
								a.fecha_publicacion, a.fecha_actualizacion, 
								a.version, a.url, a.url_icono, a.calificacion, b.usuario
					FROM tbl_aplicaciones a
					INNER JOIN tbl_usuarios b
					ON (a.codigo_desarrollador = b.codigo_usuario)'
			);
			$comen = $conexion->ejecutarInstruccion(
					'SELECT 	a.codigo_comentario,a.codigo_aplicacion,
				a.comentario,b.nombre,b.apellido
					FROM tbl_comentarios a
					INNER JOIN tbl_usuarios b
					ON (a.codigo_comentario = b.codigo_tipo_usuario)'	
			);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title></title>
</head>
<body>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/personalizado.css" rel="stylesheet">
 <div class="container">

        <div class="row">
            <div class="box">
                <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
					<div id="carousel-example-generic" class="carousel slide " data-ride="carousel" style="width: 500px">
	  <!-- Indicators -->
					  <ol class="carousel-indicators hidden-xs">
					    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
					    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
					  </ol>

	  <!-- Wrapper for slides -->
	   			<div class="carousel-inner" role="listbox">
	  <?php
	  $item=0;
	  while($fila2 = $conexion->obtenerFila($imagenes)){
	  		if($_GET['codigo_aplicacion']==$fila2['codigo_aplicacion']){
	  	
					
						   if($item==0){ 
						    	$item++; 
							echo   "<div class='item active'>";
						    }else if($item==1){
	
						  	echo  "<div class='item'>";
						    	}
						    ?>

						      <img class="img-responsive" src=<?php echo $fila2['url_imagen']; ?>>
							      <div class="carousel-caption">
						    
							      </div>
						    </div>

					
					  <?php
					}
				}
?>
  </div>

					  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					    <span class="sr-only">Previous</span>
					  </a>
					  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					    <span class="sr-only">Next</span>
					  </a>

				</div>
 				
			</div>
			<?php
		

			
			while ($fila = $conexion->obtenerFila($resultado)){
				if($_GET['codigo_aplicacion']==$fila['codigo_aplicacion']){
				?>
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" style="width: 160px">
					<div class="well">
						<a><img src=<?php echo "'".$fila["url_icono"]."'"; ?> class="img-responsive">
						<b><?php echo $fila["nombre_aplicacion"]; ?></b><br></a>

						
					</div>
					<div style="width: 150px">
						<span class="label label-primary"><?php echo $fila["calificacion"]; ?></span>
						<?php 
							for ($j=0;$j<$fila["calificacion"];$j++)
								echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						?>
						<br>
						<?php echo $fila["descripcion"]; ?><br>
						Versión: <b><?php echo $fila["version"]; ?></b><br>
						<a href=<?php echo $fila["url"]; ?>>Descargar</a><br>
					</div>
				</div>
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4" style="width: 150px">
					
					<h3> COMENTARIOS</h3>
					<?php
						$a=1;
						while ($fila1 = $conexion->obtenerFila($comen)){
							
						
							if($_GET['codigo_aplicacion']==$fila1['codigo_aplicacion']){
								echo '<div class="well">';
								echo '<span class="label label-primary">'.$a++.'</span>';
								echo '<span class="label label-warning">'.$fila1['nombre']." ".$fila1['apellido'].'</span><br><br>';
						
							
							echo $fila1["comentario"];
							echo '</div>';
					}
				}

						
					?>

					
				</div>

				
				<?php

			}
		}
		
			$conexion->liberarResultado($resultado);
			$conexion->liberarResultado($imagenes);
			$conexion->liberarResultado($comen);
			$conexion->cerrarConexion();
	?>
		</div>

	</div>

</div>
 <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Descripcion
                        <strong>Para la aplicacion</strong>
                    </h2>
                    <hr>
                    <img class="img-responsive img-border img-left" src="img/intro-pic.jpg" alt="">
                    <hr class="visible-xs">
                    <p>Aqui podemos poner cualquier texto necesario</p>
                </div>
            </div>
        </div>

	<script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/controlador.js"></script>
</body>
</html>