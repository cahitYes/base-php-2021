<?php
// Pour lancer une session, on utilise la fonction session_start(), qui va créer automatiquement un cookie nommé PHPSESSID lié à l'URL du domaine sur la machine de l'utilisateur, et un fichier texte temporaire du coté du serveur nommé sess_ID-de-session, qui fait le lien entre le navigateur de l'utilisateur et le server
session_start();

echo "<h3>session_start() lance une session et crée 2 fichier: </h3><p>un cookie PHPSESSID sur la machine utilisateur qui contient un id généré aléatoirement</p><p>un fichier dans le dossier tmp de apache, qui fera le lien avec le cookies</p>";

echo "<h3>L'ID de la session est stockée dans le cookie local, on peut le récupérer avec le session_id()</h3>";
echo "<p>" . session_id() . "</p>";
echo "<p>on sait donc qu'on a un fichier texte du côté serveur qui se nommera sess_" . session_id() . "</p>";
echo "<h3>En cas de suppression du coockie, session_start() va regénéré un id de session </h3><p>Par contre si on supprime le fichier temporaire il va recréer la session avec l'id du cookie! Il sera vide</p>";
echo "<h3>Ce coockie ne contient que l'identifiant de session</h3>";
// on va stocker des infos dans la session
$_SESSION['monIdDeSession'] = session_id(); // identification de session
$_SESSION['user'][] = date("Y-m-d H:i:s") . " - " . $_SERVER['REMOTE_ADDR'] . " - " . $_SERVER['REQUEST_METHOD'] . " - " . $_SERVER['PHP_SELF']; // récupérations de valeurs de l'utilisateur
var_dump($_SESSION);

echo "<h3>Lien vers une autre page sur le même site</h3>";
echo "<a href='02-session.php'>page 2</a>";
