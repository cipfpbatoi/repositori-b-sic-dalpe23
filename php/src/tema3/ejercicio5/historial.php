<?php
session_start();

if (isset($_SESSION['historial'])){
    $historial = $_SESSION['historial'];
}else{
    $historial = [];
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
<h1>Activitat de l'usuari</h1>
    <ul>
        <?php foreach ($historial as $historia): ?>
            <li><?php echo $historia; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>