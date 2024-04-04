<?php
include './classes/db.php';
class User extends Database {
    protected $name;
    protected $password;

    public function getUserAdmin() {
        $getUser = $this->connexion->prepare('SELECT * FROM user WHERE id_user = 1');
        $getUser->execute(array());
        return $user = $getUser->fetchAll();
    }

}
$users = new User();



