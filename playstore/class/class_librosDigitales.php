<?php

	class LibrosDigitales extends Producto{

		private $autor;
		private $editorial;
		private $anio;

		public function __construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$urlProducto,
					$tamanioArchivo,
					$estatus,
					$icono,
					$autor,
					$editorial,
					$anio){
			parent::__construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$urlProducto,
					$tamanioArchivo,
					$estatus,
					$icono);
			$this->autor = $autor;
			$this->editorial = $editorial;
			$this->anio = $anio;
		}
		public function getAutor(){
			return $this->autor;
		}
		public function setAutor($autor){
			$this->autor = $autor;
		}
		public function getEditorial(){
			return $this->editorial;
		}
		public function setEditorial($editorial){
			$this->editorial = $editorial;
		}
		public function getAnio(){
			return $this->anio;
		}
		public function setAnio($anio){
			$this->anio = $anio;
		}
		public function toString(){
			return parent::toString()."Autor: " . $this->autor . 
				" Editorial: " . $this->editorial . 
				" Anio: " . $this->anio;
		}
	}
?>