<?php
	session_start();
	if(!isset($_SESSION['Loggedin']) && !$_SESSION['Loggedin']){
	    echo "<script language='javascript'>window.location='FrmLogin.php'</script>";
	    exit;
	}

	if (isset($_GET['id_tarea'])) {
		include_once "../Clases/SQLControlador.php";
		$Mysql = new MySQLConector();
		$Mysql->Conectar();

	$Consulta = "DELETE FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
		if ($Mysql->Consulta($Consulta) === TRUE) {
			echo "<script language='javascript'>alert('Tarea eliminada con exito')</script>";   
            echo "<script language='javascript'>window.location='./FrmConsultar_tareas.php'</script>";
		} else {
			echo "Error en la consulta: ". $Consulta ."\n Error: ". $Mysql->error; 
		}
	}else{
		 echo "<script language='javascript'>window.location='./FrmConsultar_tareas.php'</script>";
	}
	$Mysql->CerrarConexion();
?>