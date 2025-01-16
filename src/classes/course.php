<?php
namespace src\classes;

class course {
    private $title;
    private $description;

    private $content;

    private $categoryId;

    function __construct($title, $description, $content, $categoryId) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->categoryId = $categoryId;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }
}