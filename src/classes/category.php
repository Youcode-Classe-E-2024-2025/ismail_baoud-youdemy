<?php
namespace src\classes;

class category {
    private $categoryName;

    public function __construct($categoryName) {
        $this->categoryName = $categoryName;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }

}

?>