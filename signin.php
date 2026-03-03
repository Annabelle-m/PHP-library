<?php

include 'header.php';

?>
<?php

if (session_status() === PHP_SESSION_NONE) { // vérifie le statut de la session si active ou non
    session_start();                         // pour démarrer la session
}

$message = '';

if (isset($_POST['create'])) {
    if (
        empty($_POST['email']) &&
        empty($_POST['mdp'])
    ) {
        $message = 'Erreur : les champs obligatoires du formulaire sont vides.';
    } elseif (empty($_POST['email'])) {
        $message = 'Erreur : le champ "E-mail" du formulaire est vide.';
    } elseif (empty($_POST['mdp'])) {
        $message = 'Erreur : le champ "Mot de passe" du formulaire est vide.';
    } else {
        //Récuperer le mail et le mot de passe ici
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];

        //Connexion BDD
        $user = "root";
        $pass = "";


        try {

            $dbh = new PDO('mysql:host=localhost;dbname=egs', $user, $pass);
            $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //Requete SQL (à modifier) vous permettant de récupérer
            // les infos de l'utilisateur à qui correspond l'email récupéré
            //$sth=$dbh->prepare(); ...
            $queryLogIn = "SELECT email, password, roles, first_name, last_name FROM user WHERE email = :email"; // :email est un placeholder pour plus de sécurité
            $resultLogIn = $dbh->prepare($queryLogIn);
            $resultLogIn->execute([':email' => $email]);                //on remplace le placeholder par la variable email
            $session = $resultLogIn->fetch(PDO::FETCH_ASSOC);


            if ($session) {

                // Vérifier si le mot de passe correspond, si OUI, logguer
                // l'utilisateur en SESSION en stockant les infos 1 par 1 dans des variables
                if ($mdp === $session['password']) {
                    // Stocker les informations en session
                    $_SESSION['is_logged'] = true;
                    $_SESSION['user']['email'] = $session['email'];
                    $_SESSION['user']['roles'] = $session['roles'];
                    $_SESSION['user']['first_name'] = $session['first_name'];
                    $_SESSION['user']['last_name'] = $session['last_name'];


                    //Créer un message de bienvenue avec le prénom de l'utilisateur
                    //      $message= ""
                    $message = 'Bienvenue ' . $session['last_name'] . ' ' . $session['first_name'] . ' !';


                    // que le mot de passe soit correct (un message par erreur)
                    //      $message= ""
                } else {
                    $message = 'Mot de passe incorrect';
                }

                //Sinon Vérifier l'existence du mail ...
                //      $message= ""
            } else {
                $message = 'Ce mail n\'existe pas';
            }
        } catch (PDOException $e) {
            echo '' . $e->getMessage();
        }
    }
}
?>
<main>
    <article>
        <h2>Confirmation de connexion</h2>
        <p><?= $message ?></p>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </article>
</main>
<?php

include 'footer.php';

?>