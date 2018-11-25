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
				<input type="hidden" name="id_usuario" value=<?php echo "'" . $_SESSION['IdUsuario'] . "'" ?> required><br>
				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Usuario Twitter:</h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<select class="form-control" name="usuario_twitter" id="sel1">
						<?php
							include_once "../Clases/MySQLConector.php";

							$Mysql = new MySQLConector();
							$Mysql->Conectar();

							$consulta = "SELECT DISTINCT usuario FROM `tweets` where permiso LIKE '" . $_SESSION['Usuario'] . "';";
							echo $consulta;
							$Resultado = $Mysql->Consulta($consulta);

							if ($Resultado->num_rows > 0) {
								while ($row = $Resultado->fetch_array(MYSQLI_ASSOC)) {
									echo "<option>" . $row['usuario'] . "</option>";
								}
							}
							$Mysql->CerrarConexion();
							?>
						</select>
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
						<input type="number" name="hora_inicio" min="0" max="23" value="8" class="form-control Input" required><br>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-xs-offset-1" for="Nombre">
						<h5>Hora de Fin (Formato 24hrs): </h5>
					</label>
					<div class="col-xs-8 col-xs-offset-1">
						<input type="number" name="hora_fin" min="0" max="23" value="12" class="form-control Input" required><br>
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