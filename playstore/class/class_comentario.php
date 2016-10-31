<?php

	class Comentario{

		private $descripcion;
		private $usuario;
		private $fechaComentario;

		public function __construct($descripcion,
					$usuario,
					$fechaComentario){
			$this->descripcion = $descripcion;
			$this->usuario = $usuario;
			$this->fechaComentario = $fechaComentario;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getUsuario(){
			return $this->usuario;
		}
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
		public function getFechaComentario(){
			return $this->fechaComentario;
		}
		public function setFechaComentario($fechaComentario){
			$this->fechaComentario = $fechaComentario;
		}
		public function toString(){
			return "Descripcion: " . $this->descripcion . 
				" Usuario: " . $this->usuario->toString() . 
				" FechaComentario: " . $this->fechaComentario;
		}
	}
?>