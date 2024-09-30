<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php    
    $numeros = [66, 7, 8, 4, 20];
    $suma = 0;
    for($i=0;$i< count($numeros);$i++) {
        $suma += $numeros[$i];
        
    }
    $media = $suma / count($numeros);
    echo "La suma de los números introducidos es: " .$suma. " y su media es: " .$media;
    ?>
</body>
</html>