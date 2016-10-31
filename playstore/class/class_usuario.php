<?php

include_once("class_producto.php");
 class Usuario extends Persona
 {
 	
 	function __construct($nombre,
					$correo)
 	{
 		parent::__construct($nombre,
					$correo);
 	}
 }

?>