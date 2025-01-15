<?php

namespace src\classes;

class User{
    private $firstName ;

    private $lastName ;
    private $email ;
    private $password ;
    private $phoneNumber ;
    private $role ;

    private $status;

    public function __construct($firstName, $lastName, $email, $password, $phoneNumber, $role,$status){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->password = $password;
        $this->phoneNumber = $phoneNumber;
        $this->role = $role;
        $this->status = $status;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }

}

?>