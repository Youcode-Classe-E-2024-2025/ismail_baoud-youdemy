<?php
class studentController{
    public function dashboard(){
        include_once  "src/views/student/dashboard_view.php";
    }
    public function mycourses(){
        include_once  "src/views/student/mycourses_view.php";
    }
}
?>