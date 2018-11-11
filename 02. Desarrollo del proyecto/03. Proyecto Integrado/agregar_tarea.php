<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
		<li><a href='consultar_tweet.php'>Consultar Tweet</a></li>
		<li><a href='agregar_tarea.php'>Agregar Tarea</a></li>
		<li><a href='consultar_tareas.php'>Consultar Tareas</a></li>
	</ul>
	<?php
	if (!isset($_GET['tarea']) && !isset($_GET['id_usuario']) && !isset($_GET['usuario_twitter']) && !isset($_GET['hashtag']) && !isset($_GET['dia_inicio']) && !isset($_GET['dia_fin']) && !isset($_GET['hora_inicio']) && !isset($_GET['hora_fin'])) {
	?>
	<form action="agregar_tarea.php" method="get">
		Nombre de la Tarea: <input type="text" name="tarea" maxlength="20" required><br>
		ID Usuario: <input type="text" name="id_usuario" maxlength="20" required><br>
		Usuario de Twitter: <input type="text" name="usuario_twitter" required><br>
		Hashtag (Sin #): <input type="text" name="hashtag" required><br>
		Dia de Inicio:  
		<select name="dia_inicio">
			<option value="1">Lunes</option>
			<option value="2">Martes</option>
			<option value="3">Miercoles</option>
			<option value="4">Jueves</option>
			<option value="5">Viernes</option>
			<option value="6">Sabado</option>
			<option value="7">Domingo</option>
		</select><br>
		Dia de Fin:  
		<select name="dia_fin">
			<option value="1">Lunes</option>
			<option value="2">Martes</option>
			<option value="3">Miercoles</option>
			<option value="4">Jueves</option>
			<option value="5">Viernes</option>
			<option value="6">Sabado</option>
			<option value="7">Domingo</option>
		</select><br>
		Hora de Inicio (Formato 24hrs): <input type="number" name="hora_inicio" min="0" max="23"><br>
		Hora de Fin (Formato 24hrs): <input type="number" name="hora_fin" min="0" max="23"><br>
		<button type="submit">Registrar Tarea</button>
	</form>
	<?php
	}
	else{
		require_once('conexion.php');
		$tarea = $_GET['tarea'];
		$id_usuario = $_GET['id_usuario'];
		$usuario_twitter = $_GET['usuario_twitter'];
		$hashtag = $_GET['hashtag'];
		$dia_inicio = $_GET['dia_inicio'];
		$dia_fin = $_GET['dia_fin'];
		$hora_inicio = $_GET['hora_inicio'];
		$hora_fin = $_GET['hora_fin'];

		$query = "INSERT INTO tareas 
		(tarea, id_usuario, usuario_twitter, hashtag, dia_inicio, dia_fin, hora_inicio, hora_fin) 
		VALUES 
		('$tarea', '$id_usuario', '$usuario_twitter', '$hashtag', '$dia_inicio', '$dia_fin', '$hora_inicio', '$hora_fin')";
		if ($conexion->query($query) === TRUE) {
			echo "Tarea agregada exitosamente!";
		} else {
			echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
		}
	}
	?>
</body>
</html>