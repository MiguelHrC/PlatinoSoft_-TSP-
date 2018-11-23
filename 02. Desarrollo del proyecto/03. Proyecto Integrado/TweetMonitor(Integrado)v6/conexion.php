<?php
	// $host_db = "sql5c75f.carrierzone.com";
	// $user_db = "simapargco723098";
	// $pass_db = "losplatinos18";
	// $db_name = "platinosoft_simapargco723098";

	$host_db = "localhost";
	$user_db = "root";
	$pass_db = "";
	$db_name = "tweetmonitor";

	$conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);
	$conexion->query("SET NAMES 'utf8'");

	if ($conexion->connect_error) {
 		die("La conexion falló: " . $conexion->connect_error);
	}
?>