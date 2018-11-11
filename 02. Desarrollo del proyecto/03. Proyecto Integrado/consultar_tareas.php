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
	<table border='1'>
		<thead>
		    <tr>
		    	<th>Tarea</th>
			    <th>Usuario</th>
			    <th>Hashtag</th>
			    <th>Dia de Inicio</th>
			    <th>Dia de Fin</th>
			    <th>Hora de Fin</th>
			    <th>Hora de Fin</th>
			    <th></th>
			</tr>
		</thead>
		<tbody>
<?php
	require_once('conexion.php');
	$query = "SELECT * FROM tareas;";
	$result = $conexion->query($query);

	if ($result->num_rows > 0) { 
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr>";
			echo "<td>".$row['tarea']."</td>";
			echo "<td>".$row['usuario_twitter']."</td>";
			echo "<td>".$row['hashtag']."</td>";
			echo "<td>".NumeroADia($row['dia_inicio'])."</td>";
			echo "<td>".NumeroADia($row['dia_fin'])."</td>";
			echo "<td>".$row['hora_inicio']."</td>";
			echo "<td>".$row['hora_fin']."</td>";
			echo "<td>";
				echo "<a href='modificar_tarea.php?id_tarea=".$row['id_tarea']."'>Modificar </a>";
				echo "<a href='eliminar_tarea.php?id_tarea=".$row['id_tarea']."'>Eliminar</a>";
			echo "</td>";
			echo "</tr>";
		}
	}
		echo "</tbody>";
	echo "</table>";

	function NumeroADia($num){
		$dia = "";
		switch ($num) {
			case '1':
				$dia = "Lunes";
				break;
			case '2':
				$dia = "Martes";
				break;
			case '3':
				$dia = "Miercoles";
				break;
			case '4':
				$dia = "Jueves";
				break;
			case '5':
				$dia = "Viernes";
				break;
			case '6':
				$dia = "Sabado";
				break;
			case '7':
				$dia = "Domingo";
				break;
			default:
				$dia = "?";
				break;
		}
		return $dia;
	}
?>
</body>
</html>