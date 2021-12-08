<ul>
    <li><a href="./">Accueil</a></li>
    <li><a href="admin.php">Admin</a></li>
    <li><a href="modo.php">Modo</a></li>
    <li><a href="redac.php">Rédacteur</a></li>
    <li><a href="tous.php">Tous</a></li>
    <?php
    if ($connect) :
    ?>
        <li><a href="deconnexion.php">Déconnexion</a></li>
    <?php
    else :
    ?>
        <li><a href="connexion.php">Connexion</a></li>
    <?php
    endif;
    ?>

</ul>