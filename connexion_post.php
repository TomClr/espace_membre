<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');
}

catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
}

$pseudo = $_POST['pseudo'];

// récupération du mot de passe et du pseudo dans la bdd
$reponse = $bdd->prepare('SELECT id, pass FROM espace_membre WHERE pseudo=:pseudo');
$reponse->execute(array(
    'pseudo' => $pseudo
));

$resultat = $reponse->fetch();

// comparaison du mot de passe envoyé avec celui de la bdd
$isPasswordCorrect = password_verify($_POST['password'], $resultat['pass']);

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe';
} else {
    if (isset($_POST['connexion_auto']) AND ($isPasswordCorrect)) {
        session_start();
        setcookie('pseudo', $pseudo, time() + 365*24*3600, null, null, false, true);
        setcookie('password_hash', $resultat['pass'], time() + 365*24*3600, null, null, false, true);
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('location: index.php');

    } else if (isset($_COOKIE['password_hash']) AND $_COOKIE['password_hash'] === $resultat['pass']) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['pseudo'] = $pseudo;
            header('location: index.php');
        
    } else if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('location: index.php');
    } else {
        echo 'Mauvais identifiant ou mot de passe';
    }
    /* if ($isPasswordCorrect) {
        session_start();
        $_SESSION['id'] = $resultat['id'];
        $_SESSION['pseudo'] = $pseudo;
        header('location: index.php');
    } else {
        echo 'Mauvais identifiant ou mot de passe';
    } */
}
?>