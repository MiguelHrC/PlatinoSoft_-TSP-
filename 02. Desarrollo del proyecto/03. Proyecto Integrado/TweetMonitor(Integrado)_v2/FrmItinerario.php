<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/estilos.css">
    
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
                        require_once 'Bienvenida.php';
                        
                        ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<body align="center">
<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="FrmItinerario.php">Consultar Tweet</a></li>
  <li role="presentation"><a href="agregar_tarea.php">Agregar tarea</a></li>
  <li role="presentation"><a href="consultar_tareas.php">Consultar tareas</a></li>
</ul>
    <!--ul>
		<li><a href='consultar_tweet.php'>Consultar Tweet</a></li>
		<li><a href='agregar_tarea.php'>Agregar Tarea</a></li>
		<li><a href='consultar_tareas.php'>Consultar Tareas</a></li>
	</ul-->
	<form method="GET" action="consultar_tweet.php">
		Tarea: <select name="id_tarea">
<?php
	//require_once('conexion.php');
	include_once "MySQLConector.php";
	$Mysql = new MySQLConector();
    $Mysql->Conectar();
    
	$query = "SELECT * FROM tareas;";
	$result = $Mysql->query($query);

	if ($result->num_rows > 0) { 
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<option value='".$row['id_tarea']."'>".$row['tarea']." - ".$row['usuario_twitter']."</option>\n";
		}
	}
	$Mysql->CerrarConexion();
?>
		</select><br>
		<button type="submit">Consultar</button><br><br>
	</form>
<?php
	if (isset($_GET['id_tarea'])) {
		$query = "SELECT * FROM tareas WHERE id_tarea = ".$_GET['id_tarea'].";";
		$result = $conexion->query($query);
		$row = $result->fetch_array(MYSQLI_ASSOC);

		$usuario = $row['usuario_twitter'];
		$hashtag = $row['hashtag'];
		$dia_inicio = $row['dia_inicio'];
		$dia_fin = $row['dia_fin'];
		$hora_inicio = $row['hora_inicio'];
		$hora_fin = $row['hora_fin'];

		echo "<table border='1'>";
		    echo "<thead>";
		      	echo "<tr>";
			        echo "<th>Usuario</th>";
			        echo "<th>Fecha</th>";
			        echo "<th>Texto</th>";
			        echo "<th>Hashtag</th>";
			        echo "<th>Comentario</th>";
		      	echo "</tr>";
		    echo "</thead>";
		    echo "<tbody>";
		$comentario = "Sin Comentarios";
		include_once "MySQLConector.php";
	    $Mysql = new MySQLConector();
        $Mysql->Conectar();

		$query = "SELECT usuario, fecha, texto, hashtag FROM `tweets` WHERE hashtag LIKE '$hashtag' and usuario LIKE '$usuario';";
		$result = $Mysql->query($query);

		if ($result->num_rows > 0) { 
			while($row = $result->fetch_array(MYSQLI_ASSOC)){
				echo "<tr>";
				echo "<td>".$row['usuario']."</td>";
				echo "<td>".date('d-m-Y H:m', strtotime($row['fecha']))."</td>";
				echo "<td>".$row['texto']."</td>";
				echo "<td>".$row['hashtag']."</td>";
				echo "<td>".ObtenerComentario($row['fecha'], $dia_inicio, $dia_fin, $hora_inicio, $hora_fin)."</td>";
				echo "</tr>";
			}
		}
			echo "</tbody>";
		echo "</table>";
	}

	function ObtenerComentario($fecha, $dia_inicio, $dia_fin, $hora_inicio, $hora_fin){
		$date = date(strtotime($fecha));
		if (date('N', $date) >= $dia_inicio && date('N', $date) <= $dia_fin){
			if (date('H', $date) >= $hora_inicio && date('H', $date) <= $hora_fin){
				return "Correcto";
			}
			else{
				return "Comportamiento Extraño: Hora";
			}
		}
		else{
			if (date('H', $date) >= $hora_inicio && date('H', $date) <= $hora_fin){
				return "Comportamiento Extraño: Dia";
			}
			else{
				return "Comportamiento Extraño: Dia y Hora";
			}
		}
    }
    $Mysql->CerrarConexion();
?>
</body>
</body>
</div>
</html>