<?php
	session_start();
	if(!isset($_SESSION['Loggedin']) && !$_SESSION['Loggedin']){
    	echo "<script language='javascript'>window.location='FrmLogin.php'</script>";
    	exit;
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Modificar tarea</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Modificar Tarea</title>
	<link rel="stylesheet" href="./../../css/bootstrap.min.css">
	<link rel="stylesheet" href="./../../css/bootstrap-theme.css">
	<link rel="stylesheet" href="./../../css/estilos.css">
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
			<a class="navbar-brand" href="FrmItinerario.php">
				<img class='img-responsive' width='150' src='../../imagenes/logo.png' alt='Logo'>
			</a>
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
		<li role="presentation"><a href="FrmTweets.php">Tweets</a></li>
		<li role="presentation"><a href="FrmItinerario.php">Itinerario</a></li>
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
			$Consulta = "SELECT * FROM tareas WHERE id_tarea = " . $_GET['id_tarea'] . ";";
			$Resultado = $Mysql->Consulta($Consulta);
			$Row = $Resultado->fetch_array(MYSQLI_ASSOC);
			$Mysql->CerrarConexion();
	?>
	<form action="FrmModificar_tarea.php" method="get">
		<p></p>
		<input type="hidden" name="id_tarea" class="form-control Input" value='<?php echo $_GET['id_tarea'] ?>'>

		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Nombre de la Tarea:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<input type="text" name="tarea" maxlength="20" class="form-control Input" value='<?php echo $Row['tarea'] ?>' required><br>
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

				$Consulta = "SELECT DISTINCT usuario_twitter FROM permisos WHERE usuario_tweetmonitor LIKE '" . $_SESSION['Usuario'] . "';";
				$Resultado2 = $Mysql->Consulta($Consulta);

				if ($Resultado->num_rows > 0) {
					while ($Row2 = $Resultado2->fetch_array(MYSQLI_ASSOC)) {
						if ($Row2['usuario_twitter'] == $Row['usuario_twitter']) {
							echo "<option selected='true'>" . $Row2['usuario_twitter'] . "</option>";
						} else {
							echo "<option>" . $Row2['usuario_twitter'] . "</option>";
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
			<input type="text" name="hashtag" class="form-control Input" value='<?php echo $Row['hashtag'] ?>' required><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Dia de Inicio:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1 ">
			<select name="dia_inicio" class="form-control Input">
				<option <?php if ($Row['dia_inicio'] == 1) {
												echo "selected='true'";
											} ?> value="1">Lunes</option>
				<option <?php if ($Row['dia_inicio'] == 2) {
												echo "selected='true'";
											} ?> value="2">Martes</option>
				<option <?php if ($Row['dia_inicio'] == 3) {
												echo "selected='true'";
											} ?> value="3">Miercoles</option>
				<option <?php if ($Row['dia_inicio'] == 4) {
												echo "selected='true'";
											} ?> value="4">Jueves</option>
				<option <?php if ($Row['dia_inicio'] == 5) {
												echo "selected='true'";
											} ?> value="5">Viernes</option>
				<option <?php if ($Row['dia_inicio'] == 6) {
												echo "selected='true'";
											} ?> value="6">Sabado</option>
				<option <?php if ($Row['dia_inicio'] == 7) {
												echo "selected='true'";
											} ?> value="7">Domingo</option>
			</select><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Dia de Fin:
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<select name="dia_fin" class="form-control Input"	>
				<option <?php if ($Row['dia_fin'] == 1) {
												echo "selected='true'";
											} ?> value="1">Lunes</option>
				<option <?php if ($Row['dia_fin'] == 2) {
												echo "selected='true'";
											} ?> value="2">Martes</option>
				<option <?php if ($Row['dia_fin'] == 3) {
												echo "selected='true'";
											} ?> value="3">Miercoles</option>
				<option <?php if ($Row['dia_fin'] == 4) {
												echo "selected='true'";
											} ?> value="4">Jueves</option>
				<option <?php if ($Row['dia_fin'] == 5) {
												echo "selected='true'";
											} ?> value="5">Viernes</option>
				<option <?php if ($Row['dia_fin'] == 6) {
												echo "selected='true'";
											} ?> value="6">Sabado</option>
				<option <?php if ($Row['dia_fin'] == 7) {
												echo "selected='true'";
											} ?> value="7">Domingo</option>
			</select><br>
		</div>

		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Hora de Inicio (Formato 24hrs):
		</label>
		
		<div class="col-xs-5 col-xs-offset-1">
			<input type="number" name="hora_inicio" min="0" max="23"class="form-control Input" value="<?php echo $Row['hora_inicio'] ?>"><br>
		</div>
		
		<label class="col-xs-12 col-xs-offset-1" for="Nombre">
			Hora de Fin (Formato 24hrs):
		</label>

		<div class="col-xs-5 col-xs-offset-1">
			<input type="number" name="hora_fin" min="0" max="23" class="form-control Input" value="<?php echo $Row['hora_fin'] ?>"><br>
			<button type="submit" class="btn btn-success glyphicon glyphicon-pencil"> Modificar tarea</button>
		</div>	
	</form>
	<?php
		} else {
			$Id_Tarea = $_GET['id_tarea'];
			$Tarea = $_GET['tarea'];
			$Id_Usuario = $_GET['id_usuario'];
			$Usuario_Twitter = $_GET['usuario_twitter'];
			$Hashtag = $_GET['hashtag'];
			$Dia_Inicio = $_GET['dia_inicio'];
			$Dia_Fin = $_GET['dia_fin'];
			$Hora_Inicio = $_GET['hora_inicio'];
			$Hora_Fin = $_GET['hora_fin'];

			include_once "../Clases/SQLControlador.php";
			include_once "../Clases/Tareas.php";

			$Tareas = new Tareas();
			$Tareas->setidTarea($Id_Tarea);
			$Tareas->setTarea($Tarea);
			$Tareas->setidUsuario($Id_Usuario);
			$Tareas->setUsuario_Tweeter($Usuario_Twitter);
			$Tareas->setHastag($Hashtag);
			$Tareas->setDia_inicio($Dia_Inicio);
			$Tareas->setDia_Fin($Dia_Fin);
			$Tareas->setHora_Inicio($Hora_Inicio);
			$Tareas->setHora_Fin($Hora_Fin);

			$SQLControlador = new SQLControlador();
			$SQLControlador->ModificarTarea($Tareas);
		}
	?>
</body>

</html>