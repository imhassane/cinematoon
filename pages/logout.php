<?php
    session_start();
    
    if($_SESSION['usr_pseudo']) {
        // On supprime la session.
        unset($_SESSION['usr_pseudo']);
        unset($_SESSION['is_admin']);

        // On redirige l'utilisateur vers la page d'accueil.
        header('Location: ../index.php');
    }

?>