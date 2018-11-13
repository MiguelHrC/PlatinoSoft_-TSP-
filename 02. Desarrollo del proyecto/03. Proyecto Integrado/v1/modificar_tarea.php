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
				require_once('conexion.php');
				$query = "SELECT * FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
				$result = $conexion->query($query);
				$row = $result->fetch_array(MYSQLI_ASSOC);
?>
	<form action="modificar_tarea.php" method="get">
		<input type="hidden" name="id_tarea" value='<?php echo $_GET['id_tarea'] ?>'>
		Nombre de la Tarea: <input type="text" name="tarea" maxlength="20" value='<?php echo $row['tarea'] ?>' required><br>
		ID Usuario: <input type="text" name="id_usuario" maxlength="20" value='<?php echo $row['id_usuario'] ?>' required><br>
		Usuario de Twitter: <input type="text" name="usuario_twitter" value='<?php echo $row['usuario_twitter'] ?>' required><br>
		Hashtag (Sin #): <input type="text" name="hashtag" value='<?php echo $row['hashtag'] ?>' required><br>
		Dia de Inicio:  
		<select name="dia_inicio">
			<option <?php if ($row['dia_inicio'] == 1) { echo "selected='true'"; } ?> value="1">Lunes</option>
			<option <?php if ($row['dia_inicio'] == 2) { echo "selected='true'"; } ?> value="2">Martes</option>
			<option <?php if ($row['dia_inicio'] == 3) { echo "selected='true'"; } ?> value="3">Miercoles</option>
			<option <?php if ($row['dia_inicio'] == 4) { echo "selected='true'"; } ?> value="4">Jueves</option>
			<option <?php if ($row['dia_inicio'] == 5) { echo "selected='true'"; } ?> value="5">Viernes</option>
			<option <?php if ($row['dia_inicio'] == 6) { echo "selected='true'"; } ?> value="6">Sabado</option>
			<option <?php if ($row['dia_inicio'] == 7) { echo "selected='true'"; } ?> value="7">Domingo</option>
		</select><br>
		Dia de Fin:  
		<select name="dia_fin">
			<option <?php if ($row['dia_fin'] == 1) { echo "selected='true'"; } ?> value="1">Lunes</option>
			<option <?php if ($row['dia_fin'] == 2) { echo "selected='true'"; } ?> value="2">Martes</option>
			<option <?php if ($row['dia_fin'] == 3) { echo "selected='true'"; } ?> value="3">Miercoles</option>
			<option <?php if ($row['dia_fin'] == 4) { echo "selected='true'"; } ?> value="4">Jueves</option>
			<option <?php if ($row['dia_fin'] == 5) { echo "selected='true'"; } ?> value="5">Viernes</option>
			<option <?php if ($row['dia_fin'] == 6) { echo "selected='true'"; } ?> value="6">Sabado</option>
			<option <?php if ($row['dia_fin'] == 7) { echo "selected='true'"; } ?> value="7">Domingo</option>
		</select><br>
		Hora de Inicio (Formato 24hrs): <input type="number" name="hora_inicio" min="0" max="23" value="<?php echo $row['hora_inicio'] ?>"><br>
		Hora de Fin (Formato 24hrs): <input type="number" name="hora_fin" min="0" max="23" value="<?php echo $row['hora_fin'] ?>"><br>
		<button type="submit">Modificar Tarea</button>
	</form>
<?php
	}
	else
	{
		require_once('conexion.php');
		$tarea = $_GET['tarea'];
		$id_usuario = $_GET['id_usuario'];
		$usuario_twitter = $_GET['usuario_twitter'];
		$hashtag = $_GET['hashtag'];
		$dia_inicio = $_GET['dia_inicio'];
		$dia_fin = $_GET['dia_fin'];
		$hora_inicio = $_GET['hora_inicio'];
		$hora_fin = $_GET['hora_fin'];

		$query = "UPDATE tareas SET
		tarea='$tarea', id_usuario='$id_usuario', usuario_twitter='$usuario_twitter', hashtag='$hashtag', dia_inicio='$dia_inicio', dia_fin='$dia_fin', hora_inicio='$hora_inicio', hora_fin='$hora_fin' WHERE id_tarea = ".$_GET['id_tarea'].";";
		if ($conexion->query($query) === TRUE) {
			echo "Tarea modificada exitosamente!";
		} else {
			echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
		}
	}
?>
</body>
</html>