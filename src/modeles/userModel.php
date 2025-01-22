<?php

namespace src\modeles;

use PDO;
use config\DatabaseConnection;
use src\classes\User;


class userModel{
    private $db;
    public function __construct(){
        $this->db = DatabaseConnection::connect();
    }

    public function signUp(User $obg){
        try {
            $query = "INSERT INTO users (firstName, lastName, email, password, phoneNumber, role, status) VALUES (:firstName, :lastName, :email, :password, :phoneNumber, :role, :status)";
            $stmt = $this->db->prepare($query);
            $passhash = password_hash($obg->__get("password"), PASSWORD_DEFAULT);
            $firstName = $obg->__get("firstName"); 
            $lastName = $obg->__get("lastName");
            $email = $obg->__get("email");
            $phone = $obg->__get("phoneNumber");
            $role = $obg->__get("role");
            $status = $obg->__get("status");
            $stmt->bindParam('firstName', $firstName);
            $stmt->bindParam('lastName', $lastName);
            $stmt->bindParam('email', $email);
            $stmt->bindParam('password', $passhash);
            $stmt->bindParam('phoneNumber', $phone);
            $stmt->bindParam('role', $role);
            $stmt->bindParam('status', $status);
            $stmt->execute();
            include_once "src/views/connection/login_view.php";
        } catch (PDOException $e) {
            $err = "Erreur lors de l'enregistrement: " . $e->getMessage();
            throw $e;
        }
    }
    public function login($email, $password){
            $query= "SELECT * from users where email = :email";
            $stmt = $this->db->prepare( $query );
            $stmt->bindparam( ':email', $email );
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
            
            
    }

    public function allUsers(){
        $query = "SELECT * from users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    
    public function CountallUsers(){
        $query = "SELECT count(*) from users";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    public function emailExists($email){
        $query = "select email from users where email = :email";
        $stmt = $this->db->prepare( $query );
        $stmt->bindparam( ':email', $email );
        $stmt->execute();
        $isExist = $stmt->fetch();
        if($isExist){
            return true;
        }else{
            return false;
        }

    }



}

?>