<?php

class Teacher extends User{

    public function __construct($firstName, $lastName, $email, $password, $phoneNumber, $role = "teacher")
    {
        parent::__construct($firstName, $lastName, $email, $password, $phoneNumber, $role);
    }

    public function enrollementCourse(){

    }
}

?>