<?php
// création ou continuation d'une session
session_start();

// si on est connecté (et que la connexion est toujours valide)
if (isset($_SESSION['myId']) && $_SESSION['myId'] == session_id()) {
    $connect = true;
} else {
    $connect = false;
}
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
    <?php
    include "menu.php";
    ?>
    <h1>Accueil <?php if ($connect) : ?> | Bienvenue <?= $_SESSION['login'] ?> |
            <?php
                    switch ($_SESSION['droit']):
                        case 0:
                            echo " Administrateur";
                            break;
                        case 1:
                            echo " Modérateur";
                            break;
                        default:
                            echo " Rédacteur";


                    endswitch;
            ?>
        <?php endif ?></h1>

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