<!DOCTYPE html>
<html>

<head>
	<title>Modificar tarea</title>
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
		<li role="presentation"><a href="FrmItinerario.php">Consultar Tweet</a></li>
		<li role="presentation"><a href="Frmagregar_tarea.php">Agregar tarea</a></li>
		<li role="presentation" class="active"><a href="FrmConsultar_tareas.php">Consultar tareas</a></li>
	</ul>

	<div class="col-xs-5 col-xs-offset-1">
		<legend class="hiddent-xs">
			<h3>Datos de la tarea</h3>
		</legend>
	</div>
	
	<?php
if (!isset($_GET['tarea']) && !isset($_GET['id_usuario']) && !isset($_GET['usuario_twitter']) && !isset($_GET['hashtag']) && !isset($_GET['dia_inicio']) && !isset($_GET['dia_fin']) && !isset($_GET['hora_inicio']) && !isset($_GET['hora_fin'])) {
	include_once "../Clases/MySQLConector.php";
	$Mysql = new MySQLConector();
	$Mysql->Conectar();
	$consulta = "SELECT * FROM tareas WHERE id_tarea = " . $_GET['id_tarea'] . ";";
	$Resultado = $Mysql->Consulta($consulta);
	$row = $Resultado->fetch_array(MYSQLI_ASSOC);
	$Mysql->CerrarConexion();
	?>
	<form action="FrmModificar_tarea.php" method="get">
		<p></p>
		<input type="hidden" name="id_tarea" class="form-control Input" value='<?php echo $_GET['id_tarea'] ?>'>

		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Nombre de la Tarea:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<input type="text" name="tarea" maxlength="20" class="form-control Input" value='<?php echo $row['tarea'] ?>' required><br>
		</div>

		<input type="hidden" name="id_usuario" value=<?php echo "'" . $_SESSION['IdUsuario'] . "'" ?> required><br>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Usuario de Twitter:
		</label>

		<div class="col-xs-5 col-xs-offset-1">
			<select class="form-control" name="usuario_twitter" id="sel1">
		<?php
	include_once "../Clases/MySQLConector.php";

	$Mysql = new MySQLConector();
	$Mysql->Conectar();

	$consulta = "SELECT DISTINCT usuario FROM `tweets` where permiso LIKE '" . $_SESSION['Usuario'] . "';";
	$Resultado2 = $Mysql->Consulta($consulta);

	if ($Resultado->num_rows > 0) {
		while ($row2 = $Resultado2->fetch_array(MYSQLI_ASSOC)) {
			if ($row2['usuario'] == $row['usuario_twitter']) {
				echo "<option selected='true'>" . $row2['usuario'] . "</option>";
			} else {
				echo "<option>" . $row2['usuario'] . "</option>";
			}

		}
	}
	$Mysql->CerrarConexion();
	?>
			</select>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Hashtag (Sin #):
		</label>

		<div class="col-xs-5 col-xs-offset-1">
			<input type="text" name="hashtag" class="form-control Input" value='<?php echo $row['hashtag'] ?>' required><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Dia de Inicio:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1 ">
			<select name="dia_inicio" class="form-control Input">
				<option <?php if ($row['dia_inicio'] == 1) {
												echo "selected='true'";
											} ?> value="1">Lunes</option>
				<option <?php if ($row['dia_inicio'] == 2) {
												echo "selected='true'";
											} ?> value="2">Martes</option>
				<option <?php if ($row['dia_inicio'] == 3) {
												echo "selected='true'";
											} ?> value="3">Miercoles</option>
				<option <?php if ($row['dia_inicio'] == 4) {
												echo "selected='true'";
											} ?> value="4">Jueves</option>
				<option <?php if ($row['dia_inicio'] == 5) {
												echo "selected='true'";
											} ?> value="5">Viernes</option>
				<option <?php if ($row['dia_inicio'] == 6) {
												echo "selected='true'";
											} ?> value="6">Sabado</option>
				<option <?php if ($row['dia_inicio'] == 7) {
												echo "selected='true'";
											} ?> value="7">Domingo</option>
			</select><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Dia de Fin:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<select name="dia_fin" class="form-control Input"	>
				<option <?php if ($row['dia_fin'] == 1) {
												echo "selected='true'";
											} ?> value="1">Lunes</option>
				<option <?php if ($row['dia_fin'] == 2) {
												echo "selected='true'";
											} ?> value="2">Martes</option>
				<option <?php if ($row['dia_fin'] == 3) {
												echo "selected='true'";
											} ?> value="3">Miercoles</option>
				<option <?php if ($row['dia_fin'] == 4) {
												echo "selected='true'";
											} ?> value="4">Jueves</option>
				<option <?php if ($row['dia_fin'] == 5) {
												echo "selected='true'";
											} ?> value="5">Viernes</option>
				<option <?php if ($row['dia_fin'] == 6) {
												echo "selected='true'";
											} ?> value="6">Sabado</option>
				<option <?php if ($row['dia_fin'] == 7) {
												echo "selected='true'";
											} ?> value="7">Domingo</option>
			</select><br>
		</div>

		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Hora de Inicio (Formato 24hrs):
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<input type="number" name="hora_inicio" min="0" max="23"class="form-control Input" value="<?php echo $row['hora_inicio'] ?>"><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Hora de Fin (Formato 24hrs):
		</label>

		<div class="col-xs-5 col-xs-offset-1">
			<input type="number" name="hora_fin" min="0" max="23" class="form-control Input" value="<?php echo $row['hora_fin'] ?>"><br>
			<button type="submit" class="btn btn-success">Modificar Tarea</button>
		</div>	
	</form>
<?php

} else {
	$id_tarea = $_GET['id_tarea'];
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
	$Tareas->setidTarea($id_tarea);
	$Tareas->setTarea($tarea);
	$Tareas->setidUsuario($id_usuario);
	$Tareas->setUsuario_Tweeter($usuario_twitter);
	$Tareas->setHastag($hashtag);
	$Tareas->setDia_inicio($dia_inicio);
	$Tareas->setDia_Fin($dia_fin);
	$Tareas->setHora_Inicio($hora_inicio);
	$Tareas->setHora_Fin($hora_fin);

	$SQLControlador = new SQLControlador();
	$SQLControlador->ModificarTarea($Tareas);
}
?>
</body>

</html>