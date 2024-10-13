<?php
function inicialitzarGraella($filas, $columnas){ 
    $tabla = array();
        for ($fila = 0; $fila < $filas; $fila++) {
            for ($columna = 0; $columna < $columnas; $columna++) {
                $tabla[$fila][$columna] = 0;
        }
    }
    return $tabla;
}

function pintarGraella($graella) {
    echo "<table>";
    echo "<tr>";
    for($i=1;$i<=7;$i++){
        echo "<td><b>$i</b></td>";
    }
    echo "</tr>";
    foreach ($graella as $fila) {
        echo "<tr>";
        foreach ($fila as $celda) {
            if ($celda == 0) {
                echo "<td class='buid'></td>"; 
            } elseif ($celda == 1) {
                echo "<td class='player1'></td>"; 
            } elseif ($celda == 2) {
                echo "<td class='player2'></td>"; 
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

function ferMoviment(&$graella, $columna, $jugadorActual) {
    for ($fila = count($graella) - 1; $fila >= 0; $fila--) {
        if ($graella[$fila][$columna] == 0) {
            $graella[$fila][$columna] = $jugadorActual;
            return true;
        }
    }
    return false; 
}

function comprobarVictoria($graella, $jugador) {
    $filas = count($graella);
    $columnas = count($graella[0]);
    
    //Horizontal
    for ($fila = 0; $fila < $filas; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($graella[$fila][$columna] == $jugador &&
                $graella[$fila][$columna + 1] == $jugador &&
                $graella[$fila][$columna + 2] == $jugador &&
                $graella[$fila][$columna + 3] == $jugador) {
                return true; 
            }
        }
    }

    //Vertical
    for ($columna = 0; $columna < $columnas; $columna++) {
        for ($fila = 0; $fila <= $filas - 4; $fila++) {
            if ($graella[$fila][$columna] == $jugador &&
                $graella[$fila + 1][$columna] == $jugador &&
                $graella[$fila + 2][$columna] == $jugador &&
                $graella[$fila + 3][$columna] == $jugador) {
                return true; 
            }
        }
    }

    //Diagonal derecha
    for ($fila = 0; $fila <= $filas - 4; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($graella[$fila][$columna] == $jugador &&
                $graella[$fila + 1][$columna + 1] == $jugador &&
                $graella[$fila + 2][$columna + 2] == $jugador &&
                $graella[$fila + 3][$columna + 3] == $jugador) {
                return true; 
            }
        }
    }

    //Diagonal izq
    for ($fila = 3; $fila < $filas; $fila++) {
        for ($columna = 0; $columna <= $columnas - 4; $columna++) {
            if ($graella[$fila][$columna] == $jugador &&
                $graella[$fila - 1][$columna + 1] == $jugador &&
                $graella[$fila - 2][$columna + 2] == $jugador &&
                $graella[$fila - 3][$columna + 3] == $jugador) {
                return true; 
            }
        }
    }

    return false; 
}


function comprobarTableroLLeno($graella) {
    foreach ($graella as $fila) {
        foreach ($fila as $celda) {
            if ($celda == 0) {
                return false; 
            }
        }
    }
    return true; 
}
?>