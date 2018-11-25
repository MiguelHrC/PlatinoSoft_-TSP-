<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
	<meta charset="utf-8">
	<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
	<?php  
	if (!isset($_GET['Usuario']) && !isset($_GET['Contrasena'])) {
	?>
			<form method="GET" action="Iniciar_Sesion.php">
				Usuario: <input type="text" name="Usuario" required><br>
				Contraseña: <input type="password" name="Contrasena" required><br>
				<input type="submit" name="Agregar" value="Iniciar Sesion">
			</form>

	<?php 
	}else{
		$Usuario = $_GET['Usuario'];
		$Contrasena = $_GET['Contrasena']; 

		include_once "SQLPerfil.php";
		include_once "Perfil.php";

		$Perfil = new Perfil();
		$Perfil -> setUsuario($Usuario);
		$Perfil -> setContrasena($Contrasena);

		$SQLPerfil = new SQLPerfil();
		if ($SQLPerfil -> IniciarSesion($Perfil)){
			echo "El Usuario y Contraseña son Correctos!";
			$_SESSION['Loggedin'] = true;
			$_SESSION['Usuario'] = $Usuario;
		}
		else
		{
			echo "Usuario o Contraseña Incorrectos!";
		}
	}

	 ?>
</body>
</html>