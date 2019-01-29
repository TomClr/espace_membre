<?php 

session_start();

$_SESSION = array();
session_destroy();

setcookie('pseudo', '');
setcookie('password_hash', '');

header('Location: connexion.php');

?>