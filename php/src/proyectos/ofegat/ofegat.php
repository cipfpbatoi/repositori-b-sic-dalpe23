<?php
session_start();

include('./funciones.php');
$paraulaAEndevinar = "Caracola";

if (!isset($_SESSION['error'])) {
    $_SESSION['error'] = [];
}

$error = $_SESSION['error'];

if (!isset($_SESSION['letrasCorrectasHistorial'])) {
    $_SESSION['letrasCorrectasHistorial'] = [];
}

$letrasCorrectasHistorial = $_SESSION['letrasCorrectasHistorial'];


if (!isset($_SESSION['arrayLetrasAdivinadas'])) {
    $_SESSION['arrayLetrasAdivinadas'] = transformarPalabraAArray($paraulaAEndevinar);
}

$arrayLetrasAdivinadas = $_SESSION['arrayLetrasAdivinadas'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $letraUsuario = $_POST['letra'];
    if (empty($letraUsuario)) {
        echo "Introduce una letra por favor";
    } else if (comprobarIntento($paraulaAEndevinar, $letraUsuario, $arrayLetrasAdivinadas) == false) {
        array_push($error, $letraUsuario);
    } else {
        array_push($letrasCorrectasHistorial, $letraUsuario);
    }
}

$_SESSION['arrayLetrasAdivinadas'] = $arrayLetrasAdivinadas;
$_SESSION['letrasCorrectasHistorial'] = $letrasCorrectasHistorial;
$_SESSION['error'] = $error;

$finDelJuego = finDelJuego($arrayLetrasAdivinadas, $error);

?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>ofegat</title>
    <style>
        .correct {
            color: green;
        }

        .incorrect {
            color: red;
        }
    </style>
</head>

<body>
    <?php if ($finDelJuego === 1) : ?>
        <h2>Fin del juego, has perdido.</h2>
    <? elseif ($finDelJuego === 2) : ?>
        <h2>Fin del juego, has ganado.</h2>
    <? else : ?>
        <form action="" method="post" enctype="multipart/form-data">
            <?php
            foreach ($arrayLetrasAdivinadas as $hueco) {
                echo $hueco . " ";
            } ?> <br><br>
            <div>
                <label for="letra">Letra: </label>
                <input type="text" id="letra" name="letra" value="<?php $letraUsuario ?>" maxlength="1">
                </label>
                <span class="correct">
                    <?php
                    foreach ($letrasCorrectasHistorial as $letras) {
                        echo $letras . ", ";
                    }
                    ?></span>
                <span class="incorrect"><?php
                                        foreach ($error as $errores) {
                                            echo $errores . ", ";
                                        }
                                        ?></span>

                <br></div> 
                <div>  <br>
                <button type="submit">Jugar</button><br> <br>
            </div>
        </form>
    <?php endif;  ?>
    <a href="reiniciar.php">Reiniciar Juego</a> <br> <br>
    <a href="/proyectos/welcome.php">Volver al menú</a>
</body>

</html>