<?php
	
	class Perfil{

		private $IdPerfil;
		private $Usuario;
		private $Correo_Electronico;
		private $Contrasena;

		function __construct(){
			$this -> idPerfil = 0;
			$this -> Usuario = null;
			$this -> Correo_Electronico = null;
			$this -> Contrasena = null;
		}

		public function setIdPerfil($idPerfil){
			$this -> IdPerfil = $IdPerfil;
		}
		public function getIdPerfil(){
			return $this -> IdPerfil;
		}
		public function setUsuario($Usuario){
			$this -> Usuario = $Usuario;
		}
		public function getUsuario(){
			return $this -> Usuario;
		}
		public function setCorreo_Electronico($Correo_Electronico){
			$this -> Correo_Electronico = $Correo_Electronico;
		}
		public function getCorreo_Electronico(){
			return $this -> Correo_Electronico;
		}
		public function setContrasena($Contrasena){
			$this -> Contrasena = $Contrasena;
		}
		public function getContrasena(){
			return $this -> Contrasena;
		}
	}

?>