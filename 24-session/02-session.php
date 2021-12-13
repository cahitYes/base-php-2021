<?php
// grâce au session_start, on va garder l'identifiant et le contenu de la session créé sur la page précédente
session_start();

$_SESSION['monIdDeSession'] = session_id(); // identification de session
$_SESSION['user'][] = date("Y-m-d H:i:s") . " - " . $_SERVER['REMOTE_ADDR'] . " - " . $_SERVER['REQUEST_METHOD'] . " - " . $_SERVER['PHP_SELF']; // récupérations de valeurs de l'utilisateur
$_SESSION['lulu'] = 5;

var_dump($_SESSION);

echo "<h3>Lien vers une autre page sur le même site</h3>";
echo "<a href='01-session_start.php'>page 1</a>";
