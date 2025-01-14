<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Youdemy</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Admin Dashboard</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">User Management</h2>
                <p class="text-gray-700 mb-2">Total Users: <span class="font-bold">150</span></p>
                <p class="text-gray-700 mb-2">Pending Signups: <span class="font-bold">10</span></p>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showUserManagement()">View User Management</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Activate All</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Suspend All</button>
                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">Delete All</button>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Content Management</h2>
                <p class="text-gray-700 mb-2">Total Courses: <span class="font-bold">100</span></p>
                <p class="text-gray-700 mb-2">Total Categories: <span class="font-bold">15</span></p>
                <p class="text-gray-700 mb-2">Total Tags: <span class="font-bold">50</span></p>
                <button class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">Manage Content</button>
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">Add New Category</button>
                <button class="bg-teal-500 hover:bg-teal-700 text-white font-bold py-2 px-4 rounded">Add New Tag</button>
            </div>
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h2 class="font-bold text-lg mb-2">Account Validation</h2>
                <p class="text-gray-700 mb-2">Total Pending Requests: <span class="font-bold">5</span></p>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Validate All</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Reject All</button>
            </div>
        </div>

        <div id="user-management" class="hidden">
            <h2 class="font-bold text-2xl mb-4">User Management</h2>
            <div class="mb-4">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" onclick="showTable('all')">All Users</button>
                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded" onclick="showTable('pending')">Pending Users</button>
                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded" onclick="showTable('active')">Active Users</button>
                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="showTable('banned')">Banned Users</button>
            </div>
            <div id="all-users" class="user-table hidden">
                <h3 class="font-bold text-lg mb-2">All Users</h3>
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Status</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border py-2 px-4">John Doe</td>
                            <td class="border py-2 px-4">john@example.com</td>
                            <td class="border py-2 px-4">Active</td>
                            <td class="border py-2 px-4">N/A</td>
                        </tr>
                        <tr>
                            <td class="border py-2 px-4">Jane Smith</td>
                            <td class="border py-2 px-4">jane@example.com</td>
                            <td class="border py-2 px-4">Pending</td>
                            <td class="border py-2 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="activateUser('jane@example.com')">Activate</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="banUser('jane@example.com')">Ban</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="pending-users" class="user-table hidden">
                <h3 class="font-bold text-lg mb-2">Pending Users</h3>
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border py-2 px-4">Alice Johnson</td>
                            <td class="border py-2 px-4">alice@example.com</td>
                            <td class="border py-2 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="activateUser('alice@example.com')">Activate</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="banUser('alice@example.com')">Ban</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="active-users" class="user-table hidden">
                <h3 class="font-bold text-lg mb-2">Active Users</h3>
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border py-2 px-4">Michael Brown</td>
                            <td class="border py-2 px-4">michael@example.com</td>
                            <td class="border py-2 px-4">
                                <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded" onclick="suspendUser('michael@example.com')">Suspend</button>
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded" onclick="banUser('michael@example.com')">Ban</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="banned-users" class="user-table hidden">
                <h3 class="font-bold text-lg mb-2">Banned Users</h3>
                <table class="min-w-full bg-white shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="py-2 px-4">Name</th>
                            <th class="py-2 px-4">Email</th>
                            <th class="py-2 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border py-2 px-4">Emily Johnson</td>
                            <td class="border py-2 px-4">emily@example.com</td>
                            <td class="border py-2 px-4">
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded" onclick="activateUser('emily@example.com')">Activate</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function showTable(status) {
                const tables = document.querySelectorAll('.user-table');
                tables.forEach(table => table.classList.add('hidden'));
                document.getElementById(status + '-users').classList.remove('hidden');
            }

            function showUserManagement() {
                document.getElementById('user-management').classList.remove('hidden');
                // Hide other sections if necessary
            }

            function hideUserManagement() {
                document.getElementById('user-management').classList.add('hidden');
            }

            function activateUser(email) {
                // Implement logic to activate user
                console.log(`Activating user ${email}`);
            }

            function suspendUser(email) {
                // Implement logic to suspend user
                console.log(`Suspending user ${email}`);
            }

            function banUser(email) {
                // Implement logic to ban user
                console.log(`Banning user ${email}`);
            }
        </script>

        <div class="bg-white shadow-lg rounded-lg p-6 mb-6">
            <h2 class="font-bold text-lg mb-2">Bulk Tag Insertion</h2>
            <input type="text" placeholder="Enter tags separated by commas" class="border rounded w-full py-2 px-3 mb-4">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Add Tags</button>
        </div>

        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="font-bold text-lg mb-2">Global Statistics</h2>
            <ul class="list-disc list-inside text-gray-700">
                <li>Total Courses: <span class="font-bold">100</span></li>
                <li>Distribution by Category: <span class="font-bold">View Chart</span></li>
                <li>Course with Most Students: <span class="font-bold">Data Structures and Algorithms</span></li>
                <li>Top 3 Teachers: <span class="font-bold">Michael Brown, Sophia Lee, David Kim</span></li>
            </ul>
        </div>
    </div>

</body>
</html>
