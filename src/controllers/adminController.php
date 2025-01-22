<?php

namespace src\controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use src\classes\category;
use src\modeles\categoryModel;
use src\modeles\userModel;
use src\classes\tag;
use src\modeles\tagModel;
use src\modeles\teacherModel;
use src\modeles\courseModel;
class adminController{
    public function dashboard(){
        $teach = new userModel();
        $teacher = new teacherModel();
        $course = new courseModel();
        $cate = new categoryModel();
        $tag = new tagModel();
        $course = new userModel();
        $top = new teacherModel();
        $tope = new courseModel();
        //all users
        $allUsers = $teach->allUsers();
        //all teachers dependence for status
        $panding = $teacher->pandingTeachers('On hold');
        $active = $teacher->pandingTeachers('active');
        $deactivate = $teacher->pandingTeachers('deactivate');
        //all courses
        $courses = $course->courseList();
        $totalCourses = $course->totalCourses();
        //total categories
        $totalCategory = $cate->totalCategory();
        //total tags
        $totalTags = $tag->totalTags();
        //total users and panding
        $usersN = $course->CountallUsers();
        $pandingN = $course->CountAllTeachers();
        //top three teachers
        $topteachers = $top->topTeachers();
        //top course
        $topCourse = $tope->topCourse();

        include_once  "src/views/admin/dashboard_view.php";
    }
    public function addCategory(){
        $category = htmlspecialchars(trim($_POST["category"]));
        $obj = new category($category);
        $objet = new categoryModel();
        $res = $objet->categoryInsert($obj);
        header('location: /admin/dashboard');
    }
    public function addTag(){
        $tag = htmlspecialchars(trim($_POST["tags"]));
        $tags = explode(",", $tag);
        foreach($tags as $tag){
            $obj = new tag($tag);
            $objet = new tagModel();
            $res = $objet->tagInsert($obj);
            header('location: /admin/dashboard');

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
            $id = $_POST["courseid"];
            $teacher = new courseModel();
            $teacher->courseDelete($id);
            header('location: /admin/dashboard');

        }
    }
    
    
}
?>