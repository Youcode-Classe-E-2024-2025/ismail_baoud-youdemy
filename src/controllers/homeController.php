<?php
namespace src\controllers; 
use src\modeles\courseModel;
use src\modeles\tagModel;
class homeController{
    
    public function home(){
        $itemPerPage = 12;

   
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1 ;

        
        
        $model = new courseModel();
        $count = $model->totalCourses();
        
        $totalPages =ceil($count/$itemPerPage) ;
        
        if($page <= 0 || $page >$totalPages){
            
            $page=1;
        }
        
        
        $offset = $itemPerPage * ($page-1);
        $articleModel = new courseModel();

        $motCle = isset($_GET['mot_cle']) ? $_GET['mot_cle'] : '';
        if ($motCle) {
            $courses = $articleModel->recherche($motCle,$itemPerPage ,$offset);
        } else {
            $courses = $articleModel->getSlice($itemPerPage ,$offset);
        }
        // $model = new courseModel();
        // $courses = $model->getSlice($itemPerPage,(int)$offset);
        // dd($courses);
        // $course = new courseModel();
        // $courses = $course->courseList();
        $tag = new tagModel();
        include_once "src/views/home/home_view.php";
    }
}
?>