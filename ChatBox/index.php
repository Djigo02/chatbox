<?php
    session_start();
    ob_start();
    include_once "view/shared/header.php";
    require_once "controller/ControllerUtilisateur.php";
    $session = isset($_SESSION['utilisateur']) ? $_SESSION['utilisateur'] : NULL;
    $user = new ControllerUtilisateur();
    $user->controllerManager();
    include_once "view/shared/footer.php";
?>