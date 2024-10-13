<?php
session_start();

include('./funciones.php');

$jugador1 = 1;
$jugador2 = 2;
$finDelJuego = "";

if (!isset($_SESSION['graella'])) {
    $_SESSION['graella'] = inicialitzarGraella(6, 7);
}

$graella = $_SESSION['graella'];


if (!isset($_SESSION['jugadorActual'])) {
    $_SESSION['jugadorActual'] = $jugador1;
}

$jugadorActual = $_SESSION['jugadorActual'];



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $columna = $_POST['columna'] - 1;

    if (ferMoviment($graella, $columna, $jugadorActual) == true) {

        if (comprobarVictoria($graella, $jugadorActual)) {
            $finDelJuego = "El jugador " . $jugadorActual . " ha ganado la partida.";
        } elseif (comprobarTableroLleno($graella)) {
            $finDelJuego = "El tablero esta lleno.";
        } else
            $_SESSION['jugadorActual'] = ($jugadorActual == $jugador1) ? $jugador2 : $jugador1;
    }
}

$_SESSION['graella'] = $graella;
pintarGraella($graella);
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>4enrattlla</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php if ($finDelJuego) {
        echo "<h2>$finDelJuego</h2>";
    } else { ?>
        <form action="" method="post">
            <label for="columna"><b>Introduce la columna (1-7):</b></label>
            <input type="number" id="columna" name="columna" min="1" max="7" required>
            <button type="submit">Hacer movimiento</button> <br> <br>
        </form>
    <?php }  ?>

    <a href="/proyectos/welcome.php">Volver al menú</a> <br>
    <a href="reiniciar.php">Reiniciar Juego</a> <br> <br>

</body>

</html>