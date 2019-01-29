<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');
}

catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
};

$pseudo = $_POST['pseudo'];
$pass = $_POST['password'];
$pass_confirm = $_POST['password_confirmation'];
$email = $_POST['email'];

$reponse = $bdd->query('SELECT pseudo FROM espace_membre');
$donnee=$reponse->fetch();

    if ($pseudo !== $donnee['pseudo']) {
            if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
                if ($pass === $pass_confirm) {
                    $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

                    $reponse->closeCursor();

                    $reponse = $bdd->prepare('INSERT INTO espace_membre(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, NOW())');
                    $reponse->execute(array(
                        'pseudo' => $_POST['pseudo'],
                        'pass' => $pass_hache,
                        'email' => $_POST['email']
                    ));

                    header('Location: connexion.php');
                } else {
                    echo 'Les deux mots de passe ne sont pas identique';
                }
            } else {
                echo 'Format d\'email non valide';
            }
    } else {
        echo 'Ce pseudo existe déja';
    }



?>