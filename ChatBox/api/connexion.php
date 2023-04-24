<?php
    require_once "../model/Utilisateur.php";
    $infoUser = new Utilisateur();

    if(isset($_GET['action'])){
        extract($_GET);
        switch ($action) {
            case 'email':
                $rep = $infoUser->infoUtilisateurByEmail($email);
                if($rep)
                    echo json_encode($rep);
                else
                    echo json_encode(0);
                break;
            
            default:
                # code...
                break;
        }
    }

    if(isset($_POST['email'],$_POST['mdp'])){
        extract($_POST);
        $res = $infoUser->verifierUtilisateur($email,$mdp);
        if($res){
            echo json_encode($res);
        }else{
            echo json_encode(0);
        }
    }