<?php
function comprobarIntento($palabraAAdivinar, $letraUsuario, &$arrayLetrasAdivinadas){
    $letraCorrecta = false;

    for($i = 0; $i < strlen($palabraAAdivinar); $i++){
        if(strtolower($palabraAAdivinar[$i]) === strtolower($letraUsuario)) {
            $arrayLetrasAdivinadas[$i] = strtolower($letraUsuario);
            $letraCorrecta = true;
        }
    }
    return $letraCorrecta;
}