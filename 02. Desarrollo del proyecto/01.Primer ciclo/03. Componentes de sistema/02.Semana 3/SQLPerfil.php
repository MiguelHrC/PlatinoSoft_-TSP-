<?php
	
	include_once "MySQLConector.php";
	include_once "Perfil.php";
	
	class SQLPerfil{

		private $Perfiles = array();
		
		function __construct(){}

		public function ListaPerfiles(){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "SELECT * FROM perfil;";
			$Resultado = $Mysql -> Consulta($Consulta);
			$Contador = 0;
			while ($tupla = mysqli_fetch_array($Resultado)) {
				$Perfil = new Perfil();
				$Perfil -> setIdPerfil($tupla['IdPerfil']);
				$Perfil -> setUsuario($tupla['Usuario']);
				$Perfil -> setCorreo_Electronico($tupla['IdPerfil']);
				$Perfil -> setContrasena($tupla['Contrasena']);
				$this -> Perfiles[$Contador] = $Perfil;
				$Contador++;
			}
			$Mysql -> CerrarConexion();
			return $this -> Perfiles;
		}

		public function AgregarPerfil($Perfil)
		{
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "INSERT INTO perfil (IdPerfil, Usuario, Correo_Electronico, Contrasena)
			VALUES (
			null,
			'".
			$Perfil->getUsuario()."','".
			$Perfil->getCorreo_Electronico()."','".
			$Perfil->getUsuario()."','".
			$Perfil->getContrasena().
			"');";

			$Resultado = $Mysql -> Consulta($consulta);
			$Mysql->CerrarConexion();
		}

		public function IniciarSesion($Perfil){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "SELECT * FROM perfil WHERE usuario = '".$Perfil->getUsuario()."';";
			$Resultado = $Mysql -> Consulta($consulta);
			$tupla = mysqli_fetch_array($Resultado);

			if(password_verify($Perfil->getContrasena(), $tupla['Contrasena']))
			{
				return true;
			}
			else
			{
				return false;
			}

			$Mysql->CerrarConexion();
		}
	}

?>