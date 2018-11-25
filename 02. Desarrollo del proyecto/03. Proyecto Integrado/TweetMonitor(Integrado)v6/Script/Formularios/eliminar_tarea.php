<?php
	if (isset($_GET['id_tarea'])) {
		include_once "../Clases/SQLControlador.php";
		$Mysql = new MySQLConector();
		$Mysql->Conectar();

	$consulta = "DELETE FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
		if ($Mysql->Consulta($consulta) === TRUE) {
			echo "<script language='javascript'>alert('Tarea eliminada con exito')</script>";   
            echo "<script language='javascript'>window.location='./FrmConsultar_tareas.php'</script>";
		} else {
			echo "Error en la consulta: ". $consulta ."\n Error: ". $Mysql->error; 
		}
	}
	$Mysql->CerrarConexion();
?>