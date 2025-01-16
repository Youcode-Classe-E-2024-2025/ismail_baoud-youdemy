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
    public function categoryDelete() {

    }
    public function categoryList() {

    }

}

?>