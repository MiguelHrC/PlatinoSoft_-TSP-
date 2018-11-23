<?php
	if (isset($_GET['id_tarea'])) {
		require_once('conexion.php');
		$query = "DELETE FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
		if ($conexion->query($query) === TRUE) {
			echo "<script language='javascript'>alert('Tarea eliminada con exito')</script>";   
            echo "<script language='javascript'>window.location='./Script/Formularios/FrmConsultar_tareas.php'</script>";
		} else {
			echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
		}
	}
?>