<?php

session_start();
echo 'Démarrage de la session.<br>';

$_SESSION['compteur'] = 0;
echo 'Exemple de stockage d\'une variable de session.<br>';

if (!empty($_GET['redirect'])) {
    echo 'Vous avez été redirigé vers cette page.';
}

// ...