<?php 

if (isset($_FILES['avatar']) AND $_FILES['avatar']['error'] === 0) {
    if ($_FILES['avatar']['size'] <= 6000000) {
        $infos_fichier = pathinfo($_FILES['avatar']['name']);
        $extension_upload = strtolower($infos_fichier['extension']);
        $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');

        if (in_array($extension_upload, $extensions_autorisees)) {
            session_start();
            $nom = "uploads/avatars/" . $_SESSION['id'] . '.' . $extension_upload;
            move_uploaded_file($_FILES['avatar']['tmp_name'], $nom);
            echo 'L\'envoi a bien été effectué';
        }
    }
}
?>