<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>

<body>
    <h1>Accueil</h1>
    <pre><?php
            print_r($_SESSION);
            ?></pre>
    <ul>
        <li><a href="./">Accueil</a></li>
        <li><a href="1.php">Page 1</a></li>
        <li><a href="2.php">Page 2</a></li>
        <li><a href="3.php">Page 3</a></li>
        <li><a href="4.php">Page 4</a></li>
        <!-- affiché lorsqu'on est pas connecté, contient le formulaire de connexion -->
        <li><a href="connect.php">connexion</a></li>
        <!-- affiché lorsqu'on est connecté, contient la déconnexion réel de la session suivie d'une ridirection vers l'accueil -->
        <li><a href="disconnect.php">déconnexion</a></li>
    </ul>
    <h2>Les utilisateurs</h2>
    <h3>Accès 1</h3>
    <p>login et mot de passe : "a1", "a1"</p>
    <p>Accès à l'accueil, la page 1,2,3 et disconnect</p>
    <h3>Accès 2</h3>
    <p>login et mot de passe : "a2", "a2"</p>
    <p>Accès à l'accueil, la page 4 et disconnect</p>
    <h3>Accès 3</h3>
    <p>login et mot de passe : "a3", "a3"</p>
    <p>Accès à l'accueil, la page 2,3 et disconnect</p>
    <h3>Accès publique</h3>
    <p>Non connectés</p>
    <p>Accès à l'accueil et connect.php</p>
</body>

</html>