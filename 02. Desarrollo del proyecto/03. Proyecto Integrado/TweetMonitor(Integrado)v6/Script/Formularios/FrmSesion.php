<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION['Usuario'])) {
    Sesion();
} else {
    acceso();
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
            <a href="./Script/Formularios/FrmPerfil.php" class="btn btn-primary"><span class="glyphicon glyphicon-user">
                    <?php echo $_SESSION['Usuario']; ?></span></a>;
            <a href="./Script/Formularios/Salir.php" class="btn btn-danger"><span class="glyphicon glyphicon-log-out"> Salir</span></a>;
            </class>
    </nav>
<?php

}
}
?>