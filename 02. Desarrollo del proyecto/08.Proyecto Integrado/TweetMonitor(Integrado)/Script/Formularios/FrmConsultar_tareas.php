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
	<link rel="stylesheet" href="./../../css/main.css">
	<script src="./../../js/bootstrap.min.js"></script>
	<script src="./../../js/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
	 crossorigin="anonymous">
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
	 crossorigin="anonymous">
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
	 crossorigin="anonymous"></script>
</head>
<header align="center">
	<?php
		if (!isset($_SESSION)) {
			session_start();
		}
	?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
				<span class="sr-only">Desplegar navegación</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Logotipo</a>
		</div>

		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<form class="navbar-form navbar-right role=" navigation">
				<div class="form-group">
					<class="navbar-text">
						<a href="./FrmPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-user">
								<?php echo $_SESSION['Usuario']; ?></span></a>
						<a href="./Salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> Salir</span></a>
						</class>
				</div>
			</form>
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
					echo "	<a href='./eliminar_tarea.php?id_tarea=" . $row['id_tarea'] . "' class='btn btn-danger glyphicon glyphicon-minus'></a>";
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