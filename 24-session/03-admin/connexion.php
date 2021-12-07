<?php
// création des utilisateurs et leurs persmissions
$login = ['admin', 'modo', 'redac'];
$pwd = ['123', '456', '789'];
$perm = [0, 1, 2]; // 0 => admin, 1 => moderateur, 2 => rédacteur
// création ou continuation d'une session
session_start();
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
    <ul>
        <li><a href="./">Accueil</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="modo.php">Modo</a></li>
        <li><a href="redac.php">Rédacteur</a></li>
        <li><a href="tous.php">Tous</a></li>
        <li><a href="connexion.php">Connexion</a></li>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    </ul>
    <h1>Connexion</h1>

</body>

</html>