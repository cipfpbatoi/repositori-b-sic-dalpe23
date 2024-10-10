<?php
session_start();

$users = [
    'dalpe2003@gmail.com' => '1234',
    'user2@example.com' => 'password2',
];

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (array_key_exists($email, $users) && $password === $users[$email]) {
        $_SESSION['user'] = $email;
        }
        header('Location: welcome.php');
        exit();
    } else {
        echo "Invalid email or password.";
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