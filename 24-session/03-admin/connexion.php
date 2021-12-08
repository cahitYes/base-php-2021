<?php

// création ou continuation d'une session
session_start();

// si on est connecté (et que la connexion est toujours valide)
if (isset($_SESSION['myId']) && $_SESSION['myId'] == session_id()) {
    // on veut se connecter en étant déjà connecté, alors autant se déconnecter avant !
    header("location: deconnexion.php");
} else {
    $connect = false;
}

// création des utilisateurs et leurs persmissions
$login = ['admin', 'modo', 'redac'];
$pwd = ['123', '456', '789'];
$perm = [0, 1, 2]; // 0 => admin, 1 => moderateur, 2 => rédacteur

// Si il existe les 2 variables post et qu'elles ne sont pas vides (login, password)
if (isset($_POST['login'], $_POST['password']) && !empty($_POST['login']) && !empty($_POST['password'])) {
    // si le $_POST['login'] se trouve dans le tableau $login, on prend sa position (int vu que c'est un tableau associatif) ou on récupère false (pas dans le tableau)
    $pos = array_search($_POST['login'], $login);

    // si $pos ne vaut pas strictement false (non strictement 0 == false)
    if ($pos !== false) {
        $login[$pos];
        // si le mot de passe ne correspond pas
        if ($pwd[$pos] == $_POST['password']) {

            // on va créer nos variables de session
            $_SESSION['myId'] = session_id(); // on garde l'identifiant de session dans le fichier côté serveur
            $_SESSION['login'] = $login[$pos]; // on garde le nom de l'utilisateur
            $_SESSION['droit'] = $perm[$pos]; // droit gardé dans la session

            // redirection vers l'accueil
            header("location: ./");
        } else {
            $error = "Ce mot de passe ne correspond pas à l'utilisateur";
        }
    } else {
        $error = "Ce login n'existe pas";
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
    <?php
    include "menu.php";
    ?>
    <h1>Connexion</h1>
    <?php if (isset($error)) echo "<h3>$error</h3>" ?>
    <form name="lulu" action="" method="post">
        <input type="text" name="login" placeholder="Votre login" required /><br>
        <input type="password" name="password" placeholder="Votre password" required /><br>
        <input type="submit" value="envoyer" />
    </form>
</body>

</html>