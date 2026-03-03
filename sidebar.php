<?php
session_start();
?>
<nav>
    <ul>
        <li><a href="index.php">Liste des livres</a></li>
        <li><a href="book_search_form.php">Recherche</a></li>
        <li><a href="page_anonymous.php">Accès visiteur</a></li>
        <li><a href="page_user.php">Accès utilisateur</a></li>
        <li><a href="page_admin.php">Accès administrateur</a></li>

        <?php
        if (!isset($_SESSION['is_logged'])) {
            echo '<li><a href="signup_form.php">S\'inscrire</a></li>';
            echo '<li><a href="signin_form.php">Se connecter</a></li>';
        } else {
            echo '<li><a>Connecté</a></li>';
            echo '<li><a href="signout.php">Se déconnecter</a></li>';
        }
        ?>

    </ul>
</nav>