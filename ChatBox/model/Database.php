<?php
    class Database{
        private $host = "localhost";
        private $dbname = "chatbox";
        private $user = "root";
        private $pass = "";
        public $db ;

        public function __construct(){
            try{
                $req="mysql:host=".$this->host.";dbname=".$this->dbname;
                $option = array(PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION);
                $this->db = new PDO($req,$this->user,$this->pass,$option);
            }catch(PDOException $e){
                die("Erreur ".$e->getMessage());
            }
        }
    }
