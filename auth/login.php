<?php 
require_once "../includes/guest.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - AdminPanel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">

    <div class="bg-white w-full max-w-md rounded-2xl shadow-sm border border-gray-100 p-8">
        <div class="flex justify-center mb-3">
            <img src="../assets/images/dev-folio-round-logo.png" alt="DevFolio Logo" class="w-20 h-20 object-contain">
        </div>

        <div class="mb-8 text-center">
            <h1 class="text-2xl font-bold text-gray-800">Welcome Back</h1>
            <p class="text-gray-500">Login to go to AdminPanel dashboard system</p>
        </div>

        <form action="../actions/auth/login.php" method="POST" class="space-y-6">

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="john@example.com">
            </div>

            <!-- Password -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password"
                    class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-2 focus:ring-indigo-500 outline-none transition"
                    placeholder="••••••••">
            </div>

            <button type="submit"
                class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-lg transition mt-4">
                Login
            </button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-6">
            Don`t have account yet? <a href="../auth/register.php" class="text-indigo-600 font-semibold hover:underline">Create new
                account</a>
        </p>
    </div>

</body>

</html>