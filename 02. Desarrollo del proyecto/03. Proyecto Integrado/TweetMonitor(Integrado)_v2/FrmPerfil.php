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
                        //Bienvenida();
                        ?>
                    </form>
                </div>
            </div>
        </nav>
    </header>
<body>

<div class="row">
                <fieldset class="col-xs-10 col-xs-offset-1">
                    <legend class="hiddent-xs"><h3>Ingrese los datos del usuario</h3></legend>
                    <?php  
                    $Us = $_SESSION['Usuario'];
                    require_once('conexion.php');
                    $Conexion = mysqli_connect("localhost", "root", "", "tweetmonitor");
                    $Consulta = mysqli_query($Conexion, "SELECT * FROM Usuarios where Usuario =  '$Us' limit 1;");
                    $Fila = mysqli_fetch_array($Consulta);
                    
                    $idUsuario = $Fila[0];
                    $Nombre = $Fila [1];
                    $Contrasena = $Fila [2];
                    $Correo = $Fila [3];
                    $Usuario = $Fila [4];
                    
                        if (!isset($_POST['Nombre']) && !isset($_POST['Correo']) && !isset($_POST['Usuario']) && !isset($_POST['Contrasena'])) {                            
                    ?>
                    <form method="POST" action="FrmPerfil.php" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="Nombre"><h4>Nombre:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=text name=Nombre required class="form-control Input" value=" <?php echo $Nombre; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Correo"><h4>Correo:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=email name=Correo required class="form-control Input" value=" <?php echo $Correo; ?>" disabled>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Usuario"><h4>Usuario:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=text name=Usuario required class="form-control Input" value=" <?php echo $Usuario; ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Contrasena"><h4>Contraseña:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=text name=Contrasena required class="form-control Input" value=" <?php echo $Contrasena; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                        <input class="btn btn-success center-block " type="submit" name="Registrar" value="Actualizar"></input>
                        <p></p><a href="FrmItinerario.php"><input class="btn btn-danger center-block " type="submit" name="Agregar" value="Cancelar"></input></a>
                        
                        </div>
                    </form>
                    <?php 
                }else{
                    $Nombrem = $_POST['Nombre'];
                    
                    $Usuariom = $_POST['Usuario'];
                    $Contrasenam = $_POST['Contrasena']; 
                    //$Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT); 

                    include_once "SQLControlador.php";
                    include_once "Usuarios.php";
                    
                    $Usuarios = new Usuarios();
                    $Usuarios -> setidUsuarios($idUsuario);
                    $Usuarios -> setNombre($Nombrem);
                    $Usuarios -> setCorreo($Correo);
                    $Usuarios -> setUsuario($Usuariom);
                    $Usuarios -> setContrasena($Contrasenam);

                    $SQLControlador = new SQLControlador();
                    $SQLControlador -> ModificarUsuario($Usuarios);

                    echo "<script language='javascript'>alert('Modificacion exitosa')</script>";   
                    echo "<script language='javascript'>window.location='FrmLogin.php'</script>";
                    }
                ?>
                </fieldset>
            </div>
</div>
</body>
</html>