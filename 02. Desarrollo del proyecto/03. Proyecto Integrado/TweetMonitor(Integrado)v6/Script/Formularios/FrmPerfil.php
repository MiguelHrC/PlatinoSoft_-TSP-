<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./../../css/bootstrap.min.css">
    <link rel="stylesheet" href="./../../css/bootstrap-theme.css">
    <link rel="stylesheet" href="./../../css/estilos.css">
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
                            require_once 'FrmBienvenida.php';
                        ?>
                </form>
            </div>
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
                    require_once('../../conexion.php');
                    $Conexion = mysqli_connect("localhost", "root", "", "tweetmonitor");
                    $Consulta = mysqli_query($Conexion, "SELECT * FROM Usuarios where Usuario =  '$Us' limit 1;");
                    $Fila = mysqli_fetch_array($Consulta);
                    
                    $idUsuario = $Fila[0];
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
                    $Usuarios -> setidUsuarios($idUsuario);
                    $Usuarios -> setNombre($Nombrem);
                    $Usuarios -> setCorreo($Correom);
                    $Usuarios -> setUsuario($Usuario);

                    $SQLControlador = new SQLControlador();
                    $SQLControlador -> ModificarUsuario($Usuarios);
                    }
                ?>
        </fieldset>
    </div>
    </div>
</body>

</html>