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

    public function pandingTeachers($status){
        $query = "SELECT * from users where role = 'teacher' and status = '$status'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function allTeachers(){
        $query = "SELECT * from users where role = 'teacher'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function changeStatus($newStatus, $id){
        $query = "UPDATE users set status = '$newStatus' where userID = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
}

?>