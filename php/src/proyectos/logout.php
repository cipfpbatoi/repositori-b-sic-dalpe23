<?php
// Recuperamos la información de la sesión
session_start();

// Y la destruimos
session_destroy();

/*if(isset($_COOKIE['usuario'])){
    setcookie("usuario", "", 1);
}*/

header("Location: login.php");
?>