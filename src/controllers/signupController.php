<?php

namespace src\controllers;

use config\DatabaseConnection;
use src\modeles\User;
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
                $student->signUp($this->db);
            } elseif ($role == "teacher") {
                
                $status = "On hold";
                $student = new User($firstName, $lastName, $email, $password, $phoneNumber, $role, $status);
                $student->signUp($this->db);
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

//$obj = new signupController();
//$obj->signup();
?>