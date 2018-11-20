<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Agregar tarea
	</title>
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
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="FrmItinerario.php">Itinerario</a></li>
		<li role="presentation" class="active"><a href="FrmAgregar_tarea.php">Agregar tarea</a></li>
		<li role="presentation"><a href="FrmConsultar_tareas.php">Consultar tareas</a></li>
	</ul>
	<?php
		if (!isset($_GET['tarea']) && !isset($_GET['id_usuario']) && !isset($_GET['usuario_twitter']) && !isset($_GET['hashtag']) && !isset($_GET['dia_inicio']) && !isset($_GET['dia_fin']) && !isset($_GET['hora_inicio']) && !isset($_GET['hora_fin'])) {
	?>
	<article class="main--content container" role="article">
		<div class="post--content">
			<form action="FrmAgregar_tarea.php" method="get">
				<legend class="hiddent-xs">
					<h3>Datos de la nueva tarea</h3>
				</legend>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Nombre de la tarea:</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="text" name="tarea" maxlength="20" class="form-control Input" required>
					</div>
				</div>
				<input type="hidden" name="id_usuario" value=<?php echo "'".$_SESSION['IdUsuario']."'" ?> required><br>
				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Usuario Twitter:</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="text" name="usuario_twitter" class="form-control Input" required><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Hashtag (Sin #): </h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="text" name="hashtag" class="form-control Input" required><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Dia de Inicio:</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<select name="dia_inicio" class="form-control Input">
							<option value="1">Lunes</option>
							<option value="2">Martes</option>
							<option value="3">Miercoles</option>
							<option value="4">Jueves</option>
							<option value="5">Viernes</option>
							<option value="6">Sabado</option>
							<option value="7">Domingo</option>
						</select><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Dia de Fin:</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<select name="dia_fin" class="form-control Input">
							<option value="1">Lunes</option>
							<option value="2">Martes</option>
							<option value="3">Miercoles</option>
							<option value="4">Jueves</option>
							<option value="5">Viernes</option>
							<option value="6">Sabado</option>
							<option value="7">Domingo</option>
						</select><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Hora de Inicio (Formato 24hrs):</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="number" name="hora_inicio" min="0" max="23" class="form-control Input" required><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Hora de Fin (Formato 24hrs): </h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="number" name="hora_fin" min="0" max="23" class="form-control Input" required><br>
					</div>
				</div>

				<div class="form-group">
					<div class="col-xs-8 col-xs-offset-1">
						<button type="submit" class="btn btn-success glyphicon glyphicon-plus"> Registrar</button><br>
					</div>
				</div>
			</form>

		</div>
	</article>
	<?php
} else {
	$tarea = $_GET['tarea'];
	$id_usuario = $_GET['id_usuario'];
	$usuario_twitter = $_GET['usuario_twitter'];
	$hashtag = $_GET['hashtag'];
	$dia_inicio = $_GET['dia_inicio'];
	$dia_fin = $_GET['dia_fin'];
	$hora_inicio = $_GET['hora_inicio'];
	$hora_fin = $_GET['hora_fin'];

	include_once "../Clases/SQLControlador.php";
	include_once "../Clases/Tareas.php";

	$Tareas = new Tareas();
	$Tareas->setTarea($tarea);
	$Tareas->setidUsuario($id_usuario);
	$Tareas->setUsuario_Tweeter($usuario_twitter);
	$Tareas->setHastag($hashtag);
	$Tareas->setDia_inicio($dia_inicio);
	$Tareas->setDia_Fin($dia_fin);
	$Tareas->setHora_Inicio($hora_inicio);
	$Tareas->setHora_Fin($hora_fin);

	$SQLControlador = new SQLControlador();
	$SQLControlador->AgregarTarea($Tareas);
}
?>
</body>

</html>