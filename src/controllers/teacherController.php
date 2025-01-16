<?php

namespace src\controllers;
use src\modeles\categoryModel;
use src\modeles\tagModel;
class teacherController{
    
    public function dashboard(){
        $objet = new tagModel();
        $tags = $objet->tagList();
        include_once  "src/views/teacher/dashboard_view.php";
    }
    public function panding(){
        include_once  "src/views/teacher/panding_view.php";

    }
}
?>