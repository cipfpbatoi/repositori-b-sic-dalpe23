<?php
session_start();
// Destruir la sesión

unset($_SESSION['jugadorActual']); // Borra todas las variables de sesión
unset($_SESSION['graella']);
// Redirigir a la página principal del juego
header("Location: index.php"); 
exit();
?>
