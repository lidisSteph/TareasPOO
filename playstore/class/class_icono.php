<?php

	class Icono{

		private $ancho;
		private $alto;
		private $urlIcono;

		public function __construct($ancho,
					$alto,
					$urlIcono){
			$this->ancho = $ancho;
			$this->alto = $alto;
			$this->urlIcono = $urlIcono;
		}
		public function getAncho(){
			return $this->ancho;
		}
		public function setAncho($ancho){
			$this->ancho = $ancho;
		}
		public function getAlto(){
			return $this->alto;
		}
		public function setAlto($alto){
			$this->alto = $alto;
		}
		public function getUrlIcono(){
			return $this->urlIcono;
		}
		public function setUrlIcono($urlIcono){
			$this->urlIcono = $urlIcono;
		}
		public function toString(){
			return "Ancho: " . $this->ancho . 
				" Alto: " . $this->alto . 
				" UrlIcono: " . $this->urlIcono;
		}
	}
?>