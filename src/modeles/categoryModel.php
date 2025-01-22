<?php
namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\category;


class categoryModel {
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function categoryInsert(category $obg) {
        try{

            $query = "INSERT into categorys (categoryName,status) VALUES (?,?)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([$obg->__get("categoryName"),$obg->__get("status")]);
            return true;
        }catch(exeption $e){
            $err = "err";
            return false;
        }
        
    }

    public function categoryDelete($id) {
        $query = "UPDATE categorys set status = 'deactivate' where categoryID = $id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
    }
    public function totalCategory(){
        $query = "SELECT count(*) from categorys";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function categoryList() {
        $query = "SELECT * from categorys where status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>