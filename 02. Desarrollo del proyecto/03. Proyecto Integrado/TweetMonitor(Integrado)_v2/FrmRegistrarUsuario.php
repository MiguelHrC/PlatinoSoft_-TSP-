<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Registro de usuario</title>
<script src="js/jquery.min.js" type="text/javascript"></script>
<link href="css/bootstrap.min.css" rel="stylesheet"/>    
<link href="css/bootstrap-theme.css" rel="stylesheet"/>
<link href="fonts/OleoScript-Regular.ttf" rel="stylesheet"/>
</head>
    
    <style>
        @font-face{
            font-family:fuentechida;
            src: url(fonts/OleoScript-Regular.ttf);
        }
        
        body{
            background-image: url(imagenes/apple.jpg);
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;
        }

        fieldset{
            transition: 2s;
            margin-bottom: 50px;

            border-color: #073B6C;
            border-style: groove;
            border-width: 5px;
            border-radius: 20px;
        }

        .formulario{
            width: 30%;
            transition: 2s;
            margin-top: 100px;
            box-shadow: 0px 0px 40px #073B6C, 0px 0px 80px white;
        }
        
        .logo{
            height: 100px;
            margin-top: 40px;
        }

        .espaciado{
            margin-top: 30px;
        }
        h3{
            color:  white;
            text-align: center;
           font: bold 100% monospace;
        }
        h4{
            color:  #1A1E23;
            text-align: center;
        }

        legend{
            border: none;
        }

        .Input{
            transition: .8s;
            background-color: rgba(0,0,0,.5);
            color: white;
            border-color: #006;
            border-bottom-color: white;
            border-bottom-style: groove;
            border-right: none;
            border-left: none;
            border-top: none;
            border-width: 6px;
        }

        .Input:hover{
            transition: .8s;
            background-color: rgba(55,71,79,.5);
            box-shadow: inset;
            border-bottom-color: #073B6C;
        }

        .Input:focus{
            transition: .8s;
            border-bottom-color: #073B6C;
        }

        @media screen and (max-width: 750px){
            .formulario{
                width: 95%;
                margin-top: 10px;
            }

            .logo{
                height: 100px;
            }
        }
    </style>
    
<body>
        <div class="container formulario">
            <div class="row">
                <div class="col-xs-4 col-xs-offset-4">
                    <img src="imagenes/avatar-transparent-2.png" class="logo center-block">
                </div>
            </div>
            
            <div class="espaciado">
                
            </div>

            <div class="row">
                <fieldset class="col-xs-10 col-xs-offset-1">
                    <legend class="hiddent-xs"><h3>Ingrese los datos del usuario</h3></legend>
                    <?php  
                        if (!isset($_POST['Nombre']) && !isset($_POST['Correo']) && !isset($_POST['Usuario']) && !isset($_POST['Contrasena'])) {
                    ?>
                    <form method="POST" action="FrmRegistrarUsuario.php" class="form-horizontal">
                        <div class="form-group">
                            <label class="col-xs-12" for="Nombre"><h4>Nombre:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=text name=Nombre required class="form-control Input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Correo"><h4>Correo:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=email name=Correo required class="form-control Input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Usuario"><h4>Usuario:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=text name=Usuario required class="form-control Input">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-xs-12" for="Contrasena"><h4>Contraseña:</h4></label>
                            <div class="col-xs-10 col-xs-offset-1">
                                <input type=password name=Contrasena required class="form-control Input">
                            </div>
                        </div>
                        <div class="form-group">
                        <input class="btn btn-success center-block " type="submit" name="Registrar" value="Registrar"></input>
                        <p></p><a href="FrmLogin.php"><input class="btn btn-danger center-block " type="submit" name="Agregar" value="Cancelar"></input></a>
                        
                        </div>
                    </form>
                    <?php 
                }else{
                    $Nombre = $_POST['Nombre'];
                    $Correo = $_POST['Correo'];
                    $Usuario = $_POST['Usuario'];
                    $Contrasena = $_POST['Contrasena']; 
                    //$Contrasena = password_hash($_POST['Contrasena'], PASSWORD_BCRYPT); 

                    include_once "SQLControlador.php";
                    include_once "Usuarios.php";

                    $Usuarios = new Usuarios();
                    $Usuarios -> setNombre($Nombre);
                    $Usuarios -> setCorreo($Correo);
                    $Usuarios -> setUsuario($Usuario);
                    $Usuarios -> setContrasena($Contrasena);

                    $SQLControlador = new SQLControlador();
                    $SQLControlador -> RegistrarUsuario($Usuarios);
                    echo "<script language='javascript'>alert('Registro exitoso')</script>";   
                    echo "<script language='javascript'>window.location='FrmLogin.php'</script>";
                    }
                ?>
                </fieldset>
            </div>
        </div>
         
</body>
</html>
