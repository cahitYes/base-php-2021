<?php
// création ou continuation d'une session
session_start();

// si on est connecté (et que la connexion est toujours valide)
if (isset($_SESSION['myId']) && $_SESSION['myId'] == session_id()) {
    $connect = true;
    // si l'utilisateur n'a pas le droit admin (0)
    //var_dump($_SESSION);
    if ($_SESSION['droit'] != 0) {
        header("Location: ./");
    }
} else {
    // pas connecté, on va sur index.php
    header("Location: ./");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <?php
    include "menu.php";
    ?>
    <h1>Admin</h1>
    <h2>Permissions seulement aux admin (droit 0)</h2>
    <pre><?php print_r($_SESSION) ?></pre>
    <h3>Admin</h3>
    <p>Peut naviguer sur ces pages :</p>
    <ul>
        <li>Accueil</li>
        <li>admin.php</li>
        <li>modo.php</li>
        <li>redac.php</li>
        <li>tous.php</li>
        <li>deconnexion.php</li>
    </ul>
    <h3>Modérateur</h3>
    <p>Peut naviguer sur ces pages :</p>
    <ul>
        <li>Accueil</li>
        <li>modo.php</li>
        <li>redac.php</li>
        <li>tous.php</li>
        <li>deconnexion.php</li>
    </ul>
    <h3>Rédacteur</h3>
    <p>Peut naviguer sur ces pages :</p>
    <ul>
        <li>Accueil</li>
        <li>redac.php</li>
        <li>tous.php</li>
        <li>deconnexion.php</li>
    </ul>
    <h3>Non connecté</h3>
    <p>Peut naviguer sur ces pages :</p>
    <ul>
        <li>Accueil</li>
        <li>tous.php</li>
        <li>connexion.php</li>
    </ul>
</body>

</html>