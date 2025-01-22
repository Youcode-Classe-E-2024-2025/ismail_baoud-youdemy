<?php

namespace src\controllers;
use src\modeles\categoryModel;
use src\modeles\courseModel;
use src\modeles\enrollementModel;
use src\modeles\tagModel;
class teacherController{
    
    public function dashboard(){
      
        $enr = new enrollementModel();
        
        $objet = new tagModel();
        $tags = $objet->tagList();
        $obj = new courseModel();
        $id = $_SESSION["teacherID"];
        $results = $obj->courseList($id);
        $countCourses = $obj->totalCourses(); 
        


        include_once  "src/views/teacher/dashboard_view.php";
    }

    public function panding(){
        include_once  "src/views/teacher/panding_view.php";
    }

  
}
?>