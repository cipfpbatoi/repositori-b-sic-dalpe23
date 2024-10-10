<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo 'Bienvenido, ' . $_SESSION['user'] ?> <br> <br>
<a href="/proyectos/ofegat/ofegat.php">Ofegat</a> <br> 
<a href="/proyectos/4enratlla/index.php">4enRatlla</a> <br> <br>
<a href="logout.php">Cerrar sesión</a> <br>

</body>
</html>