<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $cadena = "hola caracola";
    $numeroVocales = 0;
    for($i=0;$i<strlen($cadena);$i++){
        if($cadena[$i] == "a" || $cadena[$i]  == "e" || $cadena[$i]  == "i" || $cadena[$i]  == "o" || $cadena[$i] == "u"){
            $numeroVocales++;
        }
        
    }
    echo "El resultado de vocales en la cadena '".$cadena."' es ".$numeroVocales;
    ?>
</body>
</html>