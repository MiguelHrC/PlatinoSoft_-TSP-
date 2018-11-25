<?php
	
	class Usuarios{

		private $idUsuarios;
		private $Nombre_Usuario;
		private $Correo;
		private $Contrasena;

		function __construct(){
			$this -> idUsuarios = 0;
			$this -> Nombre_Usuario = null;
			$this -> Correo_Electronico = null;
			$this -> Contrasena = null;
		}

		public function setidUsuarios($idUsuarios){
			$this -> idUsuarios = $idUsuarios;
		}
		public function getidUsuarios(){
			return $this -> idUsuarios;
		}
		public function setNombre_Usuario($Nombre_Usuario){
			$this -> Nombre_Usuario = $Nombre_Usuario;
		}
		public function getNombre_Usuario(){
			return $this -> Nombre_Usuario;
		}
		public function setCorreo($Correo){
			$this -> Correo = $Correo;
		}
		public function getCorreo(){
			return $this -> Correo;
		}
		public function setContrasena($Contrasena){
			$this -> Contrasena = $Contrasena;
		}
		public function getContrasena(){
			return $this -> Contrasena;
		}
	}

?>