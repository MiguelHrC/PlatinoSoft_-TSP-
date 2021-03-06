<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TweetMonitor</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.css">
    <link rel="stylesheet" href="css/estilos.css">
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
            <a class="navbar-brand" href="Script/Formularios/FrmItinerario.php">
                <img class='img-responsive' width='150' src='imagenes/logo.png' alt='Logo'>
            </a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <form class="navbar-form navbar-right role=" navigation">
                <div class="form-group">
                    <class="navbar-text">
                        <?php
                            if (isset($_SESSION['Usuario'])) {
                        ?>
                        <nav class="navbar navbar-light bg-light">
                            <class="navbar-text">
                            <a href="./Script/Formularios/FrmPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-user">
                                    <?php echo $_SESSION['Usuario']; ?></span></a>
                            <a href="./Script/Formularios/Salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> Salir</span></a>
                                </class>
                        </nav>
                        <?php
                    } else {
                        ?>
                            <a href="./Script/Formularios/FrmLogin.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-in"> Ingresar</span></a>
                        <?php
                    }
                        ?>
                    </class>
                </div>
            </form>
        </div>
    </nav>
</header>

<body>
    <div class="text-center">
        <img class='img-fluid' width='50%' src='imagenes/logo_big.png' alt='Logo'>
    </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/funciones.js"></script>
</body>
</html>