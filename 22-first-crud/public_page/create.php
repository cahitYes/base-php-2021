<?php

// sélection des utilisateurs pour le choix de l'auteur
$sql="SELECT idtheuser, theuserlogin FROM theuser 
        ORDER BY theuserlogin ASC";
$request = mysqli_query($db,$sql) or die("Erreur lors de la récupération des users : ".mysqli_error($db));

// si on a des auteurs (au moins 1)
if(mysqli_num_rows($request)){
    // on les mets dans tableau indexé contenant des tableaux associatifs
    $recupUser = mysqli_fetch_all($request,MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First CRUD | Article | CREATE</title>
</head>
<body>
    <?php
    // menu publique
    include "menu.php";
    ?>
    <!--<pre>
        <?php print_r($recupUser) ?>
    </pre>-->
    <h1>First CRUD | Article | CREATE</h1>

    <form action="" name="insert" method="POST">
        <input type="text" name="titre" placeholder="title" minlength="2" maxlength="150" required/><br>
        <textarea name="texte" placeholder="your message" required></textarea><br>
        <select name="auteur">
            <option>--- Pas d'auteur</option>
            <?php
            foreach($recupUser as $auteur){
                echo "<option value='".$auteur["idtheuser"]."'>{$auteur["theuserlogin"]}</option>";
            }
            ?>
        </select>
    </form>
</body>
</html>