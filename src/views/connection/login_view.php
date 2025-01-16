<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Youdemy Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans">

<div class="min-h-screen flex">
    <div class="w-1/2 bg-gradient-to-br to-purple-500 flex items-center justify-center relative">
        <img src="https://img.freepik.com/free-vector/online-learning-concept-illustration_114360-4371.jpg?t=st=1736778751~exp=1736782351~hmac=3ff378135da98135f9540d41fa5f3228ea886b70c160c2f423786823d7295c66&w=826" alt="Abstract Learning Illustration" class="w-3/4 max-w-full">

    </div>
    <div class="w-1/2 flex items-center justify-center p-8">
        <div class="max-w-md w-full">
            <h2 class="text-2xl font-bold text-gray-800 mb-4 text-center">Sign in</h2>
            <p class="text-gray-600 text-center mb-6">Continue to Youdemy</p>

            <form action="/login/controller" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="email" placeholder="Your Email"
                            name="email"
                            required
                    >
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
                    <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            type="password" placeholder="Your Password"
                            name="password"
                            required
                    >
                </div>
                <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full mb-4"
                        type="submit"
                >
                    Login
                </button>
            </form>

            <div class="text-center text-gray-700 mt-4">
                <a href="/signup" class="text-blue-500 hover:text-blue-700">Create account</a>
            </div>
        </div>
    </div>
</div>

</body>
</html>