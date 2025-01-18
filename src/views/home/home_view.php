<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Courses</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-white shadow-md py-4">
    <div class="container mx-auto flex justify-between items-center">
        <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
        <div class="space-x-6">
            <a href="/login" class="text-gray-700 hover:text-blue-500">Login</a>
            <a href="/signup" class="text-gray-700 hover:text-blue-500">Register</a>
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
            $tags = $tag->tagCourse($course["courseID"]);
        ?>
            <div class="bg-white shadow rounded-lg overflow-hidden cursor-pointer" onclick="window.location.href='/login'">
                <img src="https://www.classcentral.com/report/wp-content/uploads/2021/02/coursera-free-courses.png" alt="Course Image" class="h-40 w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-lg mb-2"><?=$course["title"]?></h2>
                    <p class="text-gray-700 mb-2"><?=$course["description"]?></p>
                    <div class="flex flex-wrap gap-2 mb-2">
                        <?php foreach($tags as $Tag): ?>
                            <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded"><?=$Tag["tagName"]?></span>
                        <?php endforeach; ?>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded"><?=$course["categoryName"]?></span>
                    </div>
                    <p class="text-sm text-gray-600">By <?=$course["firstName"]?> <?=$course["lastName"]?></p>
                    <div class="mt-2">
                        <span class="text-gray-500">Followers: 150</span>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        </div>

        <div class="mt-6 flex justify-center">
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mr-2 disabled">Previous</button>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2">Next</button>
        </div>

    </main>


</body>
</html>