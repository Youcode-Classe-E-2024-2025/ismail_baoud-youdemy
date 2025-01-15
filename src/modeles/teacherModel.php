<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\teacher;


class teacherModel{

    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function enrollementCourse(){

    }
}

?>