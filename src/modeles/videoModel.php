<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\modeles\courseModel;
use src\classes\course;



class videoModel extends courseModel{
    private $db;
    private $type = "video";
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function courseAdd(course $obj,$id){
        try{
            $query = "INSERT into courses (title,description,content,contentType,categoryId,teacherID) values (?,?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$obj->__get("title"),$obj->__get("description"),$obj->__get("content"),$this->type,$obj->__get("categoryId"),$id]);
            return $this->db->lastInsertId();
        }catch(exeption $e){
            return false;
        }
    }
}