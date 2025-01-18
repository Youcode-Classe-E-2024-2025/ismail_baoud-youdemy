<?php
namespace src\controllers; 
use src\modeles\courseModel;
use src\modeles\tagModel;
class homeController{
    
    public function home(){
        $course = new courseModel();
        $courses = $course->courseList();
        $tag = new tagModel();
        include_once "src/views/home/home_view.php";
    }
}
?>