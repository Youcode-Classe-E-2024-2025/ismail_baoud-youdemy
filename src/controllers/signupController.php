<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
class signupController
{
    private $db;

    public function connect()
    {
        $connection = new DatabaseConnection();
        $this->db = $connection->connect();
    }

    public function signup()
    {
        echo "hi";
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
            if ($role == "Student") {
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
}

//$obj = new signupController();
//$obj->signup();
?>