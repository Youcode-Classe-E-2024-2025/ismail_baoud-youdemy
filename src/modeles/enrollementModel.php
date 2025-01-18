<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\enrollement;


class enrollementModel {

    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function createEnrollment($user,$course) {
        $query = "INSERT into enrollment (userID,courseID) values ($user,$course)";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }

    public function deleteEnrollment() {

    }

    public function enrollmentList() {

    }

}
