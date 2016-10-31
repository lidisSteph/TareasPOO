<?php

	class Peliculas extends Producto{

		private $autor;
		private $casaProductora;
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
					$casaProductora,
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
			$this->casaProductora = $casaProductora;
			$this->anio = $anio;
		}
		public function getAutor(){
			return $this->autor;
		}
		public function setAutor($autor){
			$this->autor = $autor;
		}
		public function getCasaProductora(){
			return $this->casaProductora;
		}
		public function setCasaProductora($casaProductora){
			$this->casaProductora = $casaProductora;
		}
		public function getAnio(){
			return $this->anio;
		}
		public function setAnio($anio){
			$this->anio = $anio;
		}
		public function toString(){
			return parent::toString()."Autor: " . $this->autor . 
				" CasaProductora: " . $this->casaProductora . 
				" Anio: " . $this->anio;
		}
	}
?>