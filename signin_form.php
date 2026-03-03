<?php

include 'header.php';

?>
    <main>
        <form id="signin-form" action="signin.php" method="post">
            <fieldset>
                <legend>Formulaire de connexion</legend>
                <div>
                    <label id="lbl_email" for="email" class="required">Email<sup></sup></label>
                    <input id="email" name="email" type="text" required="required">
                </div>
                <div>
                    <label id="lbl_mdp" for="mdp" class="required">Mot de pass<sup></sup></label>
                    <input id="mdp" name="mdp" type="text" required="required">
                </div>
                <div>
                    <label></label> 
                    <input id="create" name="create" type="submit" value="Se connecter" class="info">
                    <input id="reset" name="reset" type="reset" value="Annuler" class="error">
                </div>
            </fieldset>
        </form>
        <p><a href="index.php" title="Retour à la liste des livres">Retour à la liste des livres</a></p>
    </main>
<?php

include 'footer.php';

?>