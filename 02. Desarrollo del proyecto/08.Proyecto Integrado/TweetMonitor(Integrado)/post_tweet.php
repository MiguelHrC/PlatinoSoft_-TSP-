<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<ul>
		<li><a href='FrmConsultar_tweet.php'>Consultar Tweet</a></li>
		<li><a href='FrmAgregar_tarea.php'>Agregar Tarea</a></li>
		<li><a href='FrmConsultar_tareas.php'>Consultar Tareas</a></li>
	</ul>
	<form action="tweet.php" method="post">
		Usuario: <input type="text" name="usuario" maxlength="20" required><br>
		Texto: <input type="text" name="texto" required><br>
		<button type="submit">Registrar</button>
	</form>
</body>
</html>