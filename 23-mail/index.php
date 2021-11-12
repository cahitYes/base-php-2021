<?php
// dépendances
require_once "config.php";

var_dump($_POST);

// si le formulaire a été envoyé
if(!empty($_POST)){
    // traîtement des variables (htmlspecialchars est souvant inutile sans insertion dans la DB)
    $thename = htmlspecialchars(trim($_POST['thename']),ENT_QUOTES);
    $themail = filter_var(trim($_POST['themail']), FILTER_VALIDATE_EMAIL);
    $thetext = htmlspecialchars(strip_tags(trim($_POST['thetext'])),ENT_QUOTES);
    // si au moins 1 équivalante à vide ou false
    if(empty($thename) || !$themail || empty($thetext)){
        // création d'une variable pour l'erreur
        $message = "Votre mail n'a pas été envoyé, veuillez recommencer";
    }else{
        $message = "Votre mail a bien été envoyé, merci";
    }
}

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
    <?php
    if(isset($message)):
    ?>
    <h3><?=$message?></h3>
    <?php
    endif;
    ?>
    <form action="" name="contact" method="POST">
        <input name="thename" placeholder="Votre nom" required /><br>
        <input name="themail" placeholder="Votre adresse mail" required /><br>
        <textarea name="thetext" placeholder="Votre texte" required></textarea><br>
        <input type="submit" value="Envoyer votre message"/>
    </form>
</body>
</html>