<?php

// il doit y exister l'id ET il doit être numérique int positif ET ce n'est pas 0
if(isset($_GET['id'])&&ctype_digit($_GET['id'])&&!empty($_GET['id'])){

    // transtypage de string to int
    $idarticle = (int) $_GET['id'];

    // requête dans une variable entre double guillemets
    $sql="SELECT a.idthearticle, a.thearticletitle, a.thearticletext, a.thearticledate,
    u.idtheuser, u.theuserlogin
FROM thearticle a
LEFT JOIN  theuser u 
ON u.idtheuser = a.theuser_idtheuser
WHERE a.idthearticle = $idarticle ;";

    // exécution de la requête
    $request = mysqli_query($db,$sql) or die("Erreur de Select : ".mysqli_error($db));

    // on va vérifier si on trouve 1 article. possibilité 1 ou 0 article
    if(mysqli_num_rows($request)){ // on a un article (1 == true)

        // on va mettre l'article en tableau associatif pour pouvoir l'afficher facilement en PHP
        $result = mysqli_fetch_assoc($request);

        // var_dump($result);

    }else{ // sinon (0 == false)

        // redirection vers l'erreur 404
        header("Location: ./?page=erreur404");
        exit; // on quitte pour éviter la lecture de la suite de la page sur certains serveur

    }


// pas de variable id    
}else{
    // redirection
    header("Location: ./");
    die;
}

// si le formulaire a été envoyé, le tableau POST n'est pas vide
if(!empty($_POST)){
    // création des variables locales protégées
    $titre = trim($_POST['titre']);  // on retire les espaces vides avant et derrière la chaîne
    $titre = strip_tags($titre); // retrait des tags html, js etc... 
    $titre = htmlspecialchars($titre,ENT_QUOTES);// encodage des caractères spéciaux avec les " et ' (ENT_QUOTES)

    $texte = htmlspecialchars(strip_tags(trim($_POST['texte'])),ENT_QUOTES);

    // conversion de l'id en entier
    $idAuteur = (int) $_POST['auteur'];

    // si différent qu'un numérique (0), transformation en 'NULL' pour SQL
    $idUser = $idAuteur ? $idAuteur : "NULL";
    //var_dump($idUser);
    

    // si tous les champs sont valides (sauf l'id auteur)
    if(!empty($titre)&&!empty($texte)){
        //$sql = "INSERT INTO thearticle (thearticletitle,thearticletext,theuser_idtheuser) VALUES('$titre','$texte',$idUser)";
        //$insert = mysqli_query($db,$sql) or die("Erreur lors de l'insertion : ".mysqli_error($db));

        // redirection
        header("Location: ./?page=admin");
        die();

    }

}


// sélection des utilisateurs pour le choix de l'auteur
$sql="SELECT idtheuser, theuserlogin FROM theuser 
      ORDER BY theuserlogin ASC";
$request = mysqli_query($db,$sql) or die("Erreur lors de la récupération des users : ".mysqli_error($db));

// si on a des auteurs (au moins 1)
if(mysqli_num_rows($request)){
    // on les mets dans tableau indexé contenant des tableaux associatifs
    $² = mysqli_fetch_all($request,MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First CRUD | Article | UPDATE</title>
</head>
<body>
    <?php
    // menu publique
    include "menu.php";
    ?>
    <!--<pre>
        <?php print_r($recupUser) ?>
        <?php print_r($_POST) ?>
    </pre>-->
    <h1>First CRUD | Article | UPDATE</h1>

    <form action="" name="insert" method="POST">
        <input type="text" name="titre" placeholder="title" minlength="2" maxlength="150" value="<?=$result['thearticletitle']?>" required/><br>
        <textarea name="texte" placeholder="your message" required></textarea><br>
        <select name="auteur">
            <option>---</option>
            <?php
            foreach($recupUser as $auteur){
                echo "<option value='".$auteur["idtheuser"]."'>{$auteur["theuserlogin"]}</option>";
            }
            ?>
            <input type="submit" value="Poster"/>
        </select>
    </form>
</body>
</html>