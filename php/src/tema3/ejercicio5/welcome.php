<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['historial'])){
    $_SESSION['historial'] = [];
}

// Mostra la pàgina només si l'usuari està autenticat
echo "Welcome, " . $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <br>
    <a href="/tema2/ofegat/ofegat.php">ofegat</a> <br> 
    <a href="/tema2/4enratlla/index.php">4 en ratlla</a> <br> <br>
    <a href="historial.php">Historial de usuario</a> <br>

    <a href="logout.php">Cerrar sesión</a> <br>
</body>
</html>