<?php
function inicialitzarGraella(){
    $filas = 6;
    $columnas = 7;
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
?>