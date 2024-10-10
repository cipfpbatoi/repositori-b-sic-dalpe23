<?php
session_start();

$usuarios = [
    'dalpe2003@gmail.com' => '1234',
    'pepe23@hotmail.com' => '1234'
];

if (isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
  
if(array_key_exists($email, $usuarios) && $password === $usuarios[$email]){
    $_SESSION['user'] = $email;
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
    </form>
</body>
</html>