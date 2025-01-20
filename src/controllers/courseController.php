<?php
namespace src\controllers;
use src\classes\course;
use src\modeles\courseModel;
use src\modeles\videoModel;
use src\modeles\documentModel;

class courseController{
    public function addCourse(){
        $title = htmlspecialchars(trim($_POST["title"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $tags = $_POST["tags"];
        $category = htmlspecialchars(trim($_POST["category"]));
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        if($_POST["content_type"] === "video"){
            
            $targetDir = "uploads/";
            if (!is_dir($targetDir)) {
                if (!mkdir($targetDir, 0777, true)) {
                    error_log("Failed to create uploads directory");
                    echo "Failed to create uploads directory";
                    return;
                }
                chmod($targetDir, 0777);
            }
            
            error_log("POST data: " . print_r($_POST, true));
            error_log("FILES data: " . print_r($_FILES, true));
            
            if (!isset($_FILES['content']) || empty($_FILES['content'])) {
                echo "No file was uploaded or the upload failed.";
                return;
            }
            
            $videoFile = $_FILES['content'];
            $targetFilePath = $targetDir . basename($videoFile['name']);
            $uploadOk = 1;
            
            
            $allowedTypes = ['video/mp4', 'video/mov', 'video/avi'];
            if (!in_array($videoFile['type'], $allowedTypes)) {
                echo  "Only MP4, MOV, and AVI files are allowed.";
                $uploadOk = 0;
            }
            
            if ($uploadOk && move_uploaded_file($videoFile['tmp_name'], $targetFilePath)) {
                $id = $_SESSION["teacherID"];
                $obj = new course($title,$description,$targetFilePath,$category);
                $objet = new videoModel();
                $obje = new courseModel();
                $stmt = $objet->courseAdd($obj,$id);
                    foreach($tags as $tag){
                       $obje->course_tags($tag,$stmt);
                    }
                if ($stmt){
                    header('location: /teacher/dashboard');
                } else {
                    echo "Failed to save video to database: " . $stmt->error;
                }
            } else {
                $err =  "Error uploading the video.";
            }
            
            
        }
        elseif($_POST["content_type"] == "text"){
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $md = $_POST["md"];
                $title = htmlspecialchars(trim($_POST["title"]));
                $description = htmlspecialchars(trim($_POST["description"]));
            $tags = $_POST["tags"];
            $category = htmlspecialchars(trim($_POST["category"]));
            $id = $_SESSION["teacherID"];
            $uploadsDir ='uploads/';
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0755, true);
            }
            
            $timestamp = date('Y-m-d_H-i-s');
            $filename = $uploadsDir . $timestamp . '_content.md';
            
            $mdFilePath = $filename;
            
            $obj = new course($title,$description,$mdFilePath,$category);
            $objet = new documentModel();
            $obje = new courseModel();
            $stmt = $objet->courseAdd($obj,$id);
            foreach($tags as $tag){
                $obje->course_tags($tag,$stmt);
            }
            file_put_contents($filename, $md);
            if ($stmt){
                header('location: /teacher/dashboard');
            } else {
                echo "Failed to save video to database: " . $stmt->error;
            }
        }
    }
}
    
}
    
    public function deleteCourse(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = htmlspecialchars(trim($_POST["dletedID"]));
            $obg = new courseModel();
            $obg->courseDelete($id);
            header('location: /teacher/dashboard');
        }
    }

    public function updateCourse(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $title = htmlspecialchars(trim($_POST["title"]));
            $description = htmlspecialchars(trim($_POST["description"]));
            $id=$_POST["id"];
            $obg = new courseModel();
            
            $obg->courseUpdate($id,$title,$description);
            unset($_SESSION["title"]);
            unset($_SESSION["description"]);
            unset($_SESSION["courseID"]);
            header('location: /teacher/dashboard');
        }
    }

    public function handlMarkdown(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $md = $_POST["markDOWN"];
            $title = htmlspecialchars(trim($_POST["title"]));
        $description = htmlspecialchars(trim($_POST["description"]));
        $tags = $_POST["tags"];
        $category = htmlspecialchars(trim($_POST["category"]));
        $id = $_SESSION["teacherID"];
        $obj = new course($title,$description,$md,$category);
        $objet = new videoModel();
        $obje = new courseModel();
        $stmt = $objet->courseAdd($obj,$id);
            foreach($tags as $tag){
               $obje->course_tags($tag,$stmt);
            }
        if ($stmt){
            header('location: /teacher/dashboard');
        } else {
            echo "Failed to save video to database: " . $stmt->error;
        }
        }
    }
}