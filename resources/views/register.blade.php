<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
        <h3 class="text-2xl mb-4 flex items-center justify-center font-medium">Sign Up</h3>
        <form action="/registerUser" method="post">
            @csrf <!-- CSRF Token -->
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" id="username" name="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="signup_email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="signup_email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="signup_psw" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="signup_psw" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="signup_psw_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" id="signup_psw_confirmation" name="password_confirmation" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-2">
                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-700 cursor-pointer mb-2 w-full">Register</button>
            </div>
            <div class="text-center">
                <p class="text-gray-600 text-sm">Already have an account? <button type="button" id="loginTextButton" class="text-blue-500 hover:underline">Login</button></p>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("loginTextButton").onclick = function() {
            window.location.href = "login.html";
        };
    </script>
</body>
</html>
