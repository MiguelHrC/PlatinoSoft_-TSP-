<?php
if (!isset($_SESSION)) {
    session_start();
}
if (isset($_SESSION)){
    session_unset();
    unset ($_SESSION['Usuario']);
    session_destroy();
}
echo "<script language='javascript'>window.location='../../index.php'</script>";
