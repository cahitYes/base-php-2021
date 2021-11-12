<?php

// dépendances
require_once "config.php";

// modification de variables de configuration du serveur, utile pour le mail sur un serveur local (change le contenu de php.ini pour cette page seulement), inutile d'utiliser ini_set pour envoyer un mail sur un serveur distant, il suffit de paramétrer le smtp comme dans votre doc (gmail.com outlook etc...)
ini_set('SMTP',SMTP_HOST);
ini_set('smtp_port',SMTP_PORT);
ini_set('sendmail_from',MAIL_ADMIN);

var_dump($_POST);

// si le formulaire a été envoyé
if(!empty($_POST)){
    // traîtement des variables (htmlspecialchars est souvant inutile sans insertion dans la DB)
    $thename = htmlspecialchars(trim($_POST['thename']),ENT_QUOTES);
    $themail = filter_var(trim($_POST['themail']), FILTER_VALIDATE_EMAIL);
    $thetext = strip_tags(trim($_POST['thetext']));
    // si au moins 1 équivalante à vide ou false
    if(empty($thename) || !$themail || empty($thetext)){
        // création d'une variable pour l'erreur
        $message = "Votre mail n'a pas été envoyé, veuillez recommencer";
    }else{
        // on va créer nos variables pour l'envoi des mails

        // premier, envoi du mail à l'admin
        $aQui   = MAIL_ADMIN;
        $sujet = 'Réponse à votre formulaire 23-mail';
        $message = $thename." à écrit : \n".$thetext;
        $entete = array(
             'From' => "$themail",
             'Reply-To' => "$themail",
             'X-Mailer' => 'PHP/' . phpversion()
        );

        mail($aQui, $sujet, $message, $entete);

        // mail($themail, 'Depuis 23-mail', $thename." à écrit : \n".$thetext);
        // création de la variable de confirmation
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