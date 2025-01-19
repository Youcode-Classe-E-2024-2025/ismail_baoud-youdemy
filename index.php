<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'vendor/autoload.php';
require_once "autoloader.php";
require_once "debuging/debuging.php";
require_once "config/databaseConnection.php";  
autoloader::register();

use src\controllers\ControllerRouter;
use src\controllers\loginController;
use src\controllers\studentController;
use src\controllers\teacherController;
use src\controllers\adminController;
use src\controllers\signupController;
use src\controllers\courseController;
use src\controllers\homeController;
use src\modeles\User;

use config\DatabaseConnection;

try {
    $connection = DatabaseConnection::connect();
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$controllerRouter = new ControllerRouter();

$controllerRouter->add('GET', '/', [homeController::class, 'home']);
$controllerRouter->add('GET', '/login', [loginController::class, 'login_view']);
$controllerRouter->add('POST', '/login/controller', [loginController::class, 'login_controller']);
$controllerRouter->add('GET', '/signup', [signupController::class, 'signup_view']);
$controllerRouter->add('POST', '/controller/signup', [signupController::class, 'signup']);
$controllerRouter->add('GET', '/logout', [loginController::class, 'logout']);
$controllerRouter->add('GET', '/student/dashboard', [studentController::class, 'dashboard']);
$controllerRouter->add('GET', '/student/mycourses', [studentController::class, 'mycourses']);
$controllerRouter->add('POST', '/student/dashboard/enrollement', [studentController::class, 'addEnrollement']);
$controllerRouter->add('GET', '/teacher/dashboard', [teacherController::class, 'dashboard']);
$controllerRouter->add('GET', '/teacher/dashboard/panding', [teacherController::class, 'panding']);
$controllerRouter->add('GET', '/admin/dashboard', [adminController::class, 'dashboard']);
$controllerRouter->add('POST', '/teacher/course/addCourse', [courseController::class, 'addCourse']);
$controllerRouter->add('POST', '/dashboard/category', [adminController::class, 'addCategory']);
$controllerRouter->add('POST', '/dashboard/tag', [adminController::class, 'addTag']);
$controllerRouter->add('POST', '/teacher/course/delete', [courseController::class, 'deleteCourse']);
$controllerRouter->add('POST', '/teacher/course/update', [courseController::class, 'updateCourse']);
$controllerRouter->add('POST', '/admin/users/changeStatus', [adminController::class, 'changeUserStatus']);
$controllerRouter->add('POST', '/admin/course/changeStatus', [adminController::class, 'changeCourseStatus']);
$controllerRouter->add('GET', '/home/view', [homeController::class, 'home']);


// $uri strtok($_SERVER(), "?")
$controllerRouter->dispatch($_SERVER['REQUEST_URI']);
?>
