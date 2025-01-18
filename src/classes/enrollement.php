<?php
namespace src\classes;

class enrollement {
    private $date;
    
    public function __construct($date) {
        $this->date = $date;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }
}
