<?php
$controllerRouter = new ControllerRouter();

$controllerRouter->add('GET', '/login', [loginController::class, 'login']);
$controllerRouter->add('GET', '/student/dashboard', [studentController::class, 'dashboard']);
$controllerRouter->add('GET', '/student/mycourses', [studentController::class, 'mycourses']);
$controllerRouter->add('GET', '/admin/dashboard', [adminController::class, 'dashboard']);
$controllerRouter->add('GET', '/controller/signup', [signupController::class, 'signup']);

