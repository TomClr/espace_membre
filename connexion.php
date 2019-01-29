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
                <input type="text" name="pseudo" id="pseudo">
            </div>
            <div class="form_elt">
                <label for="password">Entrez votre mot de passe : </label>
                <input type="password" name="password" id="password">
            </div>
            <input type="submit" value="se connecter">
        </form>
    </body>
</html>