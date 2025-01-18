<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\tag;


class tagModel {
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function tagInsert(tag $obg) {
        try{

            $query = "INSERT into tags (tagName,status) VALUES (?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$obg->__get("tagName"),$obg->__get("status")]);
            return true;
        }catch(exeption $e){
            $err = "err";
            return false;
        }
        
    }
    public function tagDelete($id) {
        $query = "UPDATE tags set status = 'deactive' where tagID = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public function tagList() {
        $query = "SELECT * from tags where status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function tagCourse($id){
        $query = "SELECT c.tagName , c.tagID from tags c inner join course_tags ct on ct.tagID = c.tagID where ct.courseID = $id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>