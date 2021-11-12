<?php
// dépendances
require_once "config.php";
var_dump($_POST);
// si le formulaire à été envoyé
if(!empty($_POST)){
    //traitement des variables (htmlspecialchar est souvent inutile sans insertion dans la DB)
    $thename = htmlspecialchars(trim($_POST['thename']),ENT_QUOTES);
    $themail = filter_var(trim ($_POST['themail']), FILTER_VALIDATE_EMAIL);
    $thetext = htmlspecialchars(strip_tags(trim($_POST["thetext"])),ENT_QUOTES);
// si au moin 1 équivalente à vide ou false
if(empty($thename)||!$themail ||empty($thetext)){
    //création d'une variable pour l'erreur
    $message ="Votre mail n'a pas été envoyé,veuillez recommencer";
}else{
    $message="votre mail a bien été envoyé"
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
    <?phpif(isset($message));
    ?>
    <h3><?=$message?></h3>
    <h1>Contactez-nous</h1>
    <form action="" name="contact" method="POST">
        <input name="thename" placeholder="votre nom" required /><br>
        <input name="themail" placeholder="votre mail" required /><br>
        <textarea name="thetext" placeholder="votre texte" required ></textarea><br>
        <INPUT type="submit" value="envoyer votre message"/>
        
        

    </form>
</body>
</html>