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
		$permisos = BuscarPermiso($texto);

		if (strcasecmp($hashtag,"permiso") == 0){
			foreach ($permisos as $permiso) {
				$query = "INSERT INTO permisos 
				(usuario_twitter, usuario_tweetmonitor) 
				VALUES 
				('$usuario', '$permiso')";
				if ($conexion->query($query) === TRUE) {
					echo "Permiso agregado exitosamente!\n<br>";
				} else {
					echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
				}
			}
		}
		else{
			$query = "INSERT INTO tweets 
			(usuario, fecha, texto, hashtag) 
			VALUES 
			('$usuario', '$fecha', '$texto', '$hashtag')";
			if ($conexion->query($query) === TRUE) {
				echo "Tweet Agregado exitosamente!";
			} else {
				echo "Error en la consulta: ".$query."\n Error: ".$conexion->error; 
			}
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
		$inicio = 0;
		$contador = 0;
		$permiso = array();
		$ultimo = false;
		
		while (!$ultimo) { 
			$subcadena = substr($texto, $inicio, strlen($texto));
			if (stripos($subcadena,"$") > -1){
				$sign = stripos($subcadena,"$");
				if (stripos($subcadena," ",$sign) != false){
					$space = stripos($subcadena," ",$sign);
					if (substr($subcadena, $sign+1, $space-$sign-1) != ''){
						$permiso[$contador] = substr($subcadena, $sign+1, $space-$sign-1);
					}
					$contador++;
					$inicio += $space+1;
				}
				else
				{
					if (substr($subcadena, $sign+1, strlen($subcadena)-$sign-1)){
						$permiso[$contador] = substr($subcadena, $sign+1, strlen($subcadena)-$sign-1);
					}
					$ultimo = true;
				}
			}
			else
			{
				$ultimo = true;
			}
		}

		return $permiso;
	}

?>