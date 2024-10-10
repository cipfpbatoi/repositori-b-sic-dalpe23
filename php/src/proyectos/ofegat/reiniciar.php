<?php
session_start();
// Destruir la sesión

unset($_SESSION['arrayLetrasAdivinadas']); // Borra todas las variables de sesión
unset($_SESSION['letrasCorrectasHistorial']);
unset($_SESSION['error']);
// Redirigir a la página principal del juego
header("Location: ofegat.php"); 
exit();
?>
