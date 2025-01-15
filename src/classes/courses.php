<?php
namespace src\classes;

class course {
    private $title;
    private $description;

    private $content;
    private $tagId;

    private $categoryId;

    private $date;

    function __construct($title, $description, $content, $tagId, $categoryId, $date) {
        $this->title = $title;
        $this->description = $description;
        $this->content = $content;
        $this->tagId = $tagId;
        $this->categoryId = $categoryId;
        $this->date = $date;
    }

    public function __get($name){
        return $this->$name;
    }

    public  function __set($name, $value){
        $this->$name = $value;
    }
}