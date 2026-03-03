<?php
include 'header.php';

if (
    empty($_POST['nom']) &&
    empty($_POST['prenom']) &&
    empty($_POST['email']) &&
    empty($_POST['mdp'])
) {
    $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
} elseif (empty($_POST['nom'])) {
    $message = 'Erreur : le champ "Nom" du formulaire est vide.';
} elseif (empty($_POST['prenom'])) {
    $message = 'Erreur : le champ "Prénom" du formulaire est vide.';
} elseif (empty($_POST['email'])) {
    $message = 'Erreur : le champ "E-mail" du formulaire est vide.';
} elseif (empty($_POST['mdp'])) {
    $message = 'Erreur : le champ "Mot de passe" du formulaire est vide.';
} else {
    //Récvupérer les infos du formulaires dans des variables ICI
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $pseudo = $_POST['pseudo'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];
    $propos = $_POST['propos'];
    $message = '';


    //Connexion BDD
    $user = "root";
    $pass = "";
    $dbh = new PDO('mysql:host=localhost;dbname=egs', $user, $pass);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        if (isset($_POST['create'])) {
            //Requete SQL via le mail
            $querySignIn = "SELECT email FROM user WHERE email = '$email'";
            $resultSignIn = $dbh->query($querySignIn);
            $userExists = $resultSignIn->fetch(PDO::FETCH_ASSOC);

            //Requete SQL via le pseudo
            $queryPseudo = "SELECT pseudo FROM user WHERE pseudo = '$pseudo'";
            $resultPseudo = $dbh->query($queryPseudo);
            $pseudoExists = $resultPseudo->fetch(PDO::FETCH_ASSOC);

            //Vérification des non doublons
            if ($userExists) {
                $message = "Cet email existe déjà.";
            } elseif ($pseudoExists){
                $message = "Ce pseudo existe déjà.";
            } else {
                //Si pas de doublon, on insère le nouvel utilisateur dans la BDD avec INSERT INTO
                // Remplacer par NULL si vide
                $propos = empty($propos) ? 'NULL' : "'$propos'";

                // Requête SQL pour l'insertion
                $query = "INSERT INTO user (first_name, last_name, pseudo, about, email, password, roles) ";
                $query .= "VALUES('$prenom', '$nom', $pseudo, $propos, '$email', '$mdp', 'ROLE_USER')";

                // Exécution de la requête
                $result = $dbh->exec($query);

                if ($result > 0) {
                    $message = "Inscription réussie. Vous pouvez maintenant vous connecter.";
                } else {
                    $message = "L'inscription n'a pas pu aboutir. Veuillez réessayer.";
                }
            }
        }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
}
?>
<main>
    <article>
        <h2>Retour d'inscription</h2>
        <p><?= $message ?></p>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </article>
</main>
<?php

include 'footer.php';

?>