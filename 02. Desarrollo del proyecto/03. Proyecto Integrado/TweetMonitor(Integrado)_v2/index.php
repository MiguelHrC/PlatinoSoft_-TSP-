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
    <body >
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
                            acceso();
                            ?>
                        </form>
                    </div>
                </div>
            </nav>
        </header>

        
        <?php
        /*
        if (!isset($_SESSION)) {
            session_start();
        }
        if (!isset($_SESSION['acceso'])) {
            echo "<section class='jumbotron'>"
            . "<div class='container'>"
            . "<h1>TweetMonitor</h1> "
            . "<h1>Sistema de monitoreo</h1>"
            . "</div> 
            . </section>";
        }
        */
        ?>
        
        <div class="jumbotron">
            <div class="container">
                <h1>TweetMonitor</h1>
                <h2>Sistema de monitoreo</h2>
            </div>
        </div>
        <section class="main">
            <div id="contenido">
                <?php
                //require_once 'script/menu.php';
                ?>
            </div>

            <div id="footer" align="center">
                En colaboracion con PlatinoSoft    
            </div>

        </section>
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/funciones.js"></script>
    </body>
</html>