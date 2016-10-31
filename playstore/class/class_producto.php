<?php
include_once("class_icono.php");

	abstract class Producto{

		protected $nombreProducto;
		protected $descripcion;
		protected $fechaPublicacion;
		protected $calificacionPromedio;
		protected $comentarios;
		protected $urlProducto;
		protected $tamanioArchivo;
		protected $estatus;
		protected $icono;

		public function __construct($nombreProducto,
					$descripcion,
					$fechaPublicacion,
					$calificacionPromedio,
					$comentarios,
					$urlProducto,
					$tamanioArchivo,
					$estatus,
					$icono){
			$this->nombreProducto = $nombreProducto;
			$this->descripcion = $descripcion;
			$this->fechaPublicacion = $fechaPublicacion;
			$this->calificacionPromedio = $calificacionPromedio;
			$this->comentarios = $comentarios;
			$this->urlProducto = $urlProducto;
			$this->tamanioArchivo = $tamanioArchivo;
			$this->estatus = $estatus;
			$this->icono = $icono;
		}
		public function getDescripcion(){
			return $this->descripcion;
		}
		public function setDescripcion($descripcion){
			$this->descripcion = $descripcion;
		}
		public function getNombreProducto(){
			return $this->nombreProducto;
		}
		public function setNombreProducto($nombreProducto){
			$this->nombreProducto = $nombreProducto;
		}
		public function getFechaPublicacion(){
			return $this->fechaPublicacion;
		}
		public function setFechaPublicacion($fechaPublicacion){
			$this->fechaPublicacion = $fechaPublicacion;
		}
		public function getCalificacionPromedio(){
			return $this->calificacionPromedio;
		}
		public function setCalificacionPromedio($calificacionPromedio){
			$this->calificacionPromedio = $calificacionPromedio;
		}
		public function getComentarios(){
			return $this->comentarios;
		}
		public function setComentarios($comentarios){
			$this->comentarios = $comentarios;
		}
		public function getUrlProducto(){
			return $this->urlProducto;
		}
		public function setUrlProducto($urlProducto){
			$this->urlProducto = $urlProducto;
		}
		public function getTamanioArchivo(){
			return $this->tamanioArchivo;
		}
		public function setTamanioArchivo($tamanioArchivo){
			$this->tamanioArchivo = $tamanioArchivo;
		}
		public function getEstatus(){
			return $this->estatus;
		}
		public function setEstatus($estatus){
			$this->estatus = $estatus;
		}
		public function getIcono(){
			return $this->icono;
		}
		public function setIcono($icono){
			$this->icono = $icono;
		}
		public function toString(){
			return "NombreProducto: " . $this->nombreProducto .
				"Descripcion: ".$this->descripcion. 
				" FechaPublicacion: " . $this->fechaPublicacion . 
				" CalificacionPromedio: " . $this->calificacionPromedio . 
				" Comentarios: " . $this->comentarios . 
				" UrlProducto: " . $this->urlProducto . 
				" TamanioArchivo: " . $this->tamanioArchivo . 
				" Estatus: " . $this->estatus . 
				" Icono: " . $this->icono;
		}
	}
?>