<?php

include 'header.php';

?>
    <main>
        <form id="signup-form" action="signup.php" method="post">
            <fieldset>
                <legend>Formulaire d'inscription</legend>
                <div>
                    <label id="lbl_nom" for="nom" class="required">Nom<sup></sup></label>
                    <input id="nom" name="nom" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_prenom" for="prenom" class="required">Prenom<sup></sup></label>
                    <input id="prenom" name="prenom" type="text" required="required">
                </div>
                
                <div>
                    <label id="lbl_pseudo" for="pseudo" class="required">Pseudo<sup></sup></label>
                    <input id="pseudo" name="pseudo" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_email" for="email" class="required">Email<sup></sup></label>
                    <input id="email" name="email" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_mdp" for="mdp" class="required">Mot de pass<sup></sup></label>
                    <input id="mdp" name="mdp" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_propos" for="propos">A propos<sup></sup></label>
                    <textarea id="propos" name="propos"></textarea>
                </div>
                <div>
                    <label></label> 
                    <input id="create" name="create" type="submit" value="S'inscrire" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php

include 'footer.php';

?>