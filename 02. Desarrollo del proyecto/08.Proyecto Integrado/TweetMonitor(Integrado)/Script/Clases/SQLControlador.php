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
		$Consulta = "SELECT * FROM usuarios WHERE Usuario = '" . $Usuarios->getUsuario() . "';";
		$Resultado = $Mysql->Consulta($Consulta);
		$Tupla = mysqli_fetch_array($Resultado);

		if ($Usuarios->getContrasena() == $Tupla['Contrasena']) {
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
		$Consulta = "SELECT * FROM usuarios WHERE Usuario = '" . $Usuarios->getUsuario() . "';";
		$Resultado = $Mysql->Consulta($Consulta);
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

		$ConsultaCorreo = "SELECT * FROM usuarios WHERE Correo = '" . $Usuarios->getCorreo() . "';";
		$ConsultaUsuario = "SELECT * FROM usuarios WHERE Usuario = '" . $Usuarios->getUsuario() . "';";
		$ResCo = $Mysql->Consulta($ConsultaCorreo);
		$ResUs = $Mysql->Consulta($ConsultaUsuario);

		if (($ResUs->num_rows == 1) && ($ResCo->num_rows == 1)) {
			echo "<script language='javascript'>alert('El corrreo " . $Usuarios->getCorreo() . " y el usuario " . $Usuarios->getUsuario() . " ya se encuentran registrados')</script>";
			echo "<script language='javascript'>window.location='../Formularios/FrmRegistrarUsuario.php'</script>";			
		}else if ($ResCo->num_rows == 1){
			echo "<script language='javascript'>alert('El corrreo " . $Usuarios->getCorreo() . " ya se encuentra registrado')</script>";
			echo "<script language='javascript'>window.location='../Formularios/FrmRegistrarUsuario.php'</script>";			
		}else if ($ResUs->num_rows == 1) {
			echo "<script language='javascript'>alert('El usuario " . $Usuarios->getUsuario() . " ya se encuentra registrado')</script>";
			echo "<script language='javascript'>window.location='../Formularios/FrmRegistrarUsuario.php'</script>";			
		} else {
			$Consulta = "INSERT INTO usuarios (idUsuarios, Nombre, Contrasena, Correo, Usuario)
			VALUES (
			null,
			'" .
				$Usuarios->getNombre() . "','" .
				$Usuarios->getContrasena() . "','" .
				$Usuarios->getCorreo() . "','" .
				$Usuarios->getUsuario() .
				"');";
			//echo "<script language='javascript'>alert('".$Consulta."')</script>";
			echo "<script language='javascript'>alert('¡Registro completado con éxito!')</script>";
			echo "<script language='javascript'>window.location='../Formularios/FrmLogin.php'</script>";			
		}
		$Resultado = $Mysql->Consulta($Consulta);
		$Mysql->CerrarConexion();
	}

	public function ModificarUsuario($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$ConsultaCorreoPropio = "SELECT * FROM usuarios WHERE Correo = '" . $Usuarios->getCorreo() . "' and Usuario='" . $Usuarios->getUsuario() . "';";
			$Propio = $Mysql->Consulta($ConsultaCorreoPropio);
			if ($Propio->num_rows == 1) {
				echo "<script language='javascript'>alert('No se encontraron modificaciones')</script>";
			}else{
				
				$MailCorrecto="SELECT Correo FROM usuarios WHERE idUsuarios = " . $Usuarios->getidUsuarios() . ";";
				$Mail=$Mysql->Consulta($MailCorrecto);
				if ($Row = mysqli_fetch_array($Mail)) {
					$Var = $Row["Correo"];
				}
				$ConsultaTodosCorreos = "SELECT Correo FROM usuarios WHERE Correo!='$Var';";
				$Realizar= $Mysql->Consulta($ConsultaTodosCorreos);
				$Verificar=0;

				while ($fila = mysqli_fetch_array($Realizar)) {
					if($Usuarios->getCorreo()==$fila['Correo']){
						$Verificar=$Verificar+1;
					}else{
						$Verificar=$Verificar+0;
					}
				}
				if($Verificar==0){
					$Consulta = "UPDATE usuarios Set  
					Nombre = '" . $Usuarios->getNombre() . "', 
					Correo = '" . $Usuarios->getCorreo() . "',  
					Usuario = '" . $Usuarios->getUsuario() . "' Where idUsuarios = " . $Usuarios->getidUsuarios() . ";";
					if ($Mysql->Consulta($Consulta) == true) {
						echo "<script language='javascript'>alert('Modificación exitosa')</script>";
						echo "<script language='javascript'>window.location='../Formularios/FrmPerfil.php'</script>";
						$Resultado = $Mysql->Consulta($Consulta);
					}else{
						echo "<script language='javascript'>alert('Modificación incorrecta')</script>";
					}
				
				}else {
					echo "<script language='javascript'>alert('El correo esta en uso')</script>";	
					echo "<script language='javascript'>window.location='../Formularios/FrmPerfil.php'</script>";
				}
			}
		$Mysql->CerrarConexion();
	}

	public function ModificarContrasena($Usuarios)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$Consulta = "UPDATE usuarios Set  
			Contrasena = '" . $Usuarios->getContrasena() . "' Where idUsuarios = " . $Usuarios->getidUsuarios() . ";";
		if ($Mysql->Consulta($Consulta) === true) {
			echo "<script language='javascript'>alert('Modificación exitosa')</script>";
			echo "<script language='javascript'>window.location='../Formularios/FrmLogin.php'</script>";
		}
		$Resultado = $Mysql->Consulta($Consulta);
		$Mysql->CerrarConexion();
	}

	public function ModificarTarea($Tareas)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();
		$Consulta = "UPDATE tareas Set
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
		if ($Mysql->Consulta($Consulta) === true) {
			echo "<script language='javascript'>alert('Tarea modificada con éxito')</script>";
			echo "<script language='javascript'>window.location = 'FrmConsultar_tareas.php'</script>";
		} else {
			echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
		}
		$Resultado = $Mysql->Consulta($Consulta);
		$Mysql->CerrarConexion();
	}


	public function AgregarTarea($Tareas)
	{
		$Mysql = new MySQLConector();
		$Mysql->Conectar();

		$Consulta = "INSERT INTO tareas (tarea, id_usuario, usuario_twitter, hashtag, dia_inicio, dia_fin, hora_inicio, hora_fin) 
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
		if ($Mysql->Consulta($Consulta) === true) {
			echo "<script language='javascript'>alert('Tarea agregada exitosamente!')</script>";
			echo "<script language='javascript'>window.location = 'FrmAgregar_tarea.php'</script>";
		} else {
			echo "Error en la consulta: " . $Consulta . "\n Error: " . $Mysql->error;
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