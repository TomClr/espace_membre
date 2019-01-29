<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Connexion à l'espace membre</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>Veuillez vous connecter :</h1>
        <form action="connexion_post.php" method="POST">
            <div class="form_elt">
                <label for="pseudo">Entrez votre pseudo : </label>
                <input type="text" name="pseudo" id="pseudo" value="<?php 
                
                if (isset($_COOKIE['pseudo'])) {
                    echo $_COOKIE['pseudo'];
                } else {
                    echo '';
                }

                ?>" required>
            </div>
            <div class="form_elt">
                <label for="password">Entrez votre mot de passe : </label>
                <input type="password" name="password" id="password" value="<?php 
                
                if (isset($_COOKIE['password_hash'])) {
                    echo $_COOKIE['password_hash'];
                } else {
                    echo '';
                }
                
                ?>" required>
            </div>
            <div class="form_elt">
                <label for="connexion_auto">Connexion automatique </label>
                <input type="checkbox" name="connexion_auto" id="connexion_auto" <?php 
                
                if (isset($_COOKIE['pseudo']) AND isset($_COOKIE['password_hash'])) {
                    echo 'checked';
                } else {
                    echo '';
                }
                
                ?>>
            </div>
            <div class="form_elt">
                <label for="valider"><input type="submit" id="valider" value="se connecter"></label>
            </div>
            
        </form>
    </body>
</html>