<?php
class Groups {
    protected $name;

    protected $connexion;


    public function __construct() {
        try {
            $this->connexion = new PDO('mysql:host=localhost;dbname=bdddashboard', 'root', null);
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }
    }


    public function getAdmin(){
        $getAdmin = $this->connexion->prepare("SELECT id_groups FROM `groups` WHERE `name` LIKE '%admin%' ");
        $getAdmin->execute();
        return $admin = $getAdmin->fetchAll();
    }
}

$role = new Groups;
$admin = $role->getAdmin();


?>