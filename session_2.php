<?php

session_start();
echo 'Démarrage de la session.<br>';

$_SESSION['compteur'] = $_SESSION['compteur'] + 1;
echo 'Exemple d\'utilisation d\'une variable stockée en session.<br>';
echo 'Valeur de la variable <code>compteur</code> : ' . $_SESSION['compteur'];
