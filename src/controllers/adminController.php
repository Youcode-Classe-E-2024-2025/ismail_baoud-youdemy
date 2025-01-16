<?php

namespace src\controllers;
error_reporting(E_ALL);
ini_set('display_errors', 1);
use src\classes\category;
use src\modeles\categoryModel;
use src\classes\tag;
use src\modeles\tagModel;
class adminController{
    public function dashboard(){
        include_once  "src/views/admin/dashboard_view.php";
    }
    public function addCategory(){
        $category = $_POST["category"];
        $obj = new category($category);
        $objet = new categoryModel();
        $res = $objet->categoryInsert($obj);
        echo $res;
    }
    public function addTag(){
        $tag = $_POST["tags"];
        $tags = explode(",", $tag);
        foreach($tags as $tag){
            $obj = new tag($tag);
            $objet = new tagModel();
            $res = $objet->tagInsert($obj);
            echo $res;
        }
    }
    
    
}
?>