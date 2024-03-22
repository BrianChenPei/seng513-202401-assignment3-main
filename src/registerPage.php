<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-purple-500 to-pink-500 min-h-screen flex justify-center items-center p-4">
    <div class="w-full max-w-lg bg-white rounded-xl shadow-lg p-6 space-y-6">
        <h1 class="text-2xl md:text-3xl font-semibold text-center text-gray-800">Create Your Account</h1>
        <form action="register.php" method="POST" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" id="name" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Your Name">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Your Email">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Password">
            </div>
            <div>
                <label for="passwordConfirm" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent" placeholder="Confirm Password">
            </div>
            <?php
            if (isset($_GET['password_mismatch']) && $_GET['password_mismatch'] === 'true') {
                echo '<p class="text-red-500 text-center">Passwords do not match.</p>';
            }
            if (isset($_GET['user_exists']) && $_GET['user_exists'] === 'true') {
                echo '<p class="text-red-500 text-center">A user already exists with that username or email.</p>';
            }
            ?>
            <button type="submit" class="w-full py-3 mt-4 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-md shadow">
                Register
            </button>
            <p class="text-sm text-center text-gray-600">
                Already have an account? <a href="index.php" class="text-purple-600 hover:underline">Sign in</a>
            </p>
        </form>
    </div>
</body>
</html>
