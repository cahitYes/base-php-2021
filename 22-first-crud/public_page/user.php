<?php
// il doit y exister l'id ET il doit être numérique int positif ET ce n'est pas 0
if(isset($_GET['id']) &&
    ctype_digit($_GET['id'])&&
    !empty($_GET['id'])){

    // transtypage de string to int
    $iduser = (int) $_GET['id'];

    $sql="";

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
    <title>First CRUD | User | <!-- ici le login de l'utilisateur --></title>
</head>
<body>
    <?php
    // menu publique
    include "menu.php";
    ?>
    <h1>First CRUD | User | <!-- ici le login de l'utilisateur --></h1>
</body>
</html>