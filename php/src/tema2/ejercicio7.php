<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Formulari de Contacte</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nom = htmlspecialchars($_POST['nom']);
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);
            $password2 = htmlspecialchars($_POST['password2']);
            $error = [];  
    
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error[] = "<p>Adreça de correu electrònic no vàlida. Si us plau, torna-ho a intentar.</p>";
            }
            if (empty($nom)) {
                $error[] = "<p>El nombre esta vacío.</p>";
            }
            if ($password != $password2) {
                $error[] = "<p>Las contraseñas no coinciden.</p>";
            }
    
            if (!empty($error)) {
                foreach ($error as $err) {
                    echo $err;
                }
            } else {
                echo "<h2>Gràcies per contactar-nos!</h2>";
                echo "<p>El teu nom: $nom</p>";
                echo "<p>El teu correu electrònic: $email</p>";
                echo "<p>Tu contraseña es: $password</p>";
            }
    } else {
        ?>
        <h2>Formulari de Contacte</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name= "nom" required></label><br><br>
            <label for="email">Correu electrònic:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required></textarea><br><br>
            <label for="password2">Repetir Password:</label><br>
            <input type="password" id="password2" name="password2" required></textarea><br><br>
            <input type="submit" value="Enviar">
        </form>
        <?php
    }
    ?>
</body>
</html>