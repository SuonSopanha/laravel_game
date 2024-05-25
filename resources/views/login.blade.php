<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded shadow-md w-full max-w-sm">
        <h3 class="text-xl mb-4 flex items-center justify-center font-medium">Login</h3>
        <form action="/login" method="POST">
            @csrf <!-- CSRF Token -->
            <div class="mb-4">
                <label for="login_email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="login_email" name="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <label for="login_psw" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" id="login_psw" name="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>
            <div class="mb-4">
                <input type="submit" value="Login" class="bg-green-500 text-white w-full px-3 py-2 rounded-md hover:bg-green-700 cursor-pointer">
            </div>
            <div class="text-center">
                <p class="text-gray-600 text-sm">Don't have an account? <button type="button" id="signupButton" class="text-blue-500 hover:underline">Sign Up</button></p>
            </div>
        </form>
    </div>

    <script>
        document.getElementById("signupButton").onclick = function() {
            window.location.href = "signup.html";
        };
    </script>
</body>
</html>
