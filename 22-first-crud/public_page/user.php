<?php
// il doit y exister l'id ET il doit être numérique int positif ET ce n'est pas 0
if(isset($_GET['id']) &&
    ctype_digit($_GET['id'])&&
    !empty($_GET['id'])){

    // transtypage de string to int
    $iduser = (int) $_GET['id'];

    // requête préparée dans workbench
    $sql="SELECT u.idtheuser, u.theuserlogin,
    GROUP_CONCAT(a.idthearticle ORDER BY a.thearticledate DESC) AS idthearticle, 
    GROUP_CONCAT(a.thearticletitle ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticletitle,
    GROUP_CONCAT(SUBSTR(a.thearticletext,1,150) ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticletext, 
    GROUP_CONCAT(a.thearticledate ORDER BY a.thearticledate DESC SEPARATOR '|||') AS thearticledate
        FROM theuser u
            LEFT JOIN thearticle a
            ON u.idtheuser = a.theuser_idtheuser
        WHERE u.idtheuser = $iduser
    GROUP BY u.idtheuser
    ;";

    // exécution de la requête
    $request = mysqli_query($db,$sql) or die("Erreur lors de la requête avec jointures : ".mysqli_error($db));

    // si on a un résultat (ça a fonctionné 0 ou 1)
    if(mysqli_num_rows($request)){
        $result = mysqli_fetch_assoc($request);
    }else{
        // redirection
    header("Location: ./");
    die;
    }

// pas de variable id    
}else{
    // redirection
    header("Location: ./");
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First CRUD | User | <?= $result['theuserlogin']?></title>
  
</head>

    <?php
    // menu publique
    include "menu.php";
    ?>
    <pre>
        <?php print_r($result) ?>
    </pre>
    <h1>First CRUD | User | <?= $result['theuserlogin']?></h1>
    <?php
    // l'utilisateur n' a pas encore ecrit d'articles
    if empty($result['idthearticle'])):?>
    
    <h3>il n y a pas encore d'article ecrit par <?= $result['theuserlogin']?></h3>
   <?php
    else : 
            // on part du principe qu'on peut avoir plusieur articles ( une boucle d 'une iteration reste tres rapide à effecter)
            // on va utiliser la fonction eplode qui permet de couper une chaine de caractere suivant un separteur
            $idarticle = explode(","$result['idthearticle'])
            $titlearticle = explode("|||", $result['thearticletitle'])
            $textarticle = explode("|||", $result['thearticletext'])
            $datearticle = explode("|||", $result['thearticledate'])
    ?>
    hahahah 
    <?php
    endif;
    ?>
<body>   
</body>
</html>