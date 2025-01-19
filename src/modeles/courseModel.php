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


    public function courseListTeacher($id){
        $query = "SELECT * FROM courses where status = 'active' and teacherID = $id";
        $stmt = $this->db->query($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function courseList(){
        $query = " SELECT 
            *
        FROM 
            courses c
        INNER JOIN 
            course_tags ct ON c.courseID = ct.courseID
        INNER JOIN 
            tags t ON ct.tagID = t.tagID
        INNER JOIN 
            categorys ca ON c.categoryID = ca.categoryID
        INNER JOIN 
            users u ON c.teacherID = u.userID
        WHERE 
            c.status = 'active' 
            AND ca.status = 'active'
    ";
    
    $stmt = $this->db->query($query);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    }

    public function totalCourses(){
        $query = "SELECT count(*) from courses where status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function myCourses($userId){
        $query = "SELECT 
    *
    FROM
        enrollment
    INNER JOIN
        courses ON enrollment.courseID = courses.courseID
    INNER JOIN
        users ON enrollment.userID = users.userID
    WHERE
    courses.status = 'active' 
    AND users.userID = $userId;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
   

    // public function courseByCategory(){

    // }

    // public function LastIdCours(){
        
    // }
}