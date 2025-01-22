<?php

$_SESSION["role"] !=="student" ? header('location: /home/view') : "";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
            <div class="space-x-6">
                <a href="#" class="text-gray-700 hover:text-blue-500">AllCourses</a>
                <a href="/student/mycourses" class="text-gray-700 hover:text-blue-500">MyCourses</a>
                <a href="/logout" class="text-gray-700 hover:text-blue-500">Log out </a>

            </div>
        </div>
    </nav>


    <main class="container mx-auto mt-8 p-4">

        <div class="mb-6">
            <input type="text" placeholder="Search for courses..."
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
        <?php foreach($courses as $course):
            $courseTags = $tagModel->tagCourse($course["courseID"]);
        ?>
        
        <div class="bg-white shadow rounded-lg overflow-hidden cursor-pointer">
            <img src="https://www.classcentral.com/report/wp-content/uploads/2021/02/coursera-free-courses.png" alt="Course Image" class="h-40 w-full object-cover">
            <div class="p-4">
                <h2 class="font-bold text-lg mb-2"><?=$course["title"]?></h2>
                <p class="text-gray-700 mb-2">By <?=$course["firstName"]?> <?=$course["lastName"]?></p>
                <div class="flex space-x-2 mb-2">
                    <?php foreach($courseTags as $Tag): ?>
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded"><?=$Tag["tagName"]?></span>
                        <?php endforeach; ?>
                        <span class="bg-gray-200 text-gray-700 text-xs py-1 px-2 rounded"><?=$course["categoryName"]?></span>
                    </div>
                    <div class="mt-2 flex justify-between items-center">
                        <input type="text" class="hidden" >
                        <form action="/student/dashboard/enrollement" method="POST">
                            <input type="text" class="hidden" name="courseID" value="<?=$course["courseID"]?>">
                            <input type="text" class="hidden" name="studentID" value="<?=$_SESSION["studentid"]?>">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3 rounded">Add Course</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

            
        </div>
        


    </main>

</body>
</html>