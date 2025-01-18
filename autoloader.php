<?php

class autoloader {
    public static function register(){
        spl_autoload_register(function ($class){
            error_log("Autoloader called for class: " . $class);
            
            $directPath = __DIR__ . "/" . str_replace("\\", "/", $class) . ".php";
            error_log("Trying direct path: " . $directPath);
            
            if(file_exists($directPath)) {
                error_log("Found file at direct path");
                require_once $directPath;
                return true;
            }
            
            $parts = explode('\\', $class);
            if (count($parts) > 1) {
                $fileName = end($parts) . '.php';
                $possiblePaths = [
                    __DIR__ . "/config/" . $fileName,
                    __DIR__ . "/src/" . $fileName
                ];

                foreach ($possiblePaths as $path) {
                    error_log("Trying path: " . $path);
                    if(file_exists($path)) {
                        error_log("Found file at: " . $path);
                        require_once $path;
                        return true;
                    }
                }
            }
            
            error_log("Could not find file for class: " . $class);
            return false;
        });
    }
}

?>