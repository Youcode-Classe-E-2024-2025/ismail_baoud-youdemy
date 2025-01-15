<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\admin;


class AdminModel{
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function manageStudents(){

    }
    public function manageTeachers(){

    }
    public function manageCourses(){

    }
    public function manageTags(){

    }
    public function manageCategorys(){

    }

    public function totalStudents(){


    }

    public function totalTeachers(){

    }

    public function topThreeTeachers(){

    }

    public function changeTeacherStatus(){

    }

    public function topCourse(){

    }

}
?>