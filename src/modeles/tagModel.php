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

    public function tagInsert() {

    }
    public function tagDelete() {

    }
    public function tagList() {

    }

}

?>