<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    echo "Tabla del número 5 <br>";
    echo "<br>";
    $tablaDel5 = [];
    for($i=1;$i<11;$i++){
        for($j=1;$j<11;$j++){
            $array[$i][$j] = $i * $j;
        }
    }

    for($i=5;$i<6;$i++){
        for($j=1;$j<11;$j++){
           echo $i. " * " .$j. " = ". $array[$i][$j]."<br>";
        }
        echo "<br>";
    }
    ?>
</body>
</html>