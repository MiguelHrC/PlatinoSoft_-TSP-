<!DOCTYPE html>
<html>
<head>
	<title></title>
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
<body>
<ul class="nav nav-tabs">
  <li role="presentation"><a href="FrmItinerario.php">Consultar Tweet</a></li>
  <li role="presentation"><a href="agregar_tarea.php">Agregar tarea</a></li>
  <li role="presentation" class="active"><a href="consultar_tareas.php">Consultar tareas</a></li>
</ul>
<body>
	<p></p>
	<table id=table_tareas class="table table-striped table-hover" align="center">
		<thead>
		    <tr>
		    	<th></th>
			    <th>Usuario</th>
			    <th>Hashtag</th>
			    <th>Dia de Inicio</th>
			    <th>Dia de Fin</th>
			    <th>Hora de Fin</th>
			    <th>Hora de Fin</th>
			    <th></th>
			</tr>
		</thead>
		<tbody>
<?php
	require_once('conexion.php');
	
	$query = "SELECT * FROM tareas;";
	$result = $conexion->query($query);

	if ($result->num_rows > 0) { 
		while($row = $result->fetch_array(MYSQLI_ASSOC)){
			echo "<tr>";
			echo "<td>".$row['tarea']."</td>";
			echo "<td>".$row['usuario_twitter']."</td>";
			echo "<td>".$row['hashtag']."</td>";
			echo "<td>".NumeroADia($row['dia_inicio'])."</td>";
			echo "<td>".NumeroADia($row['dia_fin'])."</td>";
			echo "<td>".$row['hora_inicio']."</td>";
			echo "<td>".$row['hora_fin']."</td>";
			echo "<td>";
				echo "<a href='modificar_tarea.php?id_tarea=".$row['id_tarea']."'>Modificar </a>";
				echo "<a href='eliminar_tarea.php?id_tarea=".$row['id_tarea']."'>Eliminar</a>";
			echo "</td>";
			echo "</tr>";
		}
	}
		echo "</tbody>";
	echo "</table>";
	

	function NumeroADia($num){
		$dia = "";
		switch ($num) {
			case '1':
				$dia = "Lunes";
				break;
			case '2':
				$dia = "Martes";
				break;
			case '3':
				$dia = "Miercoles";
				break;
			case '4':
				$dia = "Jueves";
				break;
			case '5':
				$dia = "Viernes";
				break;
			case '6':
				$dia = "Sabado";
				break;
			case '7':
				$dia = "Domingo";
				break;
			default:
				$dia = "?";
				break;
		}
		return $dia;
	}
?>
</body>
</html>