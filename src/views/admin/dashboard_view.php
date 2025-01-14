<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100 font-sans">

<nav class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-gray-800">Youdemy</a>
            <div class="space-x-6">
                <a href="#" class="text-gray-700 hover:text-blue-500">Dashboard</a>
                <a href="/login" class="text-gray-700 hover:text-blue-500">Log out </a>

            </div>
        </div>
    </nav>

    <div class="container mx-auto p-8">
        <h1 class="text-5xl font-bold text-center mb-10 text-gray-800">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
            <div class="bg-gradient-to-r from-blue-400 to-blue-600 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                <h2 class="font-bold text-2xl mb-2">User Management</h2>
                <p class="text-lg mb-2">Total Users: <span class="font-bold">150</span></p>
                <p class="text-lg mb-2">Pending Signups: <span class="font-bold">10</span></p>
                <div class="mt-4 flex flex-wrap space-x-4">
                    <button class="bg-blue-600 text-white font-bold py-1 px-3 rounded shadow hover:bg-blue-800" onclick="showAllUsers()">All Users</button>
                    <button class="bg-yellow-600 text-white font-bold py-1 px-3 rounded shadow hover:bg-yellow-800" onclick="showPendingUsers()">Pending</button>
                    <button class="bg-green-600 text-white font-bold py-1 px-3 rounded shadow hover:bg-green-800" onclick="showActiveUsers()">Active</button>
                    <button class="bg-red-600 text-white font-bold py-1 px-3 rounded shadow hover:bg-red-800" onclick="showBannedUsers()">Banned</button>
                </div>
            </div>
            <div class="bg-gradient-to-r from-green-400 to-green-600 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                <h2 class="font-bold text-2xl mb-2">Content Management</h2>
                <p class="text-lg mb-2">Total Courses: <span class="font-bold">100</span></p>
                <p class="text-lg mb-2">Total Categories: <span class="font-bold">15</span></p>
                <p class="text-lg mb-2">Total Tags: <span class="font-bold">50</span></p>
                <div class="mt-4">
                    <button class="bg-white text-green-600 font-bold py-2 px-4 rounded shadow hover:bg-gray-200 mb-2" onclick="manageContent()">Manage Content</button>
                    <button class="bg-white text-indigo-600 font-bold py-2 px-4 rounded shadow hover:bg-gray-200" onclick="bulkInsertTags()">Bulk Insert Tags</button>
                </div>
            </div>
            <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 text-white shadow-lg rounded-lg p-6 transition-transform transform hover:scale-105">
                <h2 class="font-bold text-2xl mb-2">Statistics</h2>
                <p class="text-lg mb-2">Total Courses: <span class="font-bold">100</span></p>
                <p class="text-lg mb-2">Top Course: <span class="font-bold">Data Structures and Algorithms</span></p>
                <p class="text-lg mb-2">Top 3 Teachers: <span class="font-bold">Michael Brown, Sophia Lee, David Kim</span></p>
                <button class="bg-white text-yellow-600 font-bold py-2 px-4 rounded shadow hover:bg-gray-200" onclick="viewStatistics()">View Statistics</button>
            </div>
        </div>

        <div id="manage-content" class="hidden bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="font-bold text-2xl mb-4 text-purple-600">All Courses</h2>
            <table class="min-w-full bg-white shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4">Course Name</th>
                        <th class="py-3 px-4">Description</th>
                        <th class="py-3 px-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-2 px-4">Course 1</td>
                        <td class="border py-2 px-4">Description for Course 1</td>
                        <td class="border py-2 px-4">
                            <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="deleteCourse('Course 1')">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">Course 2</td>
                        <td class="border py-2 px-4">Description for Course 2</td>
                        <td class="border py-2 px-4">
                            <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="deleteCourse('Course 2')">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleManageContent()">Close</button>
        </div>

        <div id="bulk-insert-tags" class="hidden bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="font-bold text-2xl mb-4 text-purple-600">Bulk Insert Tags</h2>
            <form id="add-tags-form" class="mb-4">
                <label for="tags" class="block mb-2">Add Tags:</label>
                <input type="text" id="tags" class="border rounded p-2 w-full" placeholder="Enter tags separated by commas">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded mt-2">Add Tags</button>
            </form>
            <form id="add-category-form">
                <label for="category" class="block mb-2">Add Category:</label>
                <input type="text" id="category" class="border rounded p-2 w-full" placeholder="Enter category name">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded mt-2">Add Category</button>
            </form>
            <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleBulkInsertTags()">Close</button>
        </div>

        <div id="user-table" class="hidden bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="font-bold text-2xl mb-4 text-purple-600">All Users</h2>
            <table class="min-w-full bg-white shadow-lg rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="py-3 px-4">Name</th>
                        <th class="py-3 px-4">Email</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border py-2 px-4">Alice Johnson</td>
                        <td class="border py-2 px-4">alice@example.com</td>
                        <td class="border py-2 px-4">Active</td>
                        <td class="border py-2 px-4">
                            <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('alice@example.com')">Activate</button>
                            <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('alice@example.com')">Ban</button>
                        </td>
                    </tr>
                    <tr>
                        <td class="border py-2 px-4">Jane Smith</td>
                        <td class="border py-2 px-4">jane@example.com</td>
                        <td class="border py-2 px-4">Pending</td>
                        <td class="border py-2 px-4">
                            <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('jane@example.com')">Activate</button>
                            <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('jane@example.com')">Ban</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
        </div>

        <div id="statistics" class="hidden bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="font-bold text-2xl mb-4 text-purple-600">Statistics Charts</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-bold text-lg mb-2">Course Distribution</h3>
                    <canvas id="courseDistributionChart" width="400" height="200"></canvas>
                    <script>
                        var ctx = document.getElementById('courseDistributionChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: ['Course 1', 'Course 2', 'Course 3', 'Course 4', 'Course 5'],
                                datasets: [{
                                    label: 'Course Distribution',
                                    data: [10, 20, 15, 30, 25],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(153, 102, 255, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(153, 102, 255, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
                <div class="bg-gray-100 p-4 rounded-lg">
                    <h3 class="font-bold text-lg mb-2">Top Teachers</h3>
                    <canvas id="topTeachersChart" width="400" height="200"></canvas>
                    <script>
                        var ctx = document.getElementById('topTeachersChart').getContext('2d');
                        var chart = new Chart(ctx, {
                            type: 'pie',
                            data: {
                                labels: ['Michael Brown', 'Sophia Lee', 'David Kim'],
                                datasets: [{
                                    label: 'Top Teachers',
                                    data: [30, 20, 50],
                                    backgroundColor: [
                                        'rgba(255, 99, 132, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(255, 206, 86, 0.2)'
                                    ],
                                    borderColor: [
                                        'rgba(255, 99, 132, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(255, 206, 86, 1)'
                                    ],
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero: true
                                        }
                                    }]
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleStatistics()">Close</button>
        </div>

        <script>
            function toggleUserTable() {
                const table = document.getElementById('user-table');
                table.classList.toggle('hidden');
            }
            function showUserOptions() {
                const options = document.getElementById('user-options');
                options.classList.toggle('hidden');
            }
            function manageContent() {
                const manageContentDiv = document.getElementById('manage-content');
                manageContentDiv.classList.toggle('hidden');
            }
            function bulkInsertTags() {
                const bulkInsertDiv = document.getElementById('bulk-insert-tags');
                bulkInsertDiv.classList.toggle('hidden');
            }
            function showAllUsers() {
                document.getElementById('user-table').classList.remove('hidden');
                document.getElementById('user-table').innerHTML = `
                    <h2 class="font-bold text-2xl mb-4 text-purple-600">All Users</h2>
                    <table class="min-w-full bg-white shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border py-2 px-4">Alice Johnson</td>
                                <td class="border py-2 px-4">alice@example.com</td>
                                <td class="border py-2 px-4">Active</td>
                                <td class="border py-2 px-4">
                                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('alice@example.com')">Activate</button>
                                    <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('alice@example.com')">Ban</button>
                                </td>
                            </tr>
                            <tr>
                                <td class="border py-2 px-4">Jane Smith</td>
                                <td class="border py-2 px-4">jane@example.com</td>
                                <td class="border py-2 px-4">Pending</td>
                                <td class="border py-2 px-4">
                                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('jane@example.com')">Activate</button>
                                    <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('jane@example.com')">Ban</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
            }
            function showPendingUsers() {
                document.getElementById('user-table').classList.remove('hidden');
                document.getElementById('user-table').innerHTML = `
                    <h2 class="font-bold text-2xl mb-4 text-purple-600">Pending Users</h2>
                    <table class="min-w-full bg-white shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border py-2 px-4">Jane Smith</td>
                                <td class="border py-2 px-4">jane@example.com</td>
                                <td class="border py-2 px-4">Pending</td>
                                <td class="border py-2 px-4">
                                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('jane@example.com')">Activate</button>
                                    <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('jane@example.com')">Ban</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
            }
            function showActiveUsers() {
                document.getElementById('user-table').classList.remove('hidden');
                document.getElementById('user-table').innerHTML = `
                    <h2 class="font-bold text-2xl mb-4 text-purple-600">Active Users</h2>
                    <table class="min-w-full bg-white shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border py-2 px-4">Alice Johnson</td>
                                <td class="border py-2 px-4">alice@example.com</td>
                                <td class="border py-2 px-4">Active</td>
                                <td class="border py-2 px-4">
                                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('alice@example.com')">Activate</button>
                                    <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('alice@example.com')">Ban</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
            }
            function showBannedUsers() {
                document.getElementById('user-table').classList.remove('hidden');
                document.getElementById('user-table').innerHTML = `
                    <h2 class="font-bold text-2xl mb-4 text-purple-600">Banned Users</h2>
                    <table class="min-w-full bg-white shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="border py-2 px-4">Bob Johnson</td>
                                <td class="border py-2 px-4">bob@example.com</td>
                                <td class="border py-2 px-4">Banned</td>
                                <td class="border py-2 px-4">
                                    <button class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded" onclick="activateUser('bob@example.com')">Activate</button>
                                    <button class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded" onclick="banUser('bob@example.com')">Ban</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
            }
            function activateUser(email) {
                console.log(`Activating user ${email}`);
                // Implement logic to activate user
            }
            function banUser(email) {
                console.log(`Banning user ${email}`);
                // Implement logic to ban user
            }
            function viewStatistics() {
                const statistics = document.getElementById('statistics');
                statistics.classList.remove('hidden');
            }
            function toggleStatistics() {
                const statistics = document.getElementById('statistics');
                statistics.classList.toggle('hidden');
            }
            function toggleManageContent() {
                const manageContentDiv = document.getElementById('manage-content');
                manageContentDiv.classList.toggle('hidden');
            }
            function toggleBulkInsertTags() {
                const bulkInsertDiv = document.getElementById('bulk-insert-tags');
                bulkInsertDiv.classList.toggle('hidden');
            }
        </script>
    </div>
</body>
</html>
