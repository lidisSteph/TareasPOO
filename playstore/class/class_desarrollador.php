<?php
include_once("class_persona.php");
	class Desarrollador extends Persona{

		private $url;

		public function __construct($nombre,
					$correo,
					$url){
			parent::__construct($nombre,
					$correo);
			$this->url = $url;
		}
		public function getUrl(){
			return $this->url;
		}
		public function setUrl($url){
			$this->url = $url;
		}
		public function toString(){
			return parent::toString()."Url: " . $this->url;
		}
	}
?>