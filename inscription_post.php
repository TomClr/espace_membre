<?php 

try {
    $bdd = new PDO('mysql:host=localhost;dbname=espace_membres;charset=utf8', 'root', '');
}

catch (Exception $e) {
    die ('Erreur : ' . $e->getMessage());
};

$pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

$reponse = $bdd->prepare('INSERT INTO espace_membre(pseudo, pass, email, date_inscription) VALUES(:pseudo, :pass, :email, NOW())');
$reponse->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => $pass_hache,
    'email' => $_POST['email']
));

header('Location: connexion.php')

?>