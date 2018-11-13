<?php
	if (isset($_GET['id_tarea'])) {
		require_once('conexion.php');
		$query = "DELETE FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
		if ($conexion->query($query) === TRUE) {
			echo "Tarea eliminada exitosamente!";
		} else {
			echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
		}
	}
?>