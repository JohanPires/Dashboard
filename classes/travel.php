<?php
class Travel {
    protected $name;
    protected $destination;
    protected $description;
    protected $picture;
    protected $date;
    protected $price;

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


    public function postTravel($idTravelThemes, $idUser, $name, $price,$description, $picture, $dateStart, $dateEnd , $region, $pack){
        $requestpostTravel = $this->connexion->prepare('INSERT INTO travels(id_travel_themes, id_user, name, price,description, picture, date_start, date_end, regions, pack) VALUES(?,?,?,?,?,?,?,?,?,?)'); 
        $requestpostTravel->execute(array($idTravelThemes, $idUser, $name, $price,$description, $picture, $dateStart, $dateEnd, $region, $pack));

    }



    public function getPicture(){
        $requestPicture = $this->connexion->prepare("SELECT picture FROM travels WHERE id_travel = 8");
        $requestPicture->execute();
        return $pictures = $requestPicture->fetch();

    }

    public function getResumeTravel(){
        $reqgetResumeTravel = $this->connexion->prepare('SELECT `id_travel`, `name`, `description`, `picture` FROM `travels`');
        $reqgetResumeTravel->execute();
        return $getResumeTravel = $reqgetResumeTravel->fetchAll();
    }

    public function getAllTheTravel(){
        $reqgetAllTravel = $this->connexion->prepare('SELECT * FROM travels INNER JOIN travels_themes ON travels.`id_travel_themes` = `travels_themes`.`id_travel_themes`;');
        $reqgetAllTravel->execute();
        return $getAllTravel = $reqgetAllTravel->fetchAll();
    }

    public function deleteTravel($idTravel){
        $reqDeleteTravel = $this->connexion->prepare('DELETE FROM `travels` WHERE `id_travel` = ?');
        $reqDeleteTravel->execute(array($idTravel));
    }
    public function updateTravel($idTravelThemes, $idUser,  $name, $price, $description, $picture,$dateStart, $dateEnd, $region, $pack, $idTravel ){
        $reqUpdateTravel = $this->connexion->prepare('UPDATE `travels` SET `id_travel_themes`= ?, `name`= ?, `price`= ?, `description`= ?, `picture`= ?, `date_start` = ?, `date_end` = ? , `regions` = ? , `pack` = ? WHERE `id_travel` = ?');
        $reqUpdateTravel->execute(array($idTravelThemes, $name, $price, $description, $picture, $dateStart, $dateEnd, $region, $pack, $idTravel));
    }

    public function getTravelEdit($idTravel){
        $reqAllTravel = $this->connexion->prepare('SELECT * FROM `travels` INNER JOIN travels_themes ON travels.id_travel_themes = travels_themes.id_travel_themes WHERE travels.id_travel = ?');
        $reqAllTravel->execute(array($idTravel));
        return $AllTravel = $reqAllTravel->fetch();
    }

    
}


$travel = new Travel();



?>


