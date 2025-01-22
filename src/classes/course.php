<?php
namespace src\classes;

class course {
    private $title;
    private $description;

    private $content;

    private $categoryId;
    private $type;

    function __construct($title, $description, $content, $categoryId,$type) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->categoryId = $categoryId;
        $this->type = $type;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }
}