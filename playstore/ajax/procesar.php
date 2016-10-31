<?php 
include_once("../class/class_aplicaciones.php");
$a=0;
	switch ($_GET["accion"]) {
		case 'guardar':
			sleep(10);
			$a++;
			echo "Esta es la informacion que se recibe de index.php: <br>";
			echo "Posicion:".$a."<br>";
			echo "Nombre de Producto: " . $_POST["txt-nombre"]."<br>";
			echo "Descripcion: " . $_POST["txt-des"]."<br>";
			echo "Fecha de Publicacion: ".$_POST["txt-fp"]."<br>";
			echo "Calificacion Promedio: ".$_POST["txt-cali"]."<br>";
			echo "URL del producto: ".$_POST["txt-url"]."<br>";
			echo "Tamanio de archivo: ".$_POST["txt-ta"]."<br>";
			echo "Icono: ".$_POST['slc-icono']."<br>";
			//echo "Categorias: ".$_POST['chck-categoria']."<br>";
			echo "Version: ".$_POST['txt-version']."<br>";
			echo "Fecha de Actualizacion: ".$_POST['txt-fa']."<br>";
			echo "Desarrollador: ".$_POST['slc-desa']."<br>";
		
			
			$archivo = fopen("log_usuarios.csv","a"); //Nombre archivo, modo de apertura: r, w, a
			fwrite($archivo,$_POST["txt-nombre"] . "," .$_POST["txt-des"].",".$_POST["txt-fp"].",".$_POST["txt-cali"].",".$_POST["txt-url"].",".$_POST["txt-ta"].",".$_POST["slc-icono"]./*",".$_POST["chck-categoria"].*/",".$_POST["txt-version"].",".$_POST["txt-fa"].",".$_POST["slc-desa"]."\n") ;
			fclose($archivo);
			break;
		case 'obtener':
		sleep(5);
			$i=0;
			$archivo = fopen("log_usuarios.csv","r"); //Nombre archivo, modo de apertura: r, w, a
			
			while($linea = fgets($archivo)){
				$i++;
				//echo $i.$linea."<br>";
				$arreglo = explode(",",$linea);


				
					echo '<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">';
					echo '<div class="well">';
							echo '<img src="'.$arreglo[6].'" class="img-responsive">';
							echo '<b>'.$arreglo[0] .'</b><br>';
							echo '<span class="label label-primary">'.$arreglo[3].'</span>';
							for($a=0;$a<$arreglo[3];$a++){
							echo '<span class="glyphicon glyphicon-star" aria-hidden="true"></span>';
						}
							echo "<br>".$arreglo[1].'<br>';
							echo 'Versión: <b>'.$arreglo[7].'</b><br>';
							echo '<a href="'.$arreglo[4].'">Descargar</a>';
					echo	'</div>';
					echo '</div>';
					
				
/*nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$urlProducto,
					$tamanioArchivo,
					$estatus,
					$icono,
					$categorias,
					$version,
					$fechaActualizacion,
					$desarrollador
				$aplicaciones[$i] = new Aplicaciones($arreglo[0],
				$arreglo[1],
					$arreglo[2],
					$arreglo[3],
					"estandar",
					$arreglo[4],
					$arreglo[5],
					'estandar',
					$arreglo[6],
					'categoria',
					$arreglo[7],
					$arreglo[8],
					$arreglo[9]);
				echo $aplicaciones[$i]->toString();*/
			

				//echo "I'm in the case 2";
			}
			

			fclose($archivo);
			break;
		default:
			echo "Accion invalida";
			break;
	}
	
?>
