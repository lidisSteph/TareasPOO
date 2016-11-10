<?php 
include_once("../class/class_conexion.php");
$conexion = new Conexion();
$conexion->establecerConexion();
switch ($_GET["accion"]) {
	case '1':
	$respuesta = $conexion->ejecutarInstruccion(
		'SELECT codigo_usuario, nombre_usuario, correo, contrasena, url_imagen_perfil
		FROM tbl_usuarios
		WHERE codigo_usuario IN (1,2,13,14,15,18);');

	while($fila = $conexion->obtenerFila($respuesta)){
		?>
		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">
			<div class="card-profile">
				<button type="button" class="btn btn-primary btn-xs" style="position:absolute;"
				title=<?php echo "'".$fila["nombre_usuario"]."'";?> onclick="seleccionarUsuario(<?php echo "'".$fila["codigo_usuario"]."'";?> ,<?php echo "'".$fila["nombre_usuario"]."'";?> );">
				<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
				</button>
				<img src=<?php echo "'".$fila["url_imagen_perfil"]."'";?>  class="img-responsive">
				<span class="profile-name"><?php echo "'".$fila["nombre_usuario"]."'";?> </span>
			</div>
		</div>


		<?php
	}
		
		break;

		case '2':
		

	$respuesta = $conexion->ejecutarInstruccion(sprintf(
		
				'SELECT a.codigo_usuario, a.nombre_usuario, a.correo, a.contrasena, a.url_imagen_perfil
				FROM tbl_usuarios a
				INNER JOIN tbl_amigos b
				ON (a.codigo_usuario = b.codigo_usuario_amigo)
				WHERE b.codigo_usuario = %s',stripslashes($_POST["codigoUsuario"])));
	
	while($fila = $conexion->obtenerFila($respuesta)){
		?>
		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">
		<div class="card-profile">
		<img src=<?php echo "'".$fila["url_imagen_perfil"]."'"; ?> class="img-responsive">
		<span class="profile-name"><?php echo "'".$fila["nombre_usuario"]."'"; ?></span>
		</div>
		</div>


		<?php
	}

	
		
		break;

		case '3':

		$respuesta1= $conexion->ejecutarInstruccion(sprintf(
		'SELECT a.codigo_usuario, a.nombre_usuario, a.correo, a.contrasena, a.url_imagen_perfil
			FROM tbl_usuarios a
			WHERE a.codigo_usuario NOT IN
			(
			SELECT codigo_usuario_amigo
			FROM tbl_amigos
			WHERE codigo_usuario = %s
			)
			AND a.codigo_usuario != %s',stripslashes($_POST["codigoUsuario"]),stripslashes($_POST["codigoUsuario"])));
		if($respuesta1){
			echo "yaju";
		}else{
			echo "durmamos";
		}
	
	while($fila = $conexion->obtenerFila($respuesta1)){
		?>
		<div class="col-xs-4 col-sm-2 col-md-2 col-lg-2 card-container">
		<div class="card-profile">
		<button type="button" class="btn btn-primary btn-xs" style="position: absolute;" title="Agregar"
		onclick="agregarAmigo(<?php echo "'".$fila['codigo_usuario']."'";?>);">
		<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
		</button>
		<img src=<?php echo "'".$fila['url_imagen_perfil']."'";?> class="img-responsive">
		<span class="profile-name"><?php echo "'".$fila['nombre_usuario']."'";?></span>
		</div>
		</div>




		<?php
	}
		

	
		
		break;

		case '4':

		$respuesta1= $conexion->ejecutarInstruccion(sprintf(
		"INSERT INTO tbl_amigos 
		(tbl_amigos.codigo_usuario, tbl_amigos.codigo_usuario_amigo)
		VALUES('%s','%s')",
		stripslashes($_POST['codigoUsuario']),
		stripslashes($_POST['codigoNuevoAmigo'])
		));


	
		
		break;
		case '5':
		$sql=sprintf(
			"SELECT 
			tbl_usuarios.correo, 
			tbl_usuarios.contrasena
			FROM tbl_usuarios
			WHERE correo = '%s' AND contrasena = '%s'", 
			stripslashes($_POST["txt-email"]),
			stripslashes($_POST["txt-contra"]));
		//echo $sql;
		$respuesta2= $conexion->ejecutarInstruccion($sql);

			if($conexion->cantidadRegistros($respuesta2)){
				echo "Existe registro";
			}else{
				echo "No existe registro";
			}
		break;

		case '6':
		sleep(10);

		$respuesta1= $conexion->ejecutarInstruccion(sprintf(
		"INSERT INTO tbl_usuarios 
		(tbl_usuarios.codigo_usuario,
		 tbl_usuarios.nombre_usuario,
		  tbl_usuarios.correo, 
		  tbl_usuarios.contrasena,
		   tbl_usuarios.url_imagen_perfil)
		VALUES(NULL, '%s','%s','%s','%s')",
		stripslashes($_POST['txt-usuario']),
		stripslashes($_POST['txt-correo']),
		stripslashes($_POST['txt-contrasena']),
		stripslashes($_POST['slc-url-imagen'])
		));
		if($respuesta1){
			echo "listo";
		}else{
			echo "no listo";
		}


	
		
		break;
	
	default:
		# code...
		break;
}
?>