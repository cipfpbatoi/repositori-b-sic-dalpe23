<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indice php</title>
</head>
<body>
    <?php

    include_once "./helpers/funciones.php";

$resultat = sumar(5, 3);  // $resultat conté 8

// Assignació de valors
$x = 5;
$y = "Hola món";

// Operacions aritmètiques
$suma = $x + 10;
$producte = $x * 2;

// Concatenació de cadenes
$nom = "Joan";
$salutacio = $y . ", " . $nom;

// Impressió de resultats
echo $y.'<br/>';  // Hola món
echo $suma.'<br/>';  // 15
echo $producte.'<br/>';  // 10
echo $salutacio.'<br/>';  // Hola món, Joan
echo $resultat;
?>
</body>
</html>

