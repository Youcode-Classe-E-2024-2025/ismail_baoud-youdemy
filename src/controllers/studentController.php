<?php
namespace src\controllers;
use src\modeles\courseModel;
use src\modeles\tagModel;
use src\modeles\enrollementModel;
class studentController{
    public function dashboard(){
        $tagModel = new tagModel();
        $tags = $tagModel->tagList();
        $courseModel = new courseModel();
        $courses = $courseModel->allCourseList();
        
        include_once  "src/views/student/dashboard_view.php";
    }
    public function mycourses(){
        $course = new courseModel();
        if($_SESSION["studentid"]){
            $courses = $course->myCourses($_SESSION["studentid"]);
        }
        include_once  "src/views/student/mycourses_view.php";
    }

    public function addEnrollement(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $courseID = $_POST["courseID"];
            $studentID = $_POST["studentID"];
            $enroll = new enrollementModel();
            $enroll->createEnrollment($studentID,$courseID);
            header("location: /student/mycourses");
        }
    }
}
?>