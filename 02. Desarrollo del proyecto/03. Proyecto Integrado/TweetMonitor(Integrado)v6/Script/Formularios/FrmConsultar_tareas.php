<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Consultar tareas</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="./../../css/bootstrap.min.css">
	<link rel="stylesheet" href="./../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="./../../css/estilos.css">
</head>
<header>
	<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand">TweetMonitor</a>
			</div>
			<!-- Inicia Menu -->
			<div class="collapse navbar-collapse" id="navegacion-fm">
				<form class="navbar-form navbar-right" id="navegacion">
					<?php
						require_once 'FrmBienvenida.php';
					?>
				</form>
			</div>
		</div>
	</nav>
</header>

<body>
	<form>
	</form>
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="FrmItinerario.php">Itinerario</a></li>
		<li role="presentation"><a href="FrmAgregar_tarea.php">Agregar tarea</a></li>
		<li role="presentation" class="active"><a href="FrmConsultar_tareas.php">Consultar tareas</a></li>
	</ul>

	<body>
		<p></p>
		<div class="table-responsive">
			<table id=table_tareas class="table table-striped table-hover" align="center">
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
			include_once "../Clases/MySQLConector.php";

			$Mysql = new MySQLConector();
			$Mysql->Conectar();

			$consulta = "SELECT * FROM tareas WHERE id_usuario = ".$_SESSION['IdUsuario'].";";
			$Resultado = $Mysql->Consulta($consulta);

			if ($Resultado->num_rows > 0) {
				while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)) {
					echo "<tr>";
					echo "<td>" . $row['tarea'] . "</td>";
					echo "<td>" . $row['usuario_twitter'] . "</td>";
					echo "<td>" . $row['hashtag'] . "</td>";
					echo "<td>" . NumeroADia($row['dia_inicio']) . "</td>";
					echo "<td>" . NumeroADia($row['dia_fin']) . "</td>";
					echo "<td>" . $row['hora_inicio'] . "</td>";
					echo "<td>" . $row['hora_fin'] . "</td>";
					echo "<td>";
					echo "<a href='FrmModificar_tarea.php?id_tarea=" . $row['id_tarea'] . "' class='btn btn-primary glyphicon glyphicon-pencil'></a>";
					echo "	<a href='../../eliminar_tarea.php?id_tarea=" . $row['id_tarea'] . "' class='btn btn-danger glyphicon glyphicon-minus'></a>";
					echo "</td>";
					echo "</tr>";
				}
			}
			$Mysql->CerrarConexion();
			echo "</tbody>";
			echo "</table>";
			echo "</div>";

			function NumeroADia($num)
			{
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