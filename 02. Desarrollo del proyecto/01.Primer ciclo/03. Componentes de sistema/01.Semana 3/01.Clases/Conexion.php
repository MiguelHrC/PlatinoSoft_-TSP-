<?php
     //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	$mysqli = new mysqli("localhost","id7461547_admin","losplatinos18","id7461547_tweetmonitor"); 
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}else{
	    echo 'Conexion con éxito';
	}
?>