<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="./../../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../css/bootstrap-theme.css">
    <link rel="stylesheet" href="./../../css/estilos.css">
    <link rel="stylesheet" href="./../../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../css/bootstrap-theme.css">
    <link rel="stylesheet" href="./../../css/estilos.css">
    <link rel="stylesheet" href="./../../css/main.css">
    <script src="./../../js/bootstrap.min.js"></script>
    <script src="./../../js/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
        crossorigin="anonymous">
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</head>
<header align="center">
    <?php
		if (!isset($_SESSION)) {
			session_start();
		}
	?>
    <nav class="navbar navbar-default" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Desplegar navegación</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="FrmItinerario.php">
                <img class='img-responsive' width='150' src='../../imagenes/logo.png' alt='Logo'>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <form class="navbar-form navbar-right role=" navigation">
                <div class="form-group">
                    <class="navbar-text">
                        <a href="./FrmPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-user">
                                <?php echo $_SESSION['Usuario']; ?></span></a>
                        <a href="./Salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> Salir</span></a>
                        </class>
                </div>
            </form>
        </div>
    </nav>
</header>

<body>
    <div class="row">
        <fieldset class="col-xs-8 col-xs-offset-1">
            <legend class="hiddent-xs">
                <h3>Modificar datos del usuario:
                    <?php echo $_SESSION['Usuario']?>
                </h3>
            </legend>
            <?php  
                    $Us = $_SESSION['Usuario'];
                    include_once "../Clases/MySQLConector.php";
                    $Mysql = new MySQLConector();
                    $Mysql->Conectar();
                    $Consulta = "SELECT * FROM Usuarios where Usuario =  '$Us' limit 1;";
                    $Resultado = $Mysql->Consulta($Consulta);
                    $Fila = mysqli_fetch_array($Resultado);
                    
                    $IdUsuario = $Fila[0];
                    $Nombre = $Fila [1];
                    $Correo = $Fila [3];
                    $Usuario = $Fila [4];
                    
                        if (!isset($_POST['Nombre']) && !isset($_POST['Correo']) && !isset($_POST['Usuario'])) {                         
            ?>
            <form method="POST" action="./FrmPerfil.php" class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-12 col-xs-offset-1" for="Nombre">
                        <h4>Nombre:</h4>
                    </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type=text name=Nombre required class="form-control Input" value="<?php echo $Nombre;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-xs-offset-1" for="Correo">
                        <h4>Correo:</h4>
                    </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type=email name=Correo required class="form-control Input" value="<?php echo $Correo;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-xs-offset-1" for="Usuario">
                        <h4>Usuario:</h4>
                    </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type=text name=Usuario required class="form-control Input" value="<?php echo $Usuario;?>"
                            disabled>
                    </div>
                </div>

                <div class="container-fluid" align="center-block">
                    <div class="row">
                        <div class="col-xs-6 col-md-4">
                            <input class="btn btn-success center-block" type="submit" name="Actualizar" value="Actualizar"></input>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="./FrmContrasena.php" class="btn btn-warning" name="Contrasena" value="Cambiar Contraseña">Cambiar Contraseña</a>
                        </div>
                        <div class="col-xs-6 col-md-4">
                            <a href="./FrmItinerario.php" class="btn btn-danger" name="Cancelar" value="Cancelar"> Cancelar</a>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                }else{
                    $Nombrem = $_POST['Nombre'];
                    $Correom = $_POST['Correo']; 
                    //$Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT); 

                    include_once "../Clases/SQLControlador.php";
                    include_once "../Clases/Usuarios.php";
                    
                    $Usuarios = new Usuarios();
                    $Usuarios -> setidUsuarios($IdUsuario);
                    $Usuarios -> setNombre($Nombrem);
                    $Usuarios -> setCorreo($Correom);
                    $Usuarios -> setUsuario($Usuario);

                    $SQLControlador = new SQLControlador();
                        if ($Nombre == $Nombrem && $Correo == $Correom){
                            echo "<script language='javascript'>alert('No se registraron cambios')</script>";
                            echo "<script language='javascript'>window.location='../Formularios/FrmPerfil.php'</script>";
                        }else{
                            $SQLControlador->ModificarUsuario($Usuarios);
                        }
                    }
                ?>
        </fieldset>
    </div>
    </div>
</body>

</html>