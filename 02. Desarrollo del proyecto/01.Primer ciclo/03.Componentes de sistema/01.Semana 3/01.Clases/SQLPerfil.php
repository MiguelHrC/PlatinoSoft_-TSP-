<?php
	
	include_once "MySQLConector.php";
	include_once "Usuarios.php";
	
	class SQLUsuarios{

		private $Usuario = array();
		
		function __construct(){}

		public function ListaUsuarios(){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$Consulta = "SELECT * FROM Usuarios;";
			$Resultado = $Mysql -> Consulta($Consulta);
			$Contador = 0;
			while ($tupla = mysqli_fetch_array($Resultado)) {
				$Perfil = new Perfil();
				$Perfil -> setidUsuarios($tupla['idUsuarios']);
				$Perfil -> setNombre_Usuario($tupla['Nombre_usuario']);
				$Perfil -> setContrasena($tupla['Contrasena']);
				$Perfil -> setCorreo($tupla['Correo']);
				$this -> Usuarios[$Contador] = $Usuario;
				$Contador++;
			}
			$Mysql -> CerrarConexion();
			return $this -> Perfiles;
		}

		public function AgregarUsuario($Usuarios)
		{
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "INSERT INTO Usuarios(idUsuarios, Nombre_usuario, Contrasena, Correo)
			VALUES (
			null,
			'".
			$Perfil->getidUsuarios()."','".
			$Perfil->getNombre_Usuario()."','".
			$Perfil->getUsuario()."','".
			$Perfil->getContrasena()."','".
			$Perfil->setCorreo().
			"');";
			$Resultado = $Mysql -> Consulta($consulta);
			$Mysql->CerrarConexion();
		}

		public function IniciarSesion($Usuarios){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "SELECT * FROM Usuarios WHERE Nombre_usuario = '".$Perfil->getNombre_Usuario()."';";
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