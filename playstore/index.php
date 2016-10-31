<?php
include_once("class/class_aplicaciones.php");
include_once("class/class_desarrollador.php");
include_once("class/class_icono.php");
include_once("class/class_librosDigitales.php");
include_once("class/class_comentario.php");
include_once("class/class_peliculas.php");
include_once("class/class_persona.php");
include_once("class/class_producto.php");
include_once("class/class_usuario.php");


$comentarios[] = new Comentario("desc1",
					new Usuario("Raul1",
					"email1"),
					"12/12/12");
$comentarios[] = new Comentario("desc2",
					new Usuario("Raul2",
					"email2"),
					"12/12/12");
$comentarios[] = new Comentario("desc3",
					new Usuario("Raul13",
					"email3"),
					"12/12/12");
$comentarios[] = new Comentario("desc4",
					new Usuario("Raul4",
					"email4"),
					"12/12/12");
$comentarios[] = new Comentario("desc5",
					new Usuario("Raul5",
					"email5"),
					"12/12/12");

$desarrolladores[] = new Desarrollador("Moncho1",
					"email1",
					"http/desa.com");
$desarrolladores[] = new Desarrollador("Moncho2",
					"email1",
					"http/desa.com");
$desarrolladores[] = new Desarrollador("Moncho3",
					"email1",
					"http/desa.com");
$desarrolladores[] = new Desarrollador("Moncho4",
					"email1",
					"http/desa.com");
$desarrolladores[] = new Desarrollador("Moncho5",
					"email1",
					"http/desa.com");

for($i=0;$i<5 ;$i++){
	$a=$i+1;
$iconos[$i] = new Icono("50px",
					"60px",
					"http://localhost/playstore/img/icono".$a.".png");
//echo $iconos[$i]->toString();

}
$categoria[] ="ninos";
$categoria[] ="mayores de 13";
$categoria[] ="mayores de 17";
$categoria[] ="adultos";
$categoria[] ="todo publico";


$version[] ="1.2";
$version[] ="2.2";
$version[] ="3.2";
$version[] ="4.2";
$version[] ="5.2";

$estatus[] ="descontinuado";
$estatus[] ="prueba";
$estatus[] ="desarrollo";
$estatus[] ="inactivo";
$estatus[] ="activo";


for ($i=0; $i <count($iconos) ; $i++) { 
	$a=$i+1;
$aplicaciones[$i] = new Aplicaciones("Producto".$i,
				"desc".$i,
					"12/12/12",
					$i,
					$comentarios[$i],
					"http://localhost/playstore/apks/aplicacion".$a.".apk",
					"25mb",
					$estatus[$i],
					$iconos[$i],
					$categoria[$i],
					$version[$i],
					"12/12/16",
					$desarrolladores[$i]);
//echo $aplicaciones[$i]->toString();
}



?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Oh no, Examen práctico</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
		.texto-cool{
			border-color: #FF0000;
			border-width: 5px;
			border-style: solid;
			background-color: #000000;
			color:#ffffff;
			font-size: 60px;
		}
	</style>
		<script src="js/jquery.3.1.1.min.js"></script>

</head>
<body>
	<div id="div-respuesta" class="alert alert-success" role="alert">
	<script>
		$(document).ready(function(){
			///alert("Estamos ready, el DOM fue cargado");
			$("#btn-guardar").click(function(){
				$("#btn-guardar").button("loading");
				$("#img-loading").fadeIn(200);
				var parametros = "txt-nombre="+$("#txt-nombre").val()+"&"+"txt-des="+$("#txt-des").val()+"&"+"txt-fp="+$("#txt-fp").val()+"&"+"txt-cali="+$("#txt-cali").val()+"&"+"txt-url="+$("#txt-url").val()+"&"+"txt-ta="+$("#txt-ta").val()+"&"+'slc-icono='+$("#slc-icono").val()+/*"&"+'chck-categoria='+$("#chck-categoria").val()+*/"&"+'txt-version='+$("#txt-version").val()+"&"+'txt-fa='+$("#txt-fa").val()+"&"+'slc-desa='+$("#slc-desa").val(); //formato similar a cuando se envia la informacion por GET
				//parametro1=valor1&parametro2=valor2&.....parametroN=valorN
				alert("Informacion que se enviara: " + parametros);
				$.ajax({
					url:"ajax/procesar.php?accion=guardar",
					method:"POST",
					data: parametros,
					success:function(respuesta){
						$("#img-loading").fadeOut(200);
						$("#btn-guardar").button("reset");
						$("#div-respuesta").html(respuesta);
					},
					error:function(){
						alert("Ocurrio un error.");
					}
				});	
				$("#btn-obtener").click(function(){


				$("#btn-obtener").button("loading");
				$("#img-loading").fadeIn(200);
							$.ajax({
								url:"ajax/procesar.php?accion=obtener",
								method:"POST",
								success:function(respuesta){
									$("#img-loading").fadeOut(200);
									$("#btn-obtener").button("reset");
									$("#div-tarjetas").html(respuesta);
								},
								error:function(){
									alert("Ocurrio un error.");
								}
							});	
						});
			});	
					
				
			

			
			
		});
	</script>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6">
				<!--- INICIO DEL FORMULARIO -->
				<form action="index.php" method="POST">
					<table class = "table table-striped table-hover">
						<tr>
							<td>Nombre aplicación:</td>
							<td>
								<input type="text" name="txt-nombre" id="txt-nombre" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Descripción:</td>
							<td>
								<input type="text" name="txt-des" id="txt-des" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Fecha de publicación:</td>
							<td>
								<input type="text" name="txt-fp" id="txt-fp" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Calificación promedio:</td>
							<td>
								<input type="text" name="txt-cali" id="txt-cali" class="form-control">
							</td>
						</tr>
						<tr>
							<td>URL:</td>
							<td>
								<input type="text" name="txt-url" id="txt-url" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Tamaño archivo:</td>
							<td>
								<input type="text" name="txt-ta" id="txt-ta" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Icono:</td>
							<td>
								<select name="slc-icono" id="slc-icono" class="form-control">
								<?php
								for ($i=0; $i <count($iconos); $i++) { 
										echo "<option value=".$iconos[$i]->getUrlIcono();

											if(isset($_POST['slc-icono'])){
												if($_POST['slc-icono']==$iconos[$i]->getUrlIcono()){
													echo "selected='selected'";

												}
											}

										echo ">".$iconos[$i]->getUrlIcono()."</option>";
								}
								
									

									?>
								</select>
							</td>
						</tr>
						<tr>
							<td>Categorias:</td>
							<td>
							<?php
							for ($i=0; $i < count($categoria); $i++) { 
							echo '<label><input type="checkbox" name="chck-categoria" id="chck-categoria" value="'.$categoria[$i].'">'.$categoria[$i].'</label><br>';

							/*	if(isset($_POST['chck-categoria'])){
												if($_POST['chck-categoria']==$categoria[$i]{
												echo 'selected="selected"';
												}
											}*/



							
							}

							?>
								
								
							</td>
						</tr>
						<tr>
							<td>Version:</td>
							<td>
								<input type="text" name="txt-version" id="txt-version" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Fecha de actualización:</td>
							<td>
								<input type="text" name="txt-fa" id="txt-fa" class="form-control">
							</td>
						</tr>
						<tr>
							<td>Desarrollador:</td>
							<td>
								<select name="slc-desa" id="slc-desa" class="form-control">
								<?php
								for ($i=0; $i < count($desarrolladores); $i++) { 

								echo '<option value='.$desarrolladores[$i]->getNombre();
											if(isset($_POST['slc-desa'])){
												if($_POST['slc-desa']==$desarrolladores[$i]->getNombre()){
													echo 'selected="selected"';
												}
											}


									echo ">".$desarrolladores[$i]->getNombre().$i.'</option>';
								}
									
									

								?>
									
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="button" name="btn-guardar" id="btn-guardar" 
								value="Guardar" class="btn btn-primary">
								<input type="button" name="btn-obtener" id="btn-obtener"
								value="Obtener" class="btn btn-warning">
							</td>
						</tr>
					</table>
				</form>
				<!--- FIN DEL FORMULARIO -->
			</div>
			<div>
				<img src="img/dashinfinity.gif" id="img-loading" style="display:none;">
			</div>
			<!--Listado de las aplicaciones-->
			<div class="col-lg-6">
				<div class="row" id="div-tarjetas">

				<div class="well" id="div-icono">
					
					
				</div>
				
					<!-- Inicio de la lista de aplicaciones -->
					<!-- en esta parte debe codificar -->
					<?php
					/*for ($i=0;$i<count($aplicaciones);$i++){
					echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">';
					echo '<div class="well">';
							echo '<img src="'.$aplicaciones[$i]->getIcono()->getUrlIcono().'" class="img-responsive">';
							echo '<b>'.$aplicaciones[$i]->getNombreProducto() .'</b><br>';
							echo '<span class="label label-primary">'.$aplicaciones[$i]->getCalificacionPromedio().'</span>';
							for($a=0;$a<$aplicaciones[$i]->getCalificacionPromedio();$a++){
							echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						}
							echo "<br>".$aplicaciones[$i]->getDescripcion().'<br>';
							echo 'Versión: <b>'.$aplicaciones[$i]->getVersion().'</b><br>';
							echo '<a href="'.$aplicaciones[$i]->getUrlProducto().'">Descargar</a>';
					echo	'</div>';
					echo '</div>';
					}*/
					?>
				

					
				</div>
			</div>
		</div>
	</div>
	<br><br>
	<hr>
<?php	
/*	<div class="container-fluid">
  		<div class="row">
  			<div class="hidden-sm col-lg-4 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 1
  					<div class="row">
  						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
  							<div class="well">
  								Subcolumna1
  							</div>
  						</div>
  						<div class="col-lg-6  col-md-6 col-sm-6 col-xs-6">
  							<div class="well">
  								Subcolumna2
  							</div>
  						</div>
  					</div>
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
  				<div class="well text-center">
  					Columna 2
  					<img src="img/icono2.png" class="img-responsive img-circle" alt="imagen  no encontrada">
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 3
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 4
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 5
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-6 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 6
  				</div>
  			</div>
  			<div class="col-lg-2 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 7
  				</div>
  			</div>
  			<div class="visible-xs-block col-lg-4 col-md-3 col-sm-6 col-xs-6">
  				<div class="well">
  					Columna 8
  				</div>
  			</div>
  			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
  				<div class="well">
  					Columna 9
  					<a class="btn btn-primary btn-lg" href ="http://google.hn" target="_blank">Ir a google</a><br>
  					<a class="btn btn-danger btn-lg" href ="img/icono2.png" target="_blank" download>Descargar imagen</a><br>
  					<span class="glyphicon glyphicon-thumbs-up">Like</span></a>
  					<button type="button" class="btn btn-default btn-lg" aria-label="Left Align">
						  <span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
					</button>
  				</div>
  			</div>
  		</div>
  		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
  			<div class="panel panel-danger">
			  <div class="panel-heading">Este es el titulo</div>
			  <div class="panel-body">
			    	Este es el contenido
			    	<ul class="nav nav-tabs">
			    		<li role="presentation" class="active"><a href="#">Item 1</a></li>
			    		<li role="presentation"><a href="#">Item 2</a></li>
			    		<li role="presentation"><a href="#">Item 3</a></li>
			    		<li role="presentation"><a href="http://google.hn">Item 4</a></li>
			    	</ul>
			    	<ul class="nav nav-pills">
					  <li role="presentation" class="active"><a href="#">Home</a></li>
					  <li role="presentation"><a href="#">Profile</a></li>
					  <li role="presentation"><a href="#">Messages</a></li>
					</ul>
			  </div>
			</div>
  		</div>
	</div>
	/////////////////////////////////
	<div class="texto-cool">Prueba</div><br>
	<div class="texto-cool"></div><br>
	<div class="texto-cool"></div><br>
	<div class="texto-cool"></div><br>
	<div class="texto-cool"></div><br>
	<div class="texto-cool"></div><br>

	<input type="text" id="txt-texto" name="txt-texto">
	<button id ="btn-mostrar-valor">Mostrar valor</button>
	<button id = "btn-asignar-valor">Asignar valor</button><br>
	<div id="div-contenido"></div>
	<button id="btn-llenar-div">Llenar contenido</button>
	<button id="btn-click-aqui">Click aquí</button><br>
	<span id="span-mensaje"><b>Hola mundo</b></span>
	<button id="btn-mostrar-mensaje">Mostrar mensaje del span</button>
	<br><img id="vegeta" src="img/vegeta.jpg"><br>
	<button onclick="mostrarImagen();">Mostrar Imagen</button>
	<button onclick="ocultarImagen();">Ocultar Imagen</button>
	
		$mensaje = "Hola mundo";
		echo $mensaje;
	<br>*/
?>
	<script src="js/funciones.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>
</html>