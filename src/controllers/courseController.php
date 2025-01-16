<?php
namespace src\controllers;
use src\classes\course;
use src\modeles\courseModel;
class courseController{
    public function addCourse(){
        $title = $_POST["title"];
        $description = $_POST["description"];
        $tags = $_POST["tags"];
        $category = $_POST["category"];
        if($_SERVER["REQUEST_METHOD"] == "POST"){

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
               
                    $obj = new course($title,$description,$targetFilePath,$category);
                    $objet = new courseModel();
                    $stmt = $objet->courseAdd($obj);
                    foreach($tags as $tag){
                       $objet->course_tags($tag,$stmt);
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
    }
}