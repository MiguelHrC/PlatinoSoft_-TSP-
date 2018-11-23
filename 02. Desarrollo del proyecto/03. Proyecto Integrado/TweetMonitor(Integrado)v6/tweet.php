<?php
	$usuario = null;
	$nombre_archivo = "log.txt";
	date_default_timezone_set("America/Mexico_City");
	require_once('conexion.php');

	$fecha = date('Y-m-d H:i:s');

	if(isset($_POST['usuario']))
	{
		//fecha = $_POST['fecha'];
		$usuario = $_POST['usuario'];
		$texto = $_POST['texto'];
		$hashtag = BuscarHashtag($texto);
		$permiso = BuscarPermiso($texto);

		$query = "INSERT INTO tweets 
		(usuario, fecha, texto, hashtag, permiso) 
		VALUES 
		('$usuario', '$fecha', '$texto', '$hashtag', '$permiso')";
		if ($conexion->query($query) === TRUE) {
			echo "Tweet agregado exitosamente!";
		} else {
			echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
		}
	}

	if($archivo = fopen($nombre_archivo, "a"))
	{
		fwrite($archivo, "User: ".$usuario." | Date: ".$fecha." | Text: ".$texto." \n");
    	fclose($archivo);
	}

	function BuscarHashtag($texto){
		$hashtag = "";
		if (stripos($texto,"#") > -1){
			$hash = stripos($texto,"#");
			if (stripos($texto," ",$hash) != false){
				$space = stripos($texto," ",$hash);
				$hashtag = substr($texto, $hash+1, $space-$hash-1);
			}
			else
			{
				$hashtag = substr($texto, $hash+1, strlen($texto)-$hash-1);
			}
		}
		return $hashtag;
	}

	function BuscarPermiso($texto){
		$permiso = "";
		if (stripos($texto,"$") > -1){
			$sign = stripos($texto,"$");
			if (stripos($texto," ",$sign) != false){
				$space = stripos($texto," ",$sign);
				$permiso = substr($texto, $sign+1, $space-$sign-1);
			}
			else
			{
				$permiso = substr($texto, $sign+1, strlen($texto)-$sign-1);
			}
		}
		return $permiso;
	}

?>