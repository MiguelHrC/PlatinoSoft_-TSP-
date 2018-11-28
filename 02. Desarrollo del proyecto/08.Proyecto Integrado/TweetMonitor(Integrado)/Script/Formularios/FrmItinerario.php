<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Itinerario</title>
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
	<!--Nuevo -->
	<link rel="stylesheet" href="./../../css/EstiloItinerario.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU"
	 crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<!--Nuevo-->
</head>
<header>
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

<body align="center">
	<ul class="nav nav-tabs">
		<li role="presentation" class="active"><a href="../Formularios/FrmItinerario.php">Itinerario</a></li>
		<li role="presentation"><a href="FrmAgregar_tarea.php">Agregar tarea</a></li>
		<li role="presentation"><a href="FrmConsultar_tareas.php">Consultar tareas</a></li>
	</ul>
	<form method="GET" action="FrmItinerario.php">
		<label class="col-xs-8 col-xs-offset-1">
			<h4>Tarea:</h4>
		</label>
		<div class="col-xs-8 col-xs-offset-1">
			<select name="id_tarea" class="form-control Input">
				<?php
			include_once "../Clases/MySQLConector.php";
			include_once "../Clases/Tareas.php";

			$Mysql = new MySQLConector();
			$Mysql->Conectar();

			$consulta = "SELECT * FROM tareas WHERE id_usuario = " . $_SESSION['IdUsuario'] . ";";

			$Resultado = $Mysql->Consulta($consulta);

			if ($Resultado->num_rows > 0) {
				while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)) {
					echo "<option value='" . $row['id_tarea'] . "'>" . $row['tarea'] . " - " . $row['usuario_twitter'] . "</option>\n";
				}
			}
			?>
			</select><br>
		</div>
		<div class="col-xs-8 col-xs-offset-1">
			<button type="submit" class="btn btn-success glyphicon glyphicon-search"> Consultar</button><br><br>
		</div>
	</form>
	<br>
	<?php
if (isset($_GET['id_tarea'])) {
	$consulta = "SELECT * FROM tareas WHERE id_tarea = " . $_GET['id_tarea'] . ";";
	$Resultado = $Mysql->Consulta($consulta);
	$row = $Resultado->fetch_array(MYSQLI_ASSOC);

	$usuario = $row['usuario_twitter'];
	$hashtag = $row['hashtag'];
	$dia_inicio = $row['dia_inicio'];
	$dia_fin = $row['dia_fin'];
	$hora_inicio = $row['hora_inicio'];
	$hora_fin = $row['hora_fin'];

	echo "<div class='comments-container'>";
	echo "<h1>Itinerario <a href='#'>TweetMonitor</a></h1>";

	$consulta2 = "SELECT usuario, fecha, texto, hashtag FROM `tweets` WHERE hashtag LIKE '$hashtag' and usuario LIKE '$usuario' AND permiso LIKE '" . $_SESSION['Usuario'] . "' ORDER BY fecha DESC;";
	$Resultado2 = $Mysql->Consulta($consulta2);
	if ($Resultado2->num_rows > 0) {
		while ($row2 = $Resultado2->fetch_array(MYSQLI_ASSOC)) {
			echo "<ul id='comments-list' class='comments-list'>";
			echo "<li>";
			echo "<div class='comments-main-level'>";
			echo "<!--Avatar-->";
			echo "<div class='comment-avatar'><img src='../../imagenes/1.jpg' width='60' height='60'></div>";
			echo "<!--Contenedor del comentario-->";
			echo "<div class='comments-box'>";
			echo "<div class='comment-head'>";
			echo "<h6 class='comment-name by-author'><a href='#'> " . $row2['usuario'] . " </a> </h6>";
			echo "<span>" . date('d-m-Y H:i', strtotime($row2['fecha'])) . "</span>";
			echo "<i></i>";
			echo "</div>";
			echo "<div class='comment-content'>";
			echo "" . $row2['texto'] . "<br>";
			echo "" . ObtenerComentario($row2['fecha'], $dia_inicio, $dia_fin, $hora_inicio, $hora_fin) . "";
			echo "</div>";
			echo "</div>";
			echo "</div>";
			echo "</li>";
			echo "</ul>";
		}
	}
	$Mysql->CerrarConexion();
	echo "</div>";
}

function ObtenerComentario($fecha, $dia_inicio, $dia_fin, $hora_inicio, $hora_fin)
{
	$date = date(strtotime($fecha));
	if (date('N', $date) >= $dia_inicio && date('N', $date) <= $dia_fin) {
		if (date('H', $date) >= $hora_inicio && date('H', $date) <= $hora_fin) {
			return "Correcto";
		} else {
			echo "<div color = 'red'>";
			return "Comportamiento Extraño: Hora";
			echo "</div>";
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