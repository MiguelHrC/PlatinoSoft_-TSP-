<?php
	
	include_once "MySQLConector.php";
	include_once "Usuarios.php";
	
	class SQLControlador {
		
		function __construct(){}

		public function IniciarSesion($Usuarios){
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "SELECT * FROM usuarios WHERE Usuario = '".$Usuarios->getUsuario()."';";
			$Resultado = $Mysql -> Consulta($consulta);
			$tupla = mysqli_fetch_array($Resultado);

			if($Usuarios->getContrasena() == $tupla['Contrasena'])
			{
				return true;
			}
			else
			{
				return false;
			}


			$Mysql->CerrarConexion();
		}

		public function RegistrarUsuario($Usuarios)
		{
			$Mysql = new MySQLConector();
			$Mysql->Conectar();
			$consulta = "INSERT INTO Usuarios (idUsuarios, Nombre, Contrasena, Correo, Usuario)
			VALUES (
			null,
			'".
			$Usuarios->getNombre()."','".
			$Usuarios->getContrasena()."','".
			$Usuarios->getCorreo()."','".
			$Usuarios->getUsuario().
			"');";

			$Resultado = $Mysql -> Consulta($consulta);
			$Mysql->CerrarConexion();
		}
	}
?>