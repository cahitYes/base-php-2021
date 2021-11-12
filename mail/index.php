<?php
// dépendances
require_once "config.php";
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez-nous</title>
</head>
<body>
    <h1>Contactez-nous</h1>
    <form action="" name="contact" method="POST">
        <input name="thename" placeholder="votre nom" required /><br>
        <input name="themail" placeholder="votre mail" required /><br>
        <textarea name="thetext" placeholder="votre texte" required ></textarea><br>
        <INPUT type="submit" value="envoyer votre message"/>
        
        

    </form>
</body>
</html>