<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\student;


class studentModel{
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function myCourses() {

    }
}


?>