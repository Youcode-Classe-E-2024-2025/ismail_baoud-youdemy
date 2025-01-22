<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\enrollement;


class enrollementModel {

    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function createEnrollment($user,$course) {
        $query = "INSERT into enrollment (userID,courseID) values (:user,:course)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user', $user, PDO::PARAM_INT);
        $stmt->bindParam(':course', $course, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function enrollmentList($id) {
        $query = "SELECT u.firstName, u.lastName, e.enrollmentDate FROM users u INNER JOIN enrollment e ON e.userID = u.userID WHERE e.courseID = :courseID";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':courseID', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
