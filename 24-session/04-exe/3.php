<?php
session_start();

if (!isset($_SESSION['id']) || $_SESSION['id'] != session_id()) {
    header("location: ./");
}

if ($_SESSION['user'] != "a1" && $_SESSION['user'] != "a3") header("location: ./");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page 3</title>
</head>

<body>
    <h1>page 3</h1>
    <pre><?php
            print_r($_SESSION);
            ?></pre>
    <?php
    include "menu.php";
    ?>
</body>

</html>