<?php
	class Usuarios{

		private $idUsuarios;
		private $Nombre;
		private $Contrasena;
		private $Correo;
		private $Usuario;
		
		function __construct(){
			$this -> idUsuarios = 0;
			$this -> Nombre = null;
			$this -> Contrasena = null;
			$this -> Correo = null;
			$this -> Usuario= null;
		}

		public function setidUsuarios($idUsuarios){
			$this -> idUsuarios = $idUsuarios;
		}
		public function getidUsuarios(){
			return $this -> idUsuarios;
		}
		public function setNombre($Nombre){
			$this -> Nombre = $Nombre;
		}
		public function getNombre(){
			return $this -> Nombre;
		}
		public function setContrasena($Contrasena){
			$this -> Contrasena = $Contrasena;
		}
		public function getContrasena(){
			return $this -> Contrasena;
		}
		public function setCorreo($Correo){
			$this -> Correo = $Correo;
		}
		public function getCorreo(){
			return $this -> Correo;
		}
		public function setUsuario($Usuario){
			$this -> Usuario = $Usuario;
		}
		public function getUsuario(){
			return $this -> Usuario;
		}
	}
?>