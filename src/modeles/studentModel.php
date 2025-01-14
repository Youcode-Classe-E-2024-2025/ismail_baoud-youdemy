<?php

class Student extends User {
    public function __construct($firstName, $lastName, $email, $password, $phoneNumber, $role)
    {
        parent::__construct($firstName, $lastName, $email, $password, $phoneNumber, $role);
    }

    public function myCourses() {

    }
}


?>