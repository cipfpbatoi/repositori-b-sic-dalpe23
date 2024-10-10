<?php
session_start();

    include('./funciones.php');

    $jugador1 = 1;
    $jugador2 = 2;
    $jugadorActual = $jugador1;
    $graella = inicialitzarGraella();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $columna = $_POST['columna'] - 1; 
        $jugadorActual = $_POST['jugadorActual']; 

    if (ferMoviment($graella, $columna, $jugadorActual)==true) {
            $jugadorActual =($jugadorActual == $jugador1) ? $jugador2 : $jugador1;
    }
}
    pintarGraella($graella);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>4enrattlla</title>
    <style>
        table { border-collapse: collapse; }
        td {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: 10px dotted #fff; /* Cercle amb punts blancs */
            background-color: #000; /* Fons negre o pot ser un altre color */
            display: inline-block;
            margin: 10px;
            color: white;
            font-size: 2rem;
            text-align: center;
            vertical-align: middle;
        }
        .player1 {
            background-color: red; /* Color vermell per un dels jugadors */
        }
        .player2 {
            background-color: yellow; /* Color groc per l'altre jugador */
        }
        .buid {
            background-color: white; /* Color blanc per cercles buits */
            border-color: #000; /* Puntes negres per millor visibilitat */
        }
    </style>
</head>
<body>

<form action="" method="post">
    <label for="columna"><b>Introduce la columna (1-7):</b></label>
    <input type="number" id="columna" name="columna" min="1" max="7" required>
    <input type="hidden" name="jugadorActual" value="<?php echo $jugadorActual; ?>">
    <button type="submit">Hacer movimiento</button> <br> <br>
    <a href="/proyectos/welcome.php">Volver al menú</a> 

</form>

</body>
</html>