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
        <form method="GET" action="/home/view">
            <input type="text" placeholder="Search for courses..." name="mot_cle" value="<?= htmlspecialchars($_GET['mot_cle'] ?? '') ?>"
            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
           
        </form>
            </div>
        
        
        
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if (!empty($courses)): ?>
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
                   
                </div>
            </div>
        <?php endforeach; ?>
        <?php else: ?>
        <p>Aucun article trouvé.</p>
    <?php endif; ?>
        </div>
        <div class="flex justify-center mt-6">
        <nav class="inline-flex rounded-md shadow-sm">
        <?php if ($page > 1): ?>
            <a href="?page=<?= $page - 1 ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50" aria-label="Previous page">Précédent</a>
        <?php else: ?>
            <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-l-md" aria-disabled="true" aria-label="Previous page">Précédent</span>
        <?php endif; ?>
                <?php if ($totalPages <= 7): ?>
            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?page=<?= $i ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 <?= $i == $page ? 'bg-gray-200' : '' ?>" aria-label="Page <?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>
        <?php else: ?>
            <a href="?page=1" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 <?= $page == 1 ? 'bg-gray-200' : '' ?>" aria-label="Page 1">1</a>
            
            <?php if ($page > 4): ?>
                <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300">...</span>
            <?php endif; ?>

            <?php 
            $start = max(2, $page - 2);
            $end = min($totalPages - 1, $page + 2);
            for ($i = $start; $i <= $end; $i++): ?>
                <a href="?page=<?= $i ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 <?= $i == $page ? 'bg-gray-200' : '' ?>" aria-label="Page <?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages - 3): ?>
                <span class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300">...</span>
            <?php endif; ?>

            <a href="?page=<?= $totalPages ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 <?= $page == $totalPages ? 'bg-gray-200' : '' ?>" aria-label="Page <?= $totalPages ?>"><?= $totalPages ?></a>
        <?php endif; ?>



        <?php if ($page < $totalPages): ?>
            <a href="/home/view?page=<?= $page + 1 ?>" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50" aria-label="Next page">Suivant</a>
        <?php else: ?>
            <span class="px-4 py-2 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-r-md" aria-disabled="true" aria-label="Next page">Suivant</span>
        <?php endif; ?>
    </nav>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-4 mt-8">
        <div class="container mx-auto text-center">
            <p>&copy; <?= date('Y') ?> Youdemy. All rights reserved.</p>
            <div class="mt-2">
                <a href="/terms" class="text-gray-400 hover:text-gray-300">Terms of Service</a> | 
                <a href="/privacy" class="text-gray-400 hover:text-gray-300">Privacy Policy</a>
            </div>
        </div>
    </footer>

</body>
</html>