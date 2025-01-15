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

    public function categoryInsert() {

    }
    public function categoryDelete() {

    }
    public function categoryList() {

    }

}

?>