<?php
$_SESSION["role"] !=="teacher" ? header('location: /home/view') : "";

$courses = $results;
if (!is_array($courses)) {
    $courses = [];
    error_log('Warning: $courses is not an array. Converting to empty array.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body class="bg-gray-100 font-sans">
    <script>
        <?php //if (!empty($result["status"]) and $result["status"] == "active" and isset($_SESSION["role"])): ?>
            Swal.fire({
                title: 'success!',
                text: '<?php echo "welcome teacher"; ?>',
                icon: 'success',
                confirmButtonText: 'OK',
                customClass: {
                    confirmButton: 'bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600'
                }
            });
          session_destroy();
        <?php //endif;
        ?>
    </script>
    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
            <div id="id" class="space-x-6">
                <a href="/teacher/dashboard" class="text-gray-700 hover:text-blue-500">Dashboard</a>
                <a href="/teacher/manage-courses" class="text-gray-700 hover:text-blue-500">Manage Courses</a>
                <a href="/teacher/add-course" class="text-gray-700 hover:text-blue-500">Add New Course</a>
                <a href="/teacher/statistics" class="text-gray-700 hover:text-blue-500">Statistics</b>
                <a href="/home/view" class="text-gray-700 hover:text-blue-500">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4">

        <div id="dashboard" class="mb-6">
            <h1 class="text-3xl font-bold mb-4">Welcome, Teacher Name!</h1>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Total Courses Created</h3>
                    <p class="text-3xl font-bold text-blue-600"><?=$countCourses?></p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Total Students Enrolled</h3>
                    <p class="text-3xl font-bold text-green-600">150</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Recent Activity</h3>
                    <ul class="list-disc list-inside text-gray-700">
                        <li class="mb-1">New enrollment in <a href="/teacher/course/1" class="text-blue-500 hover:text-blue-700">Course 1</a></li>
                        <li class="mb-1">New comment in <a href="/teacher/course/2" class="text-blue-500 hover:text-blue-700">Course 2</a></li>
                        <li class="mb-1">New enrollment in <a href="/teacher/course/3" class="text-blue-500 hover:text-blue-700">Course 3</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="statistics" class="">
            <h2 class="font-bold text-lg mb-2">Statistics</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Total Students Enrolled</h3>
                    <p class="text-3xl font-bold text-green-600">150</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Active Courses</h3>
                    <p class="text-3xl font-bold text-green-600">5</p>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Students per Course</h3>
                    <ul class="list-disc list-inside text-gray-700">
                        <li class="mb-1">Course Title 1: <span class="font-bold">50 students</span></li>
                        <li class="mb-1">Course Title 2: <span class="font-bold">70 students</span></li>
                        <li class="mb-1">Course Title 3: <span class="font-bold">30 students</span></li>
                    </ul>
                </div>
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Recent Activity</h3>
                    <ul class="list-disc list-inside text-gray-700">
                        <li class="mb-1">New enrollment in <a href="/teacher/course/1" class="text-blue-500 hover:text-blue-700">Course 1</a></li>
                        <li class="mb-1">New comment in <a href="/teacher/course/2" class="text-blue-500 hover:text-blue-700">Course 2</a></li>
                        <li class="mb-1">New enrollment in <a href="/teacher/course/3" class="text-blue-500 hover:text-blue-700">Course 3</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="add-course" class="">
            <h2 class="font-bold text-lg mb-2">Add New Course</h2>
            <form action="/teacher/course/addCourse" method="POST" enctype="multipart/form-data"> 
                <div class="mb-4">
                    <label for="course-title" class="block text-gray-700 text-sm font-bold mb-2">Course Title:</label>
                    <input type="text" id="course-title" name="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
                    <input type="text" id="course-description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="course-content-type" class="block text-gray-700 text-sm font-bold mb-2">Content Type:</label>
                    <select id="course-content-type" name="content_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" onchange="toggleContentInputs()">
                        <option value="video">Video</option>
                        <option value="text">Text</option>
                    </select>
                </div>
                <div id="video-upload" class="mb-4">
                    <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content Upload:</label>
                    <input type="file" name="content" id="content" accept="video/*" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div id="text-editor" class="hidden mb-4">
                    <tinymce-editor
                      api-key="no-api-key"
                      height="500"
                      menubar="false"
                      plugins="advlist autolink lists link image charmap preview anchor
                        searchreplace visualblocks code fullscreen
                        insertdatetime media table code help wordcount markdown"
                      toolbar="undo redo | blocks | bold italic backcolor |
                        alignleft aligncenter alignright alignjustify |
                        bullist numlist outdent indent | removeformat | help | markdown"
                      content_style="body
                      {
                        font-family:Helvetica,Arial,sans-serif;
                        font-size:14px
                      }">

                        <textarea id="description" name="md"></textarea>
                        </tinymce-editor>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        <?php foreach ($tags as $tag): ?>
                        <label class="inline-flex items-center">
                            <input type="checkbox" name="tags[]" value="<?php echo htmlspecialchars($tag['tagID']); ?>" class="form-checkbox h-5 w-5 text-blue-600">
                            <span class="ml-2"><?php echo htmlspecialchars($tag['tagName']); ?></span>
                        </label>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="course-category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select id="course-category" name="category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option>Select category</option>
                        <option value="1">Category A</option>
                        <option value="2">Category B</option>
                        <option value="3">Category C</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        Save & Preview
                    </button>
                </div>
            </form>
        </div>

        <div id="manage-courses" class="hidden grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <?php if (!empty($courses)):  ?>
                <?php foreach ($courses as $course): $_SESSION["content"] = $course["contentType"] ;?>
                <div class="bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer mb-4">
                    <img src="data:image/jpeg;base64,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" alt="Course Image" class="h-40 w-full object-cover">
                    <div class="p-4">
                        <h2 class="font-bold text-lg mb-2"><?php echo htmlspecialchars($course['title'] ?? '');   ?></h2>
                        <p class="text-gray-600 text-sm mb-4"><?php echo htmlspecialchars($course['description'] ?? 'No description available');  ?></p>
                        <div class="flex justify-center space-x-4 mt-6">
                            <button class="bg-transparent hover:bg-gray-200 rounded-full p-3" value="<?=$course['courseID']?>" title="Edit" onclick="showEditPopup(<?php echo (int)($course['courseID'] ?? 0); $_SESSION['title'] = $course['title'];$_SESSION['description'] = $course['description']; ?>)">
                                <i class="fas fa-edit text-blue-600 text-xl"></i>
                            </button>
                            <form method="post" action="/teacher/course/delete">
                                <input type="text" class="hidden" name="dletedID" value="<?php $_SESSION["courseID"] = $course['courseID'];?>">
                                <button class="bg-transparent hover:bg-gray-200 rounded-full p-3" type="submit" title="Delete" onclick="confirmDeleteCourse(<?php echo (int)($course['courseID'] ?? 0);?>)">
                                    <i class="fas fa-trash text-red-600 text-xl"></i>
                                </button>
                            </form>
                            <button class="bg-transparent hover:bg-gray-200 rounded-full p-3" title="View Enrollments" onclick="showEnrollmentList(<?php echo (int)($course['courseID'] ?? 0); ?>)">
                                <i class="fas fa-users text-green-600 text-xl"></i>
                            </button>
                            <button class="bg-transparent hover:bg-gray-200 rounded-full p-3" title="View Video" onclick="showVideo('<?php echo $course['contentType']; ?>' ,' <?php echo'../../../' . htmlspecialchars($course['content'] ?? ''); ?>')">
                                <i class="fas fa-play-circle text-green-600 text-xl"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="col-span-full text-center py-8">
                    <p class="text-gray-600">No courses available.</p>
                </div>src
            <?php endif; ?>
        </div>

        <div id="playlist" class="hidden bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <h2 class="font-bold text-xl mb-4">Course Playlist</h2>
            <ul class="list-disc list-inside text-gray-800" id="playlist-content">
            </ul>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4" onclick="hidePlaylist()">Close Playlist</button>
        </div>
        <div id="frame-player" class="hidden fixed inset-0 w-full h-full bg-black bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative w-full h-full max-w-6xl mx-auto p-4 flex flex-col items-center justify-center">
                <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-xl" onclick="hideDoc()()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="bg-white rounded-lg shadow-lg p-4">
                            <iframe id="doc-iframe"
                                src=""
                                class="w-full h-screen"
                                type="application/pdf">
                            </iframe>
                </div>
            </div>
        </div>
        <div id="video-player" class="hidden fixed inset-0 w-full h-full bg-black bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative w-full h-full max-w-6xl mx-auto p-4 flex flex-col items-center justify-center">
                <button class="absolute top-4 right-4 text-white hover:text-gray-300 text-xl" onclick="hideVideo()">
                    <i class="fas fa-times"></i>
                </button>
                <div class="w-full h-full flex items-center justify-center">
                    <video id="video-iframe" class="w-full h-auto max-h-[90vh]" controls>
                        <source src="" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
            </div>
        </div>

        <div id="enrollment-list" class="hidden fixed inset-0 w-full h-full bg-black bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-lg w-full max-w-2xl mx-auto p-8">
                <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 text-xl" onclick="hideEnrollmentList()">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="font-bold text-2xl mb-6">Enrolled Students</h2>
                <ul class="list-disc list-inside text-gray-700 space-y-2">
                    <li>Student 1</li>
                    <li>Student 2</li>
                    <li>Student 3</li>
                    <li>Student 4</li>
                </ul>
            </div>
        </div>

        <div id="edit-course-popup" class="hidden fixed inset-0 w-full h-full bg-black bg-opacity-75 z-50 flex items-center justify-center">
            <div class="relative bg-white rounded-lg w-full max-w-2xl mx-auto p-8">
                <button class="absolute top-4 right-4 text-gray-600 hover:text-gray-800 text-xl" onclick="hideEditPopup()">
                    <i class="fas fa-times"></i>
                </button>
                <h2 class="font-bold text-2xl mb-6">Edit Course</h2>
                <form action="/teacher/course/update" method="post">
                    <div class="mb-6">

                        <label for="edit-course-title" class="block text-gray-700 text-sm font-bold mb-2">Course Title:</label>
                        <input type="text" id="edit-course-title" value="<?=$_SESSION["title"]?>" name="title" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500">
                    </div>

                    <div class="mb-6">
                        <input type="text" name="id" value="<?php echo $_SESSION["courseID"]?>" class="hidden">
                        <label for="edit-course-description" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
                        <textarea id="edit-course-description" name="description" value="<?=$_SESSION["description"]?>" class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-blue-500 h-32"><?=$_SESSION["description"]?></textarea>
                    </div>
                    <div class="flex justify-end space-x-4">
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline" onclick="hideEditPopup()">Cancel</button>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline" onclick="saveChanges()">Save Changes</button>
                    </div>
                </form>
            </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('a:not([href="/home/view"])');
            const sections = document.querySelectorAll('main > div');
            function hideAllSections() {
                sections.forEach(section => section.classList.add('hidden'));
            }

            function showSection(sectionId) {
                hideAllSections();
                const selectedSection = document.getElementById(sectionId);
                if (selectedSection) {
                    selectedSection.classList.remove('hidden');
                }
            }

            showSection('dashboard');

            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const href = this.getAttribute('href');
                    const sectionId = href.substring(href.lastIndexOf('/') + 1);
                    showSection(sectionId);
                });
            });
        });

        function showVideo(contentType,videoSrc) {

            if(contentType === "video"){
                const videoPlayer = document.getElementById('video-iframe');
                videoPlayer.querySelector('source').src = videoSrc;
                videoPlayer.load();
                document.getElementById('video-player').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                document.addEventListener('keydown', closeVideoOnEsc);

            }else{
                docPlayer = document.getElementById('doc-iframe');
                docPlayer.src = videoSrc;
                document.getElementById('frame-player').classList.remove('hidden');
                document.body.style.overflow = 'hidden';
                
                document.addEventListener('keydown', closeVideoOnEsc);
            }            
        }

        function hideVideo() {
            const videoPlayer = document.getElementById('video-iframe');
            
            videoPlayer.pause();
            videoPlayer.querySelector('source').src = '';
            videoPlayer.load();
            document.getElementById('video-player').classList.add('hidden');
            
            document.body.style.overflow = 'auto';
            
            document.removeEventListener('keydown', closeVideoOnEsc);
        }
        function hideDoc() {
            const videoPlayer = document.getElementById('doc-iframe');
            
           
            videoPlayer.src = '';
            document.getElementById('frame-player').classList.add('hidden');
            
            document.body.style.overflow = 'auto';
            
            document.removeEventListener('keydown', closeVideoOnEsc);
        }

        function closeVideoOnEsc(event) {
            if (event.key === 'Escape') {
                hideVideo();
            }
        }

        function showEnrollmentList(courseId) {
            document.getElementById('enrollment-list').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            document.addEventListener('keydown', closeEnrollmentOnEsc);
            console.log(`Showing enrollment list for course ${courseId}`);
        }

        function hideEnrollmentList() {
            document.getElementById('enrollment-list').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.removeEventListener('keydown', closeEnrollmentOnEsc);
        }

        function closeEnrollmentOnEsc(event) {
            if (event.key === 'Escape') {
                hideEnrollmentList();
            }
        }

        function showEditPopup(courseId) {
            document.getElementById('edit-course-popup').classList.remove('hidden');
            document.body.style.overflow = 'hidden';
            document.addEventListener('keydown', closeEditPopupOnEsc);
            console.log(`Showing edit popup for course ${courseId}`);
        }

        function hideEditPopup() {
            document.getElementById('edit-course-popup').classList.add('hidden');
            document.body.style.overflow = 'auto';
            document.removeEventListener('keydown', closeEditPopupOnEsc);
        }

        function closeEditPopupOnEsc(event) {
            if (event.key === 'Escape') {
                hideEditPopup();
            }
        }

        function saveChanges() {
            // Add your save logic here
            hideEditPopup();
        }

        function confirmDeleteCourse(courseId) {
            if (confirm('Are you sure you want to delete this course?')) {
                console.log(`Deleting course ${courseId}`);
                alert('Course deleted!');
            }
        }
                    function toggleContentInputs() {
                        const contentType = document.getElementById('course-content-type').value;
                        document.getElementById('video-upload').style.display = contentType === 'video' ? 'block' : 'none';
                        document.getElementById('text-editor').style.display = contentType === 'text' ? 'block' : 'none';
                    }
                    toggleContentInputs();

        function initializeTinyMCE() {
            const script = document.createElement('script');
            script.src = 'https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js';
            script.onload = function() {
                tinymce.init({
                    selector: '#description',
                    height: 500,
                    menubar: false,
                    plugins: [
                        'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 
                        'preview', 'anchor', 'searchreplace', 'visualblocks', 
                        'code', 'fullscreen', 'insertdatetime', 'media', 
                        'table', 'code', 'help', 'wordcount', 'markdown'
                    ],
                    toolbar: 'undo redo | blocks | bold italic backcolor | ' +
                            'alignleft aligncenter alignright alignjustify | ' +
                            'bullist numlist outdent indent | removeformat | help | markdown',
                    content_style: 'body { font-family: Helvetica,Arial,sans-serif; font-size:14px }',
                    
                    browser_spellcheck: true,
                    contextmenu: false,
                    entity_encoding: 'raw',
                    convert_urls: false,
                    
                    setup: function(editor) {
                        editor.on('init', function() {
                            const editorContainer = document.querySelector('.tox.tox-tinymce');
                            if (editorContainer) {
                                editorContainer.style.visibility = 'visible';
                            }
                        });
                    
                        editor.on('change', function() {
                            const content = editor.getContent();
                        });
                    }
                });
            };
            
            script.onerror = function() {
                console.error('Failed to load TinyMCE script');
                const editorContainer = document.getElementById('text-editor');
                if (editorContainer) {
                    editorContainer.innerHTML = '<div class="text-red-500">Failed to load text editor. Please refresh the page.</div>';
                }
            };
            
            document.body.appendChild(script);
        }
        
        document.addEventListener('DOMContentLoaded', initializeTinyMCE);
        
        function destroyTinyMCE() {
            if (window.tinymce) {
                tinymce.get('description')?.remove();
            }
        }
    </script>
  
</body>
</html>