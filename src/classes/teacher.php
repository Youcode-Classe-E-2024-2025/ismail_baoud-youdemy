<?php
namespace src\classes;

class teacher extends User{

    public function __construct($firstName, $lastName, $email, $password, $phoneNumber, $role = "teacher")
    {
        parent::__construct($firstName, $lastName, $email, $password, $phoneNumber, $role);
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }
}

?>