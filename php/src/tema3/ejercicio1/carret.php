<?php session_start();
//unset($_SESSION['carrito']);

$poma = 0;
$platan = 0;
$taronja = 0;

if (isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
}


 if (isset($_GET['el'])){
    $productoAEliminar = $_GET['el'];
    if($carrito[$productoAEliminar] >= 1 ){
         $carrito[$productoAEliminar]--;
    }
   $_SESSION['carrito'] = $carrito; //acordarse de actualizar siempre la variable al modificar
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
<h1>Afegir productes al carret</h1>
<?php 
    foreach($carrito as $producte => $quantitat): ?>
         <?= $producte ?>: <?=$quantitat ?> <a href="carret.php?el=<?= $producte ?>">Eliminar</a><br>
    <?php endforeach ?>
<br>

<a href = "./ejercicio1.php" > Volver al menu principal </a>
</body>
</html>