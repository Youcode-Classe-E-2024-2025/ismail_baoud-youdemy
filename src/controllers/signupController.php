<?php

namespace src\controllers;

use config\DatabaseConnection;
use src\classes\User;
use src\modeles\userModel;
class signupController
{
    private $db;
    
    public function connect()
    {
        $this->db = DatabaseConnection::connect();
    }
    
    public function signup()
    {
        $this->connect();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $firstName = htmlspecialchars(trim($_POST['firstName']));
            $lastName = htmlspecialchars(trim($_POST['lastName']));
            $email = htmlspecialchars(trim($_POST['email']));
            $password = trim($_POST['password']);
            $confirmPassword = trim($_POST['confirmPassword']);
            $phoneNumber = htmlspecialchars(trim($_POST['phoneNumber']));
            $role = htmlspecialchars(trim($_POST['role']));
            if ($password != $confirmPassword) {
                $err = "Passwords do not match";
                return;
            }
            if ($firstName == "" || $lastName == "" || $email == "" || $password == "" || $confirmPassword == "" || $phoneNumber == "") {
                $err = "Please fill all the fields";
                return;
                
            }
            $obg = new userModel();
            $result = $obg->emailExists($email);
            $emailexists = false;
            if($result){
                $emailexists = true;
            }
            if(!$emailexists){
            if ($role == "student") {
                $status = "active";
                $student = new User($firstName, $lastName, $email, $password, $phoneNumber, $role, $status);
                $obj = new userModel();
                $obj->signUp($student);
            } elseif ($role == "teacher") {
                
                $status = "On hold";
                $teacher = new User($firstName, $lastName, $email, $password, $phoneNumber, $role, $status);
                $obj = new userModel();
                $obj->signUp($teacher);
            } else {
                $err = "this role is not found";
                return;
            }
        }else{
            header('location: /signup');
        }

        }
    }
    public function signup_view(){
        require_once "src/views/connection/signup_view.php";
    }
}

?>