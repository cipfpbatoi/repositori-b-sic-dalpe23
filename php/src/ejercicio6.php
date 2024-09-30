<?php
$nota = 10;
$resultadoNota = match ($nota) {
    10 => "Excelente",
    9, 8 => "Molt bé",
    5, 6, 7 => "bé",
    default => "Insuficient"
};
echo $resultadoNota;