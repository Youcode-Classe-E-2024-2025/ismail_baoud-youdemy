<?php

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

    public function courseAdd(){

    }

    public function courseDelete(){

    }

    public function courseUpdate(){

    }

    public function courseList(){

    }

    public function totalCourses(){

    }

    public function courseByCategory(){

    }

    public function courseByid(){

    }
}