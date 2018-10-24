<!DOCTYPE html>

<html lang="es">

<head>
	<meta charset='utf8'/>
	<meta name='viewport' content='width=device-width, initial-scale=1.0'>
	<meta name='description' content='Tweet Monitor'>
	<link rel='shortcut icon' type='image/x-icon' href=''>
	<link rel='stylesheet' href='css/style.css'>
	<title>Tweet Monitor - Inicio</title>
	<!-- JQuery -->
	<script src='js/jquery-3.2.1.min.js'></script>
	<!-- Bootstrap 3 -->
	<script src='js/bootstrap.min.js'></script>
	<link rel='stylesheet' href='css/bootstrap.min.css'>
	<link id='bsdp-css' rel='stylesheet' href='css/bootstrap-datepicker3.min.css'>
	<!-- Bootstrap Datepicker -->
	<script src='js/bootstrap-datepicker.min.js'></script>
	<script src='js/locales/bootstrap-datepicker.es.min.js'></script>
	<!-- TableSorter -->
	<script type='text/javascript' src='js/jquery.tablesorter.js'></script>
</head>
<body>
<?php
	$usuario = null;
	if(isset($_GET['usuario']))
	{
		$usuario = $_GET['usuario'];
	}
?>
<?php
	if(isset($_GET['fail']) && $_GET['fail'] = 'true')
	{
		echo "		<div class='alert alert-danger'>";
		echo "				<p><strong>Usuario o Contraseña Incorrecto</strong><p>";
		echo "		</div>";
	}
?>
	<div class="panel-group">
		<div class="container">
			<div class="col-lg-4"></div>
			<div class="col-lg-4">
				<h2>Iniciar Sesión</h2>
				<form action="check_login.php" method=post class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-lg-4" for="email">Usuario: </label>
						<div class="col-lg-8">
							<input class="form-control" value="<?php echo $usuario?>" name="usuario" type="text" required>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-lg-4" for="pwd">Contraseña: </label>
						<div class="col-lg-8">
							<input class="form-control" name="contrasena" type="password" required></p>
						</div>
					</div>
					<div>
						<input type="submit" name="Login" value="Login" class="btn btn-primary btn-block">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>	