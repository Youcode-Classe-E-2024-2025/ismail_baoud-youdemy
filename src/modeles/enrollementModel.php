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

    public function createEnrollment() {

    }

    public function deleteEnrollment() {

    }

    public function enrollmentList() {

    }
}
