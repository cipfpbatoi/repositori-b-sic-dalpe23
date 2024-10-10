<?php session_start();
//unset($_SESSION['carrito']);
$poma = 0;
$platan = 0;
$taronja = 0;

if (isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
}else{
    $carrito = [];
}

if (isset($_POST['producte'])){
    $cantidad = $_POST['producte'];
    if (isset($carrito[$cantidad])){
        $carrito[$cantidad]++;
    } else {
        $carrito[$cantidad] = 1;
    }

    $_SESSION['carrito'] = $carrito;
 }
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Selecció de productes</title>
</head>
<body>


    <h1>Afegir productes al carret</h1>
    <form method="POST">
        <label for="producte">Tria un producte:</label>
        <select name="producte" id="producte">
            <option value="Poma">Poma</option>
            <option value="Plàtan">Plàtan</option>
            <option value="Taronja">Taronja</option>
        </select>
        <input type="submit" value="Afegir al carret">
    </form>
    <a href="carret.php">Veure carret</a>
</body>
</html>