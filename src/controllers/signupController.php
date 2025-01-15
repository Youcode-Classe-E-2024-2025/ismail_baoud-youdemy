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
            $firstName = $_POST['firstName'];
            $lastName = $_POST['lastName'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirmPassword'];
            $phoneNumber = $_POST['phoneNumber'];
            $role = $_POST['role'];
            if ($password != $confirmPassword) {
                $err = "Passwords do not match";
                return;
            }
            if ($firstName == "" || $lastName == "" || $email == "" || $password == "" || $confirmPassword == "" || $phoneNumber == "") {
                $err = "Please fill all the fields";
                return;
                
            }
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

        }
    }
    public function signup_view(){
        require_once "src/views/connection/signup_view.php";
    }
}

?>