
<?php

$_SESSION["role"] !=="admin" ? header('location: /home/view') : "";

?>
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
                <a href="/logout" class="text-gray-700 hover:text-blue-500">Log out </a>
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
                <?php foreach($courses as $course): ?>
                    <tr>
                        <td class="border py-2 px-4"><?=$course['title']?></td>
                        <td class="border py-2 px-4"><?=$course['description']?></td>
                        <td class="border py-2 px-4">
                        <form action="/admin/course/changeStatus" method="POST" style="display:inline;">
                            <input type="hidden" name="status" value="deactivate">
                            <input type="hidden" name="courseid" value="<?=$course['courseID']?>">
                            <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded">Delete</button>
                        </form>
                </td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>
            <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleManageContent()">Close</button>
        </div>

        <div id="bulk-insert-tags" class="hidden bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="font-bold text-2xl mb-4 text-purple-600">Bulk Insert Tags</h2>
            <form action="/dashboard/tag" method="post" id="" class="mb-4">
                <label for="tags" class="block mb-2">Add Tags:</label>
                <input type="text" name="tags" id="tags" class="border rounded p-2 w-full" placeholder="Enter tags separated by commas">
                <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-2 px-4 rounded mt-2">Add Tags</button>
            </form>
            <form action="/dashboard/category" method="post" id="add-category-form">
                <label for="category" class="block mb-2">Add Category:</label>
                <input type="text" name="category" id="category" class="border rounded p-2 w-full" placeholder="Enter category name">
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
                <tbody id="userTableBody">
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
                        <tbody id="userTableBody">

                        <?php foreach($allUsers as $result): ?>
                            <tr class="bg-gray-200">
        <th class="py-3 px-4"><?=$result['firstName']?> <?=$result['lastName']?></th>
        <th class="py-3 px-4"><?=$result['email']?></th>
        <th class="py-3 px-4"><?=$result['status']?></th>
        <td class="border py-2 px-4">
            <form action="/admin/users/changeStatus" method="POST" style="display:inline;">
                <input type="hidden" name="status" value="deactivate">
                <input type="hidden" name="userid" value="<?=$result['userID']?>">
            </form>
        </td>
    </tr>
    <?php endforeach;?>
                          
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
                // Here you would typically fetch users from the backend
                fetchUsers('all');
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
                        <tbody id="userTableBody">
                        <?php foreach($active as $result): ?>

<tr class="bg-gray-200">
        <th class="py-3 px-4"><?=$result['firstName']?> <?=$result['lastName']?></th>
        <th class="py-3 px-4"><?=$result['email']?></th>
        <th class="py-3 px-4"><?=$result['status']?></th>
        <td class="border py-2 px-4">
            <form action="/admin/users/changeStatus" method="POST" style="display:inline;">
                <input type="hidden" name="status" value="deactivate">
                <input type="hidden" name="userid" value="<?=$result['userID']?>">
                <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded">Ban</button>
            </form>
        </td>
    </tr>
    <?php endforeach;?>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
                // Here you would typically fetch active users from the backend
                fetchUsers('active');
            }

            function showPendingUsers() {
                document.getElementById('user-table').classList.remove('hidden');
                document.getElementById('user-table').innerHTML = `
                    <h2 class="font-bold text-2xl mb-4 text-purple-600">Pending Users</h2>
                    <table class="min-w-full bg-white shadow-lg rounded-lg">
                        <thead>
                            <tr class="bg-gray-300">
                                <th class="py-3 px-4">Name</th>
                                <th class="py-3 px-4">Email</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Action</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                        <?php foreach($panding as $result): ?>

                        <tr class="hover:bg-gray-100 even:bg-gray-200 odd:bg-gray-100">
                            <td class="border py-2 px-4"><?=$result['firstName']?> <?=$result['lastName']?></td>
                            <td class="border py-2 px-4"><?=$result['email']?></td>
                            <td class="border py-2 px-4"><?=$result['status']?></td>
                            <td class="border py-2 px-4">
                                <form action="/admin/users/changeStatus" method="POST" style="display:inline;">
                                    <input type="hidden" name="status" value="active">
                                    <input type="hidden" name="userid" value="<?=$result['userID']?>">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-2 rounded">Activate</button>
                                </form>
                                <form action="/admin/users/changeStatus" method="POST" style="display:inline;">
                                    <input type="hidden" name="status" value="deactivate">
                                    <input type="hidden" name="userid" value="<?=$result['userID']?>">
                                    <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded">Refuse</button>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                        <?php endforeach;?>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
                // Here you would typically fetch pending users from the backend
                fetchUsers('pending');
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
                        <tbody id="userTableBody">
                          <?php foreach($deactivate as $result): ?>

                        <tr class="bg-gray-200">
                                <th class="py-3 px-4"><?=$result['firstName']?> <?=$result['lastName']?></th>
                                <th class="py-3 px-4"><?=$result['email']?></th>
                                <th class="py-3 px-4"><?=$result['status']?></th>
                                <td class="border py-2 px-4">
                                    <form action="/admin/users/changeStatus" method="POST" style="display:inline;">
                                        <input type="hidden" name="status" value="active">
                                        <input type="hidden" name="userid" value="<?=$result['userID']?>">
                                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded">Unban</button>
                                    </form>
                                </td>
                            </tr>
                        </tbody>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <button class="bg-gray-600 hover:bg-gray-800 text-white font-bold py-2 px-4 rounded mt-4" onclick="toggleUserTable()">Close</button>
                `;
                // Here you would typically fetch banned users from the backend
                fetchUsers('banned');
            }

            async function fetchUsers(status) {
                try {
                    const response = await fetch(`/api/users?status=${status}`);
                    const users = await response.json();
                    const tableBody = document.getElementById('userTableBody');
                    tableBody.innerHTML = users.map(user => `
                        <tr>
                            <td class="border py-2 px-4">${user.name}</td>
                            <td class="border py-2 px-4">${user.email}</td>
                            <td class="border py-2 px-4">${user.status}</td>
                            <td class="border py-2 px-4">
                                ${user.status !== 'active' ? 
                                    `<form action="/api/users/activate" method="POST" style="display:inline;">
                                        <input type="hidden" name="email" value="${user.email}">
                                        <button type="submit" class="bg-green-600 hover:bg-green-800 text-white font-bold py-1 px-2 rounded mr-2">Activate</button>
                                    </form>` : ''}
                                ${user.status !== 'banned' ? 
                                    `<form action="/api/users/ban" method="POST" style="display:inline;">
                                        <input type="hidden" name="email" value="${user.email}">
                                        <button type="submit" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-2 rounded">Ban</button>
                                    </form>` : ''}
                                ${user.status === 'banned' ? 
                                    `<form action="/api/users/unban" method="POST" style="display:inline;">
                                        <input type="hidden" name="email" value="${user.email}">
                                        <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-1 px-2 rounded">Unban</button>
                                    </form>` : ''}
                            </td>
                        </tr>
                    `).join('');
                } catch (error) {
                    console.error('Error fetching users:', error);
                }
            }

            async function activateUser(email) {
                try {
                    const response = await fetch('/api/users/activate', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ email })
                    });
                    if (response.ok) {
                        // Refresh the current user list
                        const currentTable = document.querySelector('#user-table h2').textContent;
                        const status = currentTable.toLowerCase().split(' ')[0];
                        fetchUsers(status);
                    }
                } catch (error) {
                    console.error('Error activating user:', error);
                }
            }

            async function banUser(email) {
                try {
                    const response = await fetch('/api/users/ban', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ email })
                    });
                    if (response.ok) {
                        // Refresh the current user list
                        const currentTable = document.querySelector('#user-table h2').textContent;
                        const status = currentTable.toLowerCase().split(' ')[0];
                        fetchUsers(status);
                    }
                } catch (error) {
                    console.error('Error banning user:', error);
                }
            }

            async function unbanUser(email) {
                try {
                    const response = await fetch('/api/users/unban', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ email })
                    });
                    if (response.ok) {
                        // Refresh the current user list
                        const currentTable = document.querySelector('#user-table h2').textContent;
                        const status = currentTable.toLowerCase().split(' ')[0];
                        fetchUsers(status);
                    }
                } catch (error) {
                    console.error('Error unbanning user:', error);
                }
            }

            function manageContent() {
                document.getElementById('manage-content').classList.remove('hidden');
                document.getElementById('bulk-insert-tags').classList.add('hidden');
                document.getElementById('user-table').classList.add('hidden');
                document.getElementById('statistics').classList.add('hidden');
            }

            function toggleManageContent() {
                document.getElementById('manage-content').classList.toggle('hidden');
            }

            function bulkInsertTags() {
                document.getElementById('bulk-insert-tags').classList.remove('hidden');
                document.getElementById('manage-content').classList.add('hidden');
                document.getElementById('user-table').classList.add('hidden');
                document.getElementById('statistics').classList.add('hidden');
            }

            function toggleBulkInsertTags() {
                document.getElementById('bulk-insert-tags').classList.toggle('hidden');
            }

            function viewStatistics() {
                document.getElementById('statistics').classList.remove('hidden');
                document.getElementById('manage-content').classList.add('hidden');
                document.getElementById('bulk-insert-tags').classList.add('hidden');
                document.getElementById('user-table').classList.add('hidden');
            }

            function toggleStatistics() {
                document.getElementById('statistics').classList.toggle('hidden');
            }

            // Add event listeners for the forms
            document.getElementById('add-tags-form').addEventListener('submit', async function(e) {
                e.preventDefault();
                const tags = document.getElementById('tags').value.split(',').map(tag => tag.trim());
                try {
                    const response = await fetch('/api/tags/bulk', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ tags })
                    });
                    if (response.ok) {
                        document.getElementById('tags').value = '';
                        alert('Tags added successfully!');
                    }
                } catch (error) {
                    console.error('Error adding tags:', error);
                    alert('Error adding tags. Please try again.');
                }
            });

            document.getElementById('add-category-form').addEventListener('submit', async function(e) {
                e.preventDefault();
                const category = document.getElementById('category').value.trim();
                try {
                    const response = await fetch('/api/categories', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ name: category })
                    });
                    if (response.ok) {
                        document.getElementById('category').value = '';
                        alert('Category added successfully!');
                    }
                } catch (error) {
                    console.error('Error adding category:', error);
                    alert('Error adding category. Please try again.');
                }
            });
        </script>
    </body>
</html>