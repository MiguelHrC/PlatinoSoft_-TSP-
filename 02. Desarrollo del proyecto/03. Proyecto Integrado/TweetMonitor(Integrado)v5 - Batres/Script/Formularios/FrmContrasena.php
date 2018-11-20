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
                    
                        if (!isset($_POST['contrasena1']) && !isset($_POST['contrasena2'])) {                            
                    ?>
            <form method="POST" action="./FrmContrasena.php" class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-12 col-xs-offset-1" for="Contraseña">
                        <h4>Nueva Contraseña:</h4>
                    </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type=password name='contrasena1' required class="form-control Input">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-xs-12 col-xs-offset-1" for="Contraseña">
                        <h4>Confirmar Contraseña:</h4>
                    </label>
                    <div class="col-xs-8 col-xs-offset-1">
                        <input type=password name='contrasena2' required class="form-control Input">
                    </div>
                </div>


                <div class="container" align="center-block">
                    <div class="row">
                        <div class="col-xs-8 col-xs-offset-3">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="btn btn-success center-block" type="submit" name="Actualizar" value="Actualizar"></input>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php 
                }else{
                    $contrasena1 = $_POST['contrasena1'];
                    $contrasena2 = $_POST['contrasena2'];
                    //$Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT); 

                    include_once "../Clases/SQLControlador.php";

                    if ($contrasena1 == $contrasena2){
                        $SQLControlador = new SQLControlador();
                        
                        $Usuarios = new Usuarios();
                        $Usuarios -> setidUsuarios($idUsuario);
                        $Usuarios -> setContrasena(password_hash($contrasena1, PASSWORD_BCRYPT));

                        $SQLControlador -> ModificarContrasena($Usuarios);
                    }
                    else{
                        echo "Las contraseñas no coinciden";
                    }
                    

                    
                    }
                ?>
        </fieldset>
    </div>
    </div>
</body>
</html>