<?php
namespace src\controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use src\modeles\userModel;

class loginController{
    public function logout(){
        session_destroy();
        header("location: /home/view");
    } 
    public function login_controller(){
        $status;
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = htmlspecialchars($_POST['email']);
            

                $password = trim($_POST['password']);
                if(!isset($email) && !isset($password)){
                    $err = "data is empty";
                    return;
                }
                $obg = new userModel();
                $result = $obg->login($email, $password);
                if($result){
                    
                    if(password_verify( $password, $result['password'] )){
                        if($result["role"] == "student"){
                            $_SESSION["role"] = "student";
                            $_SESSION["studentid"] = $result["userID"];
                            header("location: /student/mycourses");
                        }
                        elseif($result["role"] == "teacher"){
                            if($result["status"] == "On hold"){
                                $_SESSION["role"] = "panding";
                                $_SESSION["status"] = "On hold";
                                header("location: /teacher/dashboard/panding");
                                
                            }elseif($result["status"] == "active"){
                                $_SESSION["teacherID"] = $result["userID"];
                                $_SESSION["role"] = "teacher";
                                $_SESSION["status"] = "active";
                                header("location: /teacher/dashboard");
                            }else{
                                header("location: ../error/404.php");
                            }
                        }else{
                            $_SESSION["role"] = "admin";
                            header('location: /admin/dashboard');
                        }
                    }else{
                        require_once "src/views/connection/login_view.php";
                    }
                }else{
                    require_once "src/views/connection/login_view.php";
                }
            }else{
                require_once "src/views/connection/login_view.php";

            }

        
    }    
    public function login_view(){
        include_once  "src/views/connection/login_view.php";
    }
}
?>