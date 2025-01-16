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
    }
    public function tagList() {
        $query = "SELECT * from tags where status = 'active'";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>