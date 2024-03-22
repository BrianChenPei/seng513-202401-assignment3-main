<?php
session_start();

// Check if the user is already logged in
if (isset($_SESSION['user'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session.
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome Back!</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-r from-blue-400 to-indigo-600 h-screen flex items-center justify-center">
    <div class="max-w-md w-full space-y-8 p-10 bg-white rounded-xl shadow-lg z-10">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
            <p class="mt-2 text-sm text-gray-600">Or <a href="registerPage.php" class="font-medium text-indigo-600 hover:text-indigo-500">create a new account</a></p>
        </div>
        <form class="mt-8 space-y-6" action="login.php" method="POST">
            <input type="hidden" name="remember" value="true">
            <div class="rounded-md shadow-sm -space-y-px">
                <div>
                    <label for="email-address" class="sr-only">Email address</label>
                    <input id="email-address" name="email" type="email" autocomplete="email" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email address">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
                </div>
            </div>

            <?php
            if (isset($_GET['registration_success']) && $_GET['registration_success'] === 'true') {
                echo '<div class="text-green-500 text-center">Account created successfully, please log in.</div>';
            }

            if (isset($_GET['login_error']) && $_GET['login_error'] == 'true') {
                echo '<div class="text-red-500 text-center">Invalid email or password.</div>';
            }
            ?>

            <div>
                <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>
    </div>
</body>
</html>
