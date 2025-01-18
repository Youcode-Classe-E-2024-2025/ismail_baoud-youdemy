<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\teacher;


class teacherModel extends DatabaseConnection{

    private $db;
    
    public function __construct(){


    }

    public function pandingTeachers($status){
        $query = "SELECT * from users where role = 'teacher' and status = '$status'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>