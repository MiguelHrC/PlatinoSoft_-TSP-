<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <?php
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['Usuario'])) {
        bienvenida();
    } else {
        acceso();
    }

    function bienvenida()
    {
        ?>
    <nav class="navbar navbar-light bg-light">
        <class="navbar-text">
            <a href="./FrmPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-user">
                    <?php echo $_SESSION['Usuario']; ?></span></a>;
            <a href="./Salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> Salir</span></a>;
            </class>
    </nav>
    <?php
}

function acceso()
{
    ?>
    <a href="./Script/Formularios/FrmLogin.php" class="btn btn-primary"><span class="glyphicon glyphicon-log-in">
            Ingresar</span></a>;
    <?php

}

function Sesion()
{
    if (isset($_SESSION['Loggedin']) && $_SESSION['Loggedin'] == true && $_SESSION['Usuario']) {
        ?>
    <nav class="navbar navbar-light bg-light">
        <class="navbar-text">
            <button type="button" class="btn btn-primary" id=BtnPerfil><span class="glyphicon glyphicon-user">
                    <?php echo $_SESSION['Usuario']; ?> </span></button>
            <button type="button" class='btn btn-danger' id=BTNsalir><span class="glyphicon glyphicon-log-out"> Salir</span></button>
            </class>
    </nav>
    <?php

}
}
?>
</body>

</html>