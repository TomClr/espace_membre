<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Un espace membre en PHP</title>
        <link rel="stylesheet" href="./css/style.css">
    </head>
    <body>
        <h1>Inscription ou connexion à l'espace membre</h1>
        <div class="inscription">
            <form action="inscription_post.php" method="POST">
                <div class="form_elt">
                    <label for="pseudo">Choisissez votre pseudo : </label><input type="text" name="pseudo" id="pseudo">
                </div>
                <div class="form_elt">
                    <label for="password">Choisissez votre mot de passe : </label><input type="password" name="password" id="password">
                </div>
                <div class="form_elt">
                    <label for="password_confirmation">Confirmez votre mot de passe : </label><input type="password" name="password_confirmation" id="password_confirmation">
                </div>
                <div class="form_elt"> 
                    <label for="email">Renseignez votre adresse email : </label><input type="email" name="email" id="email">
                </div>
            </form>
        </div>
    </body>
</html>