<!DOCTYPE html>
<html>
<head>
	<title>Consultar tareas</title>
</head>
<body>
	<form method="GET" action="FrmConsultar_tweet.php">
		Tarea: <select name="id_tarea">
		<?php
		require_once('../../conexion.php');

		$query = "SELECT * FROM tareas;";
		$result = $conexion->query($query);

		if ($result->num_rows > 0) {
			while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
				echo "<option value='" . $row['id_tarea'] . "'>" . $row['tarea'] . " - " . $row['usuario_twitter'] . "</option>\n";
			}
		}
		$Mysql->CerrarConexion();
		?>
		</select><br>
		<button type="submit">Consultar</button><br><br>
	</form>
<?php
if (isset($_GET['id_tarea'])) {
	$query = "SELECT * FROM tareas WHERE id_tarea = " . $_GET['id_tarea'] . ";";
	$result = $conexion->query($query);
	$row = $result->fetch_array(MYSQLI_ASSOC);

	$usuario = $row['usuario_twitter'];
	$hashtag = $row['hashtag'];
	$dia_inicio = $row['dia_inicio'];
	$dia_fin = $row['dia_fin'];
	$hora_inicio = $row['hora_inicio'];
	$hora_fin = $row['hora_fin'];

	echo "<table class='table table-striped table-hover' align='center'>";
	echo "<thead>";
	echo "<tr>";
	echo "<th>Usuario</th>";
	echo "<th>Fecha</th>";
	echo "<th>Texto</th>";
	echo "<th>Hashtag</th>";
	echo "<th>Comentario</th>";
	echo "</tr>";
	echo "</thead>";
	echo "<tbody>";
	$comentario = "Sin Comentarios";
	require_once('conexion.php');

	$query = "SELECT usuario, fecha, texto, hashtag FROM `tweets` WHERE hashtag LIKE '$hashtag' and usuario LIKE '$usuario';";
	$result = $conexion->query($query);

	if ($result->num_rows > 0) {
		while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
			echo "<tr>";
			echo "<td>" . $row['usuario'] . "</td>";
			echo "<td>" . date('d-m-Y H:m', strtotime($row['fecha'])) . "</td>";
			echo "<td>" . $row['texto'] . "</td>";
			echo "<td>" . $row['hashtag'] . "</td>";
			echo "<td>" . ObtenerComentario($row['fecha'], $dia_inicio, $dia_fin, $hora_inicio, $hora_fin) . "</td>";
			echo "</tr>";
		}
	}
	echo "</tbody>";
	echo "</table>";
}

function ObtenerComentario($fecha, $dia_inicio, $dia_fin, $hora_inicio, $hora_fin)
{
	$date = date(strtotime($fecha));
	if (date('N', $date) >= $dia_inicio && date('N', $date) <= $dia_fin) {
		if (date('H', $date) >= $hora_inicio && date('H', $date) <= $hora_fin) {
			return "Correcto";
		} else {
			return "Comportamiento Extraño: Hora";
		}
	} else {
		if (date('H', $date) >= $hora_inicio && date('H', $date) <= $hora_fin) {
			return "Comportamiento Extraño: Dia";
		} else {
			return "Comportamiento Extraño: Dia y Hora";
		}
	}
}
?>
</body>
</html>