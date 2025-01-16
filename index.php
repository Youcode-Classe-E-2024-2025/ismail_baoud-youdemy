<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
require_once 'vendor/autoload.php';
require_once "autoloader.php";
require_once "config/databaseConnection.php";  
autoloader::register();

use src\controllers\ControllerRouter;
use src\controllers\loginController;
use src\controllers\studentController;
use src\controllers\adminController;
use src\controllers\signupController;
use src\modeles\User;

use config\DatabaseConnection;

try {
    $connection = DatabaseConnection::connect();
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

$controllerRouter = new ControllerRouter();

$controllerRouter->add('GET', '/login', [loginController::class, 'login']);
$controllerRouter->add('POST', '/login/controller', [loginController::class, 'login_controller']);
$controllerRouter->add('GET', '/signup', [signupController::class, 'signup_view']);
$controllerRouter->add('GET', '/', [loginController::class, 'logout']);
$controllerRouter->add('GET', '/logout', [loginController::class, 'logout']);
$controllerRouter->add('GET', '/student/dashboard', [studentController::class, 'dashboard']);
$controllerRouter->add('GET', '/student/mycourses', [studentController::class, 'mycourses']);
$controllerRouter->add('GET', '/admin/dashboard', [adminController::class, 'dashboard']);
$controllerRouter->add('POST', '/controller/signup', [signupController::class, 'signup']);

$controllerRouter->dispatch($_SERVER['REQUEST_URI']);
?>
