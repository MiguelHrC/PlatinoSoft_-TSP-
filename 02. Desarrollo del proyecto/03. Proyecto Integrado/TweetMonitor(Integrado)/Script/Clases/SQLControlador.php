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

		//if (password_verify($Usuarios->getContrasena(), $tupla['Contrasena'])){
		if ($Usuarios->getContrasena() == $tupla['Contrasena']) {
			return true;
		} else {
			return false;
		}
		$Mysql->CerrarConexion();
	}

	public function GetIdUsuario($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$consulta = "SELECT * FROM usuarios WHERE Usuario = '" . $Usuarios->getUsuario() . "';";
		$Resultado = $Mysql->Consulta($consulta);
		$tupla = mysqli_fetch_array($Resultado);

		if (isset($tupla['idUsuarios'])) {
			return $tupla['idUsuarios'];
		} else {
			return 0;
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
			Correo = '" . $Usuarios->getCorreo() . "',  
			Usuario = '" . $Usuarios->getUsuario() . "' Where idUsuarios = " . $Usuarios->getidUsuarios() . ";";
		if ($Mysql->Consulta($consulta) === true) {
			echo "<script language='javascript'>alert('Modificacion exitosa')</script>";   
			echo "<script language='javascript'>window.location='../Formularios/FrmPerfil.php'</script>";
		}
		$Resultado = $Mysql->Consulta($consulta);
		$Mysql->CerrarConexion();
	}

	public function ModificarContrasena($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$consulta = "UPDATE usuarios Set  
			Contrasena = '" . $Usuarios->getContrasena() . "' Where idUsuarios = " . $Usuarios->getidUsuarios() . ";";
		if ($Mysql->Consulta($consulta) === true) {
			echo "<script language='javascript'>alert('Modificacion exitosa')</script>";   
			echo "<script language='javascript'>window.location='../Formularios/FrmLogin.php'</script>";
		}
		$Resultado = $Mysql->Consulta($consulta);
		$Mysql->CerrarConexion();
	}

	public function ModificarTarea($Tareas)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$consulta = "UPDATE tareas Set
			id_tarea = '" . $Tareas->getidTarea() . "', 
			tarea = '" . $Tareas->getTarea() . "', 
			id_usuario = '" . $Tareas->getidUsuario() . "',  
			usuario_twitter = '" . $Tareas->getUsuario_Tweeter() . "',  
			hashtag = '" . $Tareas->getHastag() . "',
			dia_inicio = '" . $Tareas->getDia_inicio() . "',  
			dia_fin = '" . $Tareas->getDia_Fin() . "',
			hora_inicio = '" . $Tareas->getHora_Inicio() . "', 
			hora_fin = '" . $Tareas->getHora_Fin() . "'
			Where id_tarea = " . $Tareas->getidTarea() . ";";
		if ($Mysql->Consulta($consulta) === true) {
			echo "<script language='javascript'>alert('Tarea modificada con exito')</script>";
			echo "<script language='javascript'>window.location = 'FrmConsultar_tareas.php'</script>";
		} else {
			echo "Error en la consulta: " . $consulta . "\n Error: " . $Mysql->error;
		}
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
			echo "<script language='javascript'>window.location = 'FrmAgregar_tarea.php'</script>";
		} else {
			echo "Error en la consulta: " . $consulta . "\n Error: " . $Mysql->error;
		}
		$Mysql->CerrarConexion();	
	}

	public function CerrarSesion()
	{
		if (!isset($_SESSION)) {
			session_start();
		}
		if (isset($_SESSION)) {
			session_unset();
			unset($_SESSION['Usuario']);
			session_destroy();
			echo "<script language='javascript'>window.location='/index.php'</script>";
		}
	}
}
?>