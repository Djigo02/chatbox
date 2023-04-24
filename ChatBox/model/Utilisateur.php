<?php
    require_once "Database.php";
    class Utilisateur{
        private $nom ;
        private $prenom ;
        private $image ;
        private $email ;
        private $mdp ;
        private $connect;

        public function __construct()
        {
            $this->connect = new Database();
        }

        public function ajoutUtilisateur($nom, $prenom, $email, $mdp){
            $req = "INSERT INTO utilisateur (nomUser, prenomUser, email, mdp) VALUES (?,?,?,?)";
            $state = $this->connect->db->prepare($req);
            return $state->execute(array($nom,$prenom,$email,$mdp));
        }

        public function infoUtilisateur($idUser){
            $req = "SELECT * FROM utilisateur WHERE idUser = $idUser";
            return $this->connect->db->query($req)->fetch();
        }
        
        public function infoUtilisateurByEmail($email){
            $req = "SELECT * FROM utilisateur WHERE email = '$email'";
            return $this->connect->db->query($req)->fetch();
        }
        
        public function verifierUtilisateur($email,$mdp){
            $req = "SELECT * FROM utilisateur WHERE email = '$email' AND mdp = '$mdp' ";
            return $this->connect->db->query($req)->fetch();
        }

        public function envoyerMessage($date,$contenu,$idUser){
            $req = "INSERT INTO message (dateMessage, content, idUserF) VALUES (?,?,?)";
            $state = $this->connect->db->prepare($req);
            return $state->execute(array($date,$contenu,$idUser));
        }

        public function listerMessage(){
            $req = "SELECT * FROM utilisateur u, message m WHERE u.idUser = m.idUserF ORDER BY m.idMessage ASC";
            return $this->connect->db->query($req)->fetchAll();
        }
        
    }