<?php

session_start();
echo 'Démarrage de la session.<br>';

if (!isset($_SESSION['compteur'])) {
    header('Location: session_1.php?redirect=1');
}

$_SESSION['compteur'] = $_SESSION['compteur'] + 1;
echo 'Exemple d\'utilisation d\'une variable stockée en session.<br>';
echo 'Valeur de la variable <code>compteur</code> : ' . $_SESSION['compteur'];
