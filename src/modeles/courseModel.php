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

    public function courseAdd(course $obj,$id){
        try{
            $query = "INSERT into courses (title,description,content,categoryId,teacherID) values (?,?,?,?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$obj->__get("title"),$obj->__get("description"),$obj->__get("content"),$obj->__get("categoryId"),$id]);
            return $this->db->lastInsertId();
        }catch(exeption $e){
            return false;
        }
    }

    public function course_tags($tagID, $courseID){
        try{
            $query = "INSERT INTO course_tags (tagID , courseID) values (?,?)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([$tagID, $courseID]);
        return true;
        }catch(exeption $e){
            return false;
        }
    }

    public function courseDelete($id){
        $query = "UPDATE courses set status = 'deactivate' where courseID =$id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }


    public function courseUpdate($id,$title,$desc){
     
        $query = "UPDATE courses SET title = :title , description = :desc where courseID =$id";
        $stmt = $this->db->prepare($query);
        $stmt->bindparam("title", $title);
        $stmt->bindparam("desc", $desc);
        $stmt->execute();
    }


    public function courseList($id){
        $query = "SELECT * FROM courses where status = 'active' and teacherID = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function totalCourses(){
        
    }

    public function courseByCategory(){

    }

    public function LastIdCours(){
        
    }
}