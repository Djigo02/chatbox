<?php
require_once "model/Utilisateur.php";

class ControllerUtilisateur
{
    private $utilisateur;
    public function __construct()
    {
        $this->utilisateur = new Utilisateur();
    }

    public function controllerManager()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : NULL;
        $action = isset($_GET['action']) ? $_GET['action'] : NULL;
        if (isset($_SESSION['utilisateur'])) {
            $this->discussion();
        } else {
            if(isset($page) && $page!="discussion"){
                include_once "view/$page.php";
            }else{
                include_once "view/connexion.php";
            }
        }

        if ($action) {
            extract($_POST);
            switch ($action) {
                case 'connexion':
                    $req = $this->utilisateur->verifierUtilisateur($email, $mdp);
                    if ($req) {
                        $_SESSION['utilisateur'] = $req;
                        header("location:http://localhost/projet/chatbox/?page=discussion");
                    } else {
                        header("location:http://localhost/projet/chatbox/?page=connexion&message=mauvais_email_ou_mot_de_passe");
                    }
                    break;
                case 'inscription':
                    $req = $this->utilisateur->ajoutUtilisateur($nom, $prenom, $email, $mdp);
                    if ($req) {
                        header("location:http://localhost/projet/chatbox/?page=connexion");
                    } else {
                        header("location:http://localhost/projet/chatbox/?page=inscription&message=mauvaisinfo");
                    }
                    break;
                case 'discussion':
                    $this->discussion();
                    break;

                case 'deconnexion':
                    session_destroy();
                    header("location:http://localhost/projet/chatbox/");
                    break;

                case 'send':
                    $date = date("Y-m-d H:i");
                    $this->utilisateur->envoyerMessage($date, $content, $_SESSION['utilisateur']['idUser']);
                    header("location:http://localhost/projet/chatbox/?page=discussion");
                    break;
            }
        }
    }

    public function view($page)
    {
        if (file_exists("view/$page.php")) {
            include_once "view/$page.php";
        } else {
            include_once "view/error.php";
        }
    }

    public function discussion()
    {
        $message = $this->utilisateur->listerMessage();
        include_once "view/discussion.php";
    }
}
