<?php
session_start();

// si on est déjà connecté, retour vers l'accueil
if (isset($_SESSION['id']) && $_SESSION['id'] == session_id()) {
    header("location: ./");
}

// si le formlaire a été envoyé (existence des 2 variables post Et qui ne sont pas vide)
if (isset($_POST['login'], $_POST['pwd']) && !empty($_POST['login']) && !empty($_POST['pwd'])) {

    // connexion ok avec a1
    if ($_POST['login'] == "a1" && $_POST['pwd'] == "a1") {

        // stockage du PHPSESSID dans la session même
        $_SESSION['id'] = session_id();
        $_SESSION['user'] = $_POST['login'];

        // redirection
        header("location: ./");

        // connexion ok avec a2
    } elseif ($_POST['login'] == "a2" && $_POST['pwd'] == "a2") {

        // stockage du PHPSESSID dans la session même
        $_SESSION['id'] = session_id();
        $_SESSION['user'] = $_POST['login'];

        // redirection
        header("location: ./");

        // connexion ok avec a3
    } elseif ($_POST['login'] == "a3" && $_POST['pwd'] == "a3") {

        // stockage du PHPSESSID dans la session même
        $_SESSION['id'] = session_id();
        $_SESSION['user'] = $_POST['login'];

        // redirection
        header("location: ./");

        // échec de connexion
    } else {
        $error = "Login et/ou mot de passe incorrecte";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>

<body>
    <h1>Connexion</h1>
    <pre><?php
            print_r($_SESSION);
            ?></pre>
    <?php
    include "menu.php";

    // si l'erreur de connexion existe, on l'affiche
    if (isset($error)) echo "<h4>$error</h4>";
    ?>
    <form action="" method="POST" name="connexion">
        <input type="text" name="login" placeholder="Votre login" required /><br>
        <input type="password" name="pwd" placeholder="Votre mot de passe" required /><br>
        <input type="submit" value="Connexion" />
    </form>
</body>

</html>