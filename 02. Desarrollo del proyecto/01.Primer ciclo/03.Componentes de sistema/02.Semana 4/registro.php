<?php
	session_start();
?>

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
	<nav class="navbar navbar-default">
  		<div class="container-fluid">
    		<div class="navbar-header">
      			<a class="navbar-brand" href="#">TweetMonitor</a>
    		</div>
		    <ul class="nav navbar-nav">
		      	<li class="active"><a href="#">Registro</a></li>
		    </ul>
  		</div>
	</nav>
			<ul class='nav navbar-nav'>
			<div class="container">
				<div class="col-lg-2"></div>
				<div class="col-lg-8"><h1>Registrar Usuario</h1></div>
			</div>
			<div class="container">
				<form action="...php" method="post" class="form-horizontal"> 
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<div class="form-group row">
							<label class="control-label col-lg-2">Usuario: </label>
							<div class="col-lg-6">
								<input class="form-control" type="text" name="usuario" maxlength="12" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-lg-2">Correo Electronico: </label>
							<div class="col-lg-6">
								<input class="form-control" type="text" name="correo_electronico" required>
							</div>
						</div>
						<div class="form-group row">
							<label class="control-label col-lg-2">Contraseña: </label>
							<div class="col-lg-6">
								<input class="form-control uppercase" type="password" name="contrasena" maxlength="12" required>
							</div>
						</div>
					</div>
					<div class="col-lg-4"></div>
					<div class="col-lg-4 row">
						<div class="form-group">
							<button type="submit" class="btn btn-primary btn-block">Registrar</button>
						</div>
					</div>
				</div>
				</form>
			</div>
</body>
</html>	