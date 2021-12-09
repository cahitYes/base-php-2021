<ul>
    <li><a href="./">Accueil</a></li>
    <li><a href="1.php">Page 1</a></li>
    <li><a href="2.php">Page 2</a></li>
    <li><a href="3.php">Page 3</a></li>
    <li><a href="4.php">Page 4</a></li>
    <?php
    if (!isset($_SESSION['id']) || $_SESSION['id'] != session_id()) :
    ?>
        <li><a href="connect.php">connexion</a></li>
    <?php
    else :
    ?>
        <li><a href="disconnect.php">déconnexion</a></li>
    <?php
    endif;
    ?>
</ul>