<?php
function comprobarIntento($palabraAAdivinar, $letraUsuario, &$arrayLetrasAdivinadas)
{
    $letraCorrecta = false;

    for ($i = 0; $i < strlen($palabraAAdivinar); $i++) {
        if (strtolower($palabraAAdivinar[$i]) === strtolower($letraUsuario)) {
            $arrayLetrasAdivinadas[$i] = strtolower($letraUsuario);
            $letraCorrecta = true;
        }
    }
    return $letraCorrecta;
}

function transformarPalabraAArray($palabraAAdivinar)
{
    $arrayTransformado = [];
    for ($i = 0; $i < strlen($palabraAAdivinar); $i++) {
        $arrayTransformado[] = '_';
    }
    return $arrayTransformado;
}

function finDelJuego(array $arrayLetrasAdivinadas, array $error): int
{
    if (count($error) >= '4') {
        return 1;
    }
    foreach ($arrayLetrasAdivinadas as $letras) {
        if ($letras == '_') {
            return 0;
        }
    }
    
    return 2;
}


