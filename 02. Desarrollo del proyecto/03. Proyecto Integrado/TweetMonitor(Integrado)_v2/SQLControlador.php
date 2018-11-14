<?php

include_once "MySQLConector.php";
include_once "Usuarios.php";
include_once "Tareas.php";

class SQLControlador
{

	function __construct()
	{
	}

	public function IniciarSesion($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$consulta = "SELECT * FROM usuarios WHERE Usuario = '" . $Usuarios->getUsuario() . "';";
		$Resultado = $Mysql->Consulta($consulta);
		$tupla = mysqli_fetch_array($Resultado);

		if ($Usuarios->getContrasena() == $tupla['Contrasena']) {
			return true;
		} else {
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
			'" .
			$Usuarios->getNombre() . "','" .
			$Usuarios->getContrasena() . "','" .
			$Usuarios->getCorreo() . "','" .
			$Usuarios->getUsuario() .
			"');";

		$Resultado = $Mysql->Consulta($consulta);
		$Mysql->CerrarConexion();
	}

	public function ModificarUsuario($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$consulta = "UPDATE usuarios Set  
			Nombre = '" . $Usuarios->getNombre() . "', 
			Contrasena = '" . $Usuarios->getContrasena() . "',  
			Correo = '" . $Usuarios->getCorreo() . "',  
			Usuario = '" . $Usuarios->getUsuario() . "' Where idUsuarios = " . $Usuarios->getidUsuarios() . ";";
		$Resultado = $Mysql->Consulta($consulta);
		$Mysql->CerrarConexion();
	}


	public function AgregarTarea($Tareas)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();

		$consulta = "INSERT INTO tareas (tarea, id_usuario, usuario_twitter, hashtag, dia_inicio, dia_fin, hora_inicio, hora_fin) 
		VALUES (
		'" .
			$Tareas->getTarea() . "','" .
			$Tareas->getidUsuario() . "','" .
			$Tareas->getUsuario_Tweeter() . "','" .
			$Tareas->getHastag() . "','" .
			$Tareas->getDia_inicio() . "','" .
			$Tareas->getDia_Fin() . "','" .
			$Tareas->getHora_Inicio() . "','" .
			$Tareas->getHora_Fin() .
			"');";
		if ($Mysql->Consulta($consulta) === true) {
			//echo "Tarea agregada exitosamente!";
			echo "<script language='javascript'>alert('Tarea agregada exitosamente!')</script>";
			echo "<script language='javascript'>window.location = 'agregar_tarea.php'</script>";
		} else {
			echo "Error en la consulta: " . $consulta . "\n Error: " . $Mysql->error;
		}

		$Resultado = $Mysql->Consulta($consulta);
		$Mysql->CerrarConexion();	
	}
}
?>