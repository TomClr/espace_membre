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
    </body>
</html>