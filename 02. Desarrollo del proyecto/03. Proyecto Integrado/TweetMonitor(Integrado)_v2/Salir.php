<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                            
                        </form>
                    </div>
                </div>
            </nav>
        </header>
<body>
</body>
</html>
<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION)){
    session_unset();
    unset ($_SESSION['Usuario']);
    session_destroy();
}

echo "<script language='javascript'>window.location='index.php'</script>";
