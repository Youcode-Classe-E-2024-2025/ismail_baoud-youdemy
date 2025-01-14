<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">

    <nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
            <div class="space-x-6">
                <a href="/teacher/dashboard" class="text-gray-700 hover:text-blue-500">Dashboard</a>
                <a href="/teacher/manage-courses" class="text-gray-700 hover:text-blue-500">Manage Courses</a>
                <a href="/teacher/add-course" class="text-gray-700 hover:text-blue-500">Add New Course</a>
                <a href="/teacher/statistics" class="text-gray-700 hover:text-blue-500">Statistics</a>
                <a href="/logout" class="text-gray-700 hover:text-blue-500">Logout</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-8 p-4">
        <div id="dashboard" class="mb-6">
            <h1 class="text-3xl font-bold mb-4">Welcome, Teacher Name!</h1>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <div class="bg-white shadow-lg rounded-lg p-6 mb-4 border border-gray-200">
                    <h3 class="text-lg font-semibold mb-2">Total Courses Created</h3>
                    <p class="text-3xl font-bold text-blue-600">10</p>
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
            <form>
                <div class="mb-4">
                    <label for="course-title" class="block text-gray-700 text-sm font-bold mb-2">Course Title:</label>
                    <input type="text" id="course-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="course-description" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
                    <textarea id="course-description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <div class="mb-4">
                    <label for="course-content" class="block text-gray-700 text-sm font-bold mb-2">Content Upload:</label>
                    <input type="file" id="course-content" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="course-tags" class="block text-gray-700 text-sm font-bold mb-2">Tags:</label>
                    <input type="text" id="course-tags" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter tags separated by commas">
                </div>
                <div class="mb-4">
                    <label for="course-category" class="block text-gray-700 text-sm font-bold mb-2">Category:</label>
                    <select id="course-category" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option>Select category</option>
                        <option>Category A</option>
                        <option>Category B</option>
                        <option>Category C</option>
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
            <div class="bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer mb-4">
                <img src="https://www.classcentral.com/report/wp-content/uploads/2021/02/coursera-free-courses.png" alt="Course Image" class="h-40 w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-lg mb-2">Course Title 1</h2>
                    <p class="text-gray-700 mb-2">Students Enrolled: 50</p>
                    <div class="flex space-x-2 mt-4">
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Edit" onclick="showEditPopup(1)">
                            <i class="fas fa-edit text-blue-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Delete" onclick="confirmDeleteCourse(1)">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Enrollments" onclick="showEnrollmentList(1)">
                            <i class="fas fa-users text-green-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Playlist" onclick="showPlaylist(1)">
                            <i class="fas fa-play-circle text-green-600"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer mb-4">
                <img src="https://www.classcentral.com/report/wp-content/uploads/2021/02/coursera-free-courses.png" alt="Course Image" class="h-40 w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-lg mb-2">Course Title 2</h2>
                    <p class="text-gray-700 mb-2">Students Enrolled: 70</p>
                    <div class="flex space-x-2 mt-4">
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Edit" onclick="showEditPopup(2)">
                            <i class="fas fa-edit text-blue-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Delete" onclick="confirmDeleteCourse(2)">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Enrollments" onclick="showEnrollmentList(2)">
                            <i class="fas fa-users text-green-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Playlist" onclick="showPlaylist(2)">
                            <i class="fas fa-play-circle text-green-600"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden cursor-pointer mb-4">
                <img src="https://www.classcentral.com/report/wp-content/uploads/2021/02/coursera-free-courses.png" alt="Course Image" class="h-40 w-full object-cover">
                <div class="p-4">
                    <h2 class="font-bold text-lg mb-2">Course Title 3</h2>
                    <p class="text-gray-700 mb-2">Students Enrolled: 30</p>
                    <div class="flex space-x-2 mt-4">
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Edit" onclick="showEditPopup(3)">
                            <i class="fas fa-edit text-blue-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Delete" onclick="confirmDeleteCourse(3)">
                            <i class="fas fa-trash text-red-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Enrollments" onclick="showEnrollmentList(3)">
                            <i class="fas fa-users text-green-600"></i>
                        </button>
                        <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="View Playlist" onclick="showPlaylist(3)">
                            <i class="fas fa-play-circle text-green-600"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div id="playlist" class="hidden bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <h2 class="font-bold text-xl mb-4">Course Playlist</h2>
            <ul class="list-disc list-inside text-gray-800" id="playlist-content">
            </ul>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4" onclick="hidePlaylist()">Close Playlist</button>
        </div>

        <div id="video-player" class="hidden bg-white shadow-lg rounded-lg p-6 max-w-md mx-auto">
            <h2 class="font-bold text-xl mb-4">Video Player</h2>
            <iframe id="video-iframe" class="w-full rounded-lg" height="315" src="" frameborder="0" allowfullscreen></iframe>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4" onclick="hideVideo()">Close Video</button>
        </div>

        <div id="enrollment-list" class="hidden bg-white shadow rounded-lg p-4">
            <h2 class="font-bold text-lg mb-2">Enrolled Students</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Student 1</li>
                <li>Student 2</li>
                <li>Student 3</li>
                <li>Student 4</li>
            </ul>
            <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded mt-4" onclick="hideEnrollmentList()">Close Enrollment List</button>
        </div>

        <div id="edit-course-popup" class="hidden fixed inset-0 bg-gray-800 bg-opacity-50 flex justify-center items-center">
            <div class="bg-white rounded-lg p-6 max-w-md w-full">
                <h2 class="font-bold text-xl mb-4">Edit Course</h2>
                <form>
                    <div class="mb-4">
                        <label for="edit-course-title" class="block text-gray-700 text-sm font-bold mb-2">Course Title:</label>
                        <input type="text" id="edit-course-title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="edit-course-description" class="block text-gray-700 text-sm font-bold mb-2">Course Description:</label>
                        <textarea id="edit-course-description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="saveChanges()">Save Changes</button>
                        <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded ml-2" onclick="hideEditPopup()">Cancel</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="mt-6 flex justify-center">
            <div class="mt-4 flex flex-wrap space-x-4">
                <button class="inline-block px-6 py-2.5 bg-indigo-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-indigo-700 hover:shadow-lg focus:bg-indigo-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-indigo-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showAllCourses()">All Courses</button>
                <button class="inline-block px-6 py-2.5 bg-green-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-green-700 hover:shadow-lg focus:bg-green-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-green-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showMyCourses()">My Courses</button>
                <button class="inline-block px-6 py-2.5 bg-yellow-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-yellow-700 hover:shadow-lg focus:bg-yellow-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-yellow-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showPendingCourses()">Pending</button>
                <button class="inline-block px-6 py-2.5 bg-red-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-red-700 hover:shadow-lg focus:bg-red-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-red-800 active:shadow-lg transition duration-150 ease-in-out" onclick="showBannedCourses()">Banned</button>
            </div>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const navLinks = document.querySelectorAll('nav a');
            const sections = document.querySelectorAll('main > div');

            // Function to hide all sections
            function hideAllSections() {
                sections.forEach(section => section.classList.add('hidden'));
            }

            // Function to show the selected section
            function showSection(sectionId) {
                hideAllSections();
                const selectedSection = document.getElementById(sectionId);
                if (selectedSection) {
                    selectedSection.classList.remove('hidden');
                }
            }

            // Initially show the dashboard content
            showSection('dashboard');

            // Add click event listeners to navigation links
            navLinks.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const href = this.getAttribute('href');
                    const sectionId = href.substring(href.lastIndexOf('/') + 1);
                    showSection(sectionId);
                });
            });
        });

        function showVideo(videoSrc) {
            document.getElementById('video-iframe').src = videoSrc.replace('watch?v=', 'embed/');
            document.getElementById('video-player').classList.remove('hidden');
        }

        function hideVideo() {
            document.getElementById('video-player').classList.add('hidden');
            document.getElementById('video-iframe').src = ''; // Clear the video source
        }

        function showPlaylist(courseId) {
            document.getElementById('playlist').classList.remove('hidden');
            const playlistContent = document.getElementById('playlist-content');
            playlistContent.innerHTML = '';
            // Logic to fetch and display playlist for the course goes here
            const playlist = [
                { title: 'Video 1: Introduction to the Course', src: 'https://www.youtube.com/embed/L1VZRY84GVs?si=z-2rVJy2uorAE19_' },
                { title: 'Video 2: Understanding the Basics', src: 'https://www.youtube.com/embed/L1VZRY84GVs?si=z-2rVJy2uorAE19_' },
                { title: 'Video 3: Advanced Topics', src: 'https://www.youtube.com/embed/L1VZRY84GVs?si=z-2rVJy2uorAE19_' },
                { title: 'Document: Course Materials' }
            ];
            playlist.forEach(item => {
                const li = document.createElement('li');
                li.classList.add('flex', 'justify-between', 'items-center', 'mb-2');
                if (item.src) {
                    li.innerHTML = `${item.title} <button class="bg-transparent hover:bg-gray-200 rounded-full p-2" title="Watch Video" onclick="showVideo('${item.src}')"><i class="fas fa-play-circle text-blue-600"></i></button>`;
                } else {
                    li.innerHTML = item.title;
                }
                playlistContent.appendChild(li);
            });
        }

        function hidePlaylist() {
            document.getElementById('playlist').classList.add('hidden');
        }

        function showEnrollmentList(courseId) {
            document.getElementById('enrollment-list').classList.remove('hidden');
            // Logic to fetch and display enrolled students for the course goes here
            console.log(`Showing enrollment list for course ${courseId}`);
        }

        function hideEnrollmentList() {
            document.getElementById('enrollment-list').classList.add('hidden');
        }

        function showEditPopup(courseId) {
            document.getElementById('edit-course-popup').classList.remove('hidden');
            // Logic to fetch and display course details for editing goes here
            console.log(`Showing edit popup for course ${courseId}`);
        }

        function hideEditPopup() {
            document.getElementById('edit-course-popup').classList.add('hidden');
        }

        function saveChanges() {
            // Logic to save changes goes here
            hideEditPopup();
        }

        function confirmDeleteCourse(courseId) {
            if (confirm('Are you sure you want to delete this course?')) {
                // Logic to delete the course goes here
                console.log(`Deleting course ${courseId}`);
                alert('Course deleted!');
            }
        }
    </script>
</body>
</html>