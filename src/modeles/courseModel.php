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

    public function courseAdd(course $obj){
        try{

            $query = "INSERT into courses (title,description,content,categoryId) values (?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$obj->__get("title"),$obj->__get("description"),$obj->__get("content"),$obj->__get("categoryId")]);
            return true;
        }catch(exeption $e){
            return false;
        }
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