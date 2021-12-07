<?php
// création ou continuation d'une session
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <ul>
        <li><a href="./">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="modo.php">Modo</a></li>
        <li><a href="redac.php">Rédacteur</a></li>
        <li><a href="tous.php">Tous</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
    <h1>Accueil</h1>
    <h2>Permissions</h2>
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