<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\course;


class courseModel {
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function courseAdd(){

    }

    public function courseDelete(){

    }

    public function courseUpdate(){

    }

    public function courseList(){

    }

    public function totalCourses(){

    }

    public function courseByCategory(){

    }

    public function courseByid(){

    }
}