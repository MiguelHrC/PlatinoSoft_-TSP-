<!DOCTYPE html>
<html>

<head>
	<title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.css">
	<link rel="stylesheet" href="css/estilos.css">
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
				require_once 'Bienvenida.php';
			?>
				</form>
			</div>
		</div>
	</nav>
</header>

<body>
	<ul class="nav nav-tabs">
		<li role="presentation"><a href="FrmItinerario.php">Itinerario</a></li>
		<li role="presentation" class="active"><a href="agregar_tarea.php">Agregar tarea</a></li>
		<li role="presentation"><a href="consultar_tareas.php">Consultar tareas</a></li>
	</ul>
	<?php
		if (!isset($_GET['tarea']) && !isset($_GET['id_usuario']) && !isset($_GET['usuario_twitter']) && !isset($_GET['hashtag']) && !isset($_GET['dia_inicio']) && !isset($_GET['dia_fin']) && !isset($_GET['hora_inicio']) && !isset($_GET['hora_fin'])) {
	?>
	<div class="row center center-block">
		<div class="col-sm-6 col-md-4">
			<div class="caption">
				<div class="row">
					<fieldset class="col-xs-10 col-xs-offset-1">
						<form action="agregar_tarea.php" method="get" class="form-horizontal">
							<p></p>
							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Nombre de la tarea:</h5>
								</label>
								<div class="col-xs-12 ">
									<input type="text" name="tarea" maxlength="20" required><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Id Usuario:</h5>
								</label>
								<div class="col-xs-12 ">
									<input type="number" name="id_usuario" maxlength="20" required><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Usuario Tweet:</h5>
								</label>
								<div class="col-xs-12 ">
									<input type="text" name="usuario_twitter" required><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Hashtag (Sin #): </h5>
								</label>
								<div class="col-xs-12 ">
									<input type="text" name="hashtag" required><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Dia de Inicio:</h5>
								</label>
								<div class="col-xs-12 ">
									<select name="dia_inicio">
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
								<label class="col-xs-12" for="usuario">
									<h5>Dia de Fin:</h5>
								</label>
								<div class="col-xs-12 ">
									<select name="dia_fin">
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
								<label class="col-xs-12" for="usuario">
									<h5>Hora de Inicio (Formato 24hrs):</h5>
								</label>
								<div class="col-xs-12 ">
									<input type="number" name="hora_inicio" min="0" max="23" required><br>
								</div>
							</div>

							<div class="form-group">
								<label class="col-xs-12" for="usuario">
									<h5>Hora de Fin (Formato 24hrs): </h5>
								</label>
								<div class="col-xs-12 ">
									<input type="number" name="hora_fin" min="0" max="23" required><br>
								</div>
							</div>

							<div class="form-group">
								<div class="col-xs-12 ">
									<button type="submit" class="btn btn-success">Registrar Tarea</button>
								</div>
							</div>
						</form>
					</fieldset>
				</div>
			</div>
		</div>
	</div>
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

	include_once "SQLControlador.php";
	include_once "Tareas.php";

	$Tareas = new Tareas();
	$Tareas -> setTarea($tarea);
	$Tareas -> setUsuario_Tweeter($usuario_twitter);
	$Tareas -> setHastag($hashtag);
	$Tareas -> setDia_inicio($dia_inicio);
	$Tareas -> setDia_Fin($dia_fin);
	$Tareas -> setHora_Inicio($hora_inicio);
	$Tareas -> setHora_Fin($hora_fin);

	$SQLControlador = new SQLControlador();
	$SQLControlador->AgregarTarea($Tareas);
}
?>
</body>

</html>