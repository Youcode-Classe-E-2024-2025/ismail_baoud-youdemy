<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
class User{
    private $firstName ;

    private $lastName ;
    private $email ;
    private $password ;
    private $phoneNumber ;
    private $role ;

    private $status;

    public function __construct($firstName, $lastName, $email, $password, $phoneNumber, $role,$status){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->role = $role;
        $this->status = $status;
    }

    public function signUp($db){
        echo "hi";
        try {
            $query = "INSERT INTO users (firstName, lastName, email, password, phoneNumber, role , status) VALUES (':firstName', ':lastName', ':email', ':password', ':phoneNumber', ':role' ,':status')";
        $stmt = $db->prepare($query);
        $stmt->bindParam(":firstName", $this->firstName);
        $stmt->bindParam(":lastName", $this->lastName);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":password", password_hash($this->password, PASSWORD_DEFAULT));
        $stmt->bindParam(":phoneNumber", $this->phoneNumber);
        $stmt->bindParam(":role", $this->role);
        $stmt->bindParam(":status", $this->status);
        $stmt->execute();
        include_once "src/views/connection/login_view.php";
        }catch (PDOException $e){
            $err="Erreur lors de l'enregistrement" . $e->getMessage();
        }



    }
    public function login($email, $password){

    }

    public function emailExists($email){

    }

    public function coursesList(){

    }

}

?>