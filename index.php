<?php 

session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <title>Espace Membre</title>
    </head>
    <body>
        <h1>Bienvenue dans l'espace membre <?php echo $_SESSION['pseudo'] ?> !</h1>

        <form action="avatar.php" method='POST' enctype="multipart/form-data">
            <p>Vous souhaitez envoyer votre avatar ?</p>
            <input type="file" name="avatar">
            <input type="submit" value="envoyer le fichier">

        </form>

        <p><a href="deconnexion.php">se déconnecter</a></p>
    </body>
</html>