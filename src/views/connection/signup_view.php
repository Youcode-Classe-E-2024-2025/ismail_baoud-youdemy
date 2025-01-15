<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
<div class="flex flex-col md:flex-row w-full max-w-5xl bg-white rounded-lg shadow-lg overflow-hidden">
    <div class="md:w-1/2 p-6 flex flex-col justify-center items-center">
        <img src="https://img.freepik.com/free-vector/task-concept-illustration_114360-3578.jpg?t=st=1736778722~exp=1736782322~hmac=e2dc59b3b22724ac5c767fcd41155abb1461c592038fa235401dddb36373336e&w=826" alt="Illustration" class="w-full h-auto">
    </div>
    <div class="md:w-1/2 p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Sign Up</h2>
        <form method="POST" action="/controller/signup">
            <div class="flex mb-4">
                <div class="w-1/2 pr-2">
                    <label class="block text-gray-700 mb-2" for="first_name">First Name:</label>
                    <input class="p-2 w-full border border-gray-300 rounded" type="text" id="first_name" name="firstName" required>
                </div>
                <div class="w-1/2 pl-2">
                    <label class="block text-gray-700 mb-2" for="last_name">Last Name:</label>
                    <input class="p-2 w-full border border-gray-300 rounded" type="text" id="last_name" name="lastName" required>
                </div>
            </div>
            <label class="block text-gray-700 mb-2" for="email">Email:</label>
            <input class="mb-4 p-2 w-full border border-gray-300 rounded" type="email" id="email" name="email" required>
            <label class="block text-gray-700 mb-2" for="phone">Phone:</label>
            <input class="mb-4 p-2 w-full border border-gray-300 rounded" type="tel" id="phone" name="phoneNumber" required>
            <label class="block text-gray-700 mb-2" for="password">Password:</label>
            <input class="mb-4 p-2 w-full border border-gray-300 rounded" type="password" id="password" name="password" required>
            <label class="block text-gray-700 mb-2" for="confirm_password">Confirm Password:</label>
            <input class="mb-4 p-2 w-full border border-gray-300 rounded" type="password" id="confirm_password" name="confirmPassword" required>
            <label class="block text-gray-700 mb-2">I am a:</label>
            <div class="flex items-center mb-4">
                <input type="radio" id="student" name="role" value="student" class="mr-2">
                <label class="text-gray-700" for="student">Student</label>
            </div>
            <div class="flex items-center mb-4">
                <input type="radio" id="teacher" name="role" value="teacher" class="mr-2">
                <label class="text-gray-700" for="teacher">Teacher</label>
            </div>
            <button class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600" type="submit">Sign Up</button>
        </form>
        <div class="mt-4 text-center">
            <a href="/login" class="text-blue-500 hover:underline">Already have an account? Login</a>
        </div>
    </div>
</div>
</body>
</html>
