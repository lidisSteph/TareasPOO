<?php

	class Persona{

		private $nombre;
		private $correo;

		public function __construct($nombre,
					$correo){
			$this->nombre = $nombre;
			$this->correo = $correo;
		}
		public function getNombre(){
			return $this->nombre;
		}
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
		public function getCorreo(){
			return $this->correo;
		}
		public function setCorreo($correo){
			$this->correo = $correo;
		}
		public function toString(){
			return "Nombre: " . $this->nombre . 
				" Correo: " . $this->correo;
		}
	}
?>