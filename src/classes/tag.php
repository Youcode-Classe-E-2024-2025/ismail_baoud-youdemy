<?php
namespace src\classes;

class tag {
    private $tagName;
    private $status = 'active';

    public function __construct($tagName) {
        $this->tagName = $tagName;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }

}

?>