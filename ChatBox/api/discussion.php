<?php
require_once "../model/Utilisateur.php";

//Cette page affiche tous les messages envoyer
$utilisateur = new Utilisateur();
if ($utilisateur->listerMessage()) {
    echo json_encode($utilisateur->listerMessage());
} else {
    echo json_encode(0);
}
