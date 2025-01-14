<?php
error_reporting( E_ALL );
ini_set( 'display_errors', 1 );
require_once 'src/controllers/Router.php';
require_once 'src/controllers/loginController.php';
require_once 'src/controllers/signupController.php';
require_once 'src/controllers/studentController.php';
require_once 'src/controllers/teacherController.php';
require_once 'src/controllers/adminController.php';
require_once 'src/controllers/pathsList.php';

$controllerRouter->dispatch($_SERVER['REQUEST_URI']);
?>
