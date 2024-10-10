<?php
session_start();
if(isset($_COOKIE['usuario'])){
    $_SESSION['user'] = $_COOKIE['usuario'];
    header('Location: welcome.php');
    exit();
}


$usuarios = [
    'dalpe2003@gmail.com' => '1234',
    'pepe23@hotmail.com' => '1234'
];

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
  
if(array_key_exists($email, $usuarios) && $password === $usuarios[$email]){
    $_SESSION['user'] = $email;
    if (isset($_POST['recordar'])) {
        setcookie(
            'usuario',
            $email,
            [
                'expires' => time() + 3600, // 1 hora
                'domain' => '', // Domini actual
                'secure' => true, // Només HTTPS
                'httponly' => true, // Només accessible via HTTP
                'samesite' => 'Lax' // o 'Strict' o 'None'
            ]
        );
    }
    header('Location: welcome.php');

} else {
    echo "correo o contraseña invalidos";
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="post">
        Email: <input type="email" name="email" required>
        Password: <input type="password" name="password" required>
        <button type="submit" name="login">Login</button>
        <br>
        <label for="recordar">recordar la proxima vez?<input type="checkbox" name="recordar" id="recordar"></label>
    </form>
</body>
</html>