<?php
session_start();

// connexion obligatoire pour avoir accès à cette page
if (!isset($_SESSION['id']) || $_SESSION['id'] != session_id()) {
    header("location: ./");
    exit;
}

// si on est quelqu'un d'autre que le user "a1", on ne peut accéder à cette page
if ($_SESSION['user'] != "a1") {
    header("location: ./");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 1</title>
</head>

<body>
    <h1>page 1</h1>
    <pre><?php
            print_r($_SESSION);
            ?></pre>
    <?php
    include "menu.php";
    ?>
</body>

</html>