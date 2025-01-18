<?php
namespace src\controllers;
use src\modeles\courseModel;
use src\modeles\tagModel;
class studentController{
    public function dashboard(){
        $objet = new tagModel();
        $tags = $objet->tagList();
        $obj = new courseModel();
        $id = $_SESSION["teacherID"];
        $results = $obj->courseList($id);
        include_once  "src/views/student/dashboard_view.php";
    }
    public function mycourses(){
        include_once  "src/views/student/mycourses_view.php";
    }
}
?>