<?php

namespace src\controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use src\classes\category;
use src\modeles\categoryModel;
use src\classes\tag;
use src\modeles\tagModel;
use src\modeles\teacherModel;
use src\modeles\courseModel;
class adminController{
    public function dashboard(){
        $teacher = new teacherModel();
        $panding = $teacher->pandingTeachers('On hold');
        $active = $teacher->pandingTeachers('active');
        $deactivate = $teacher->pandingTeachers('deactivate');
        $course = new courseModel();
        $courses = $course->courseList();


        include_once  "src/views/admin/dashboard_view.php";
    }
    public function addCategory(){
        $category = htmlspecialchars(trim($_POST["category"]));
        $obj = new category($category);
        $objet = new categoryModel();
        $res = $objet->categoryInsert($obj);
        echo $res;
    }
    public function addTag(){
        $tag = htmlspecialchars(trim($_POST["tags"]));
        $tags = explode(",", $tag);
        foreach($tags as $tag){
            $obj = new tag($tag);
            $objet = new tagModel();
            $res = $objet->tagInsert($obj);
            echo $res;
        }
    }
    public function changeUserStatus(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $newStatus = $_POST["status"];
            $id = $_POST["userid"];
            $teacher = new teacherModel();
            $teacher->changeStatus($newStatus,$id);
            header('location: /admin/dashboard');

        }
    }
    public function changeCourseStatus(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $newStatus = $_POST["status"];
            $id = $_POST["courseid"];
            $teacher = new courseModel();
            $teacher->changeStatus($newStatus,$id);
            header('location: /admin/dashboard');

        }
    }
    
    
}
?>