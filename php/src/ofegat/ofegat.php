<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>ofegat</title>
    <style>
        .correct { color: green; }
        .incorrect { color: red; }
    </style>
</head>
<body>

<?php
        include('./funciones.php');

            $error = "";  
            $letrasCorrectasHistorial = "";
            $paraulaAEndevinar = "Caracola";
        
            $arrayLetrasAdivinadas = ['_', '_', '_', '_', '_', '_', '_', '_']; 
            

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $letraUsuario = $_POST['letra'];
            if(empty($letraUsuario)){
                $error = "Introduce una letra por favor";
            } else if (comprobarIntento($paraulaAEndevinar, $letraUsuario, $arrayLetrasAdivinadas) == false){
                $error = "Error, la letra '$letraUsuario' no esta en la palabra";  
            } else {
                $letrasCorrectasHistorial = "Historial de letras correctas: ". strtolower($letraUsuario);
            }
        }
        
        ?>

<form action="" method="post" enctype="multipart/form-data">
        <?php 
                foreach($arrayLetrasAdivinadas as $hueco){ 
                    echo $hueco." ";
            }?>
                <br><br>

    <div>
    <label for="letra">Letra: </label>
    <input type="text" id="letra" name= "letra" value="<?php $letraUsuario ?>"maxlength="1" > 
    </label> 

    <span class="correct"><?php echo $letrasCorrectasHistorial?></span>
    <span class="incorrect"><?php echo $error?></span>

    <br>
    </div>

    <div>
    <br>
        <button type="submit">Jugar</button>
    </div>
</form>
</body>
</html>

