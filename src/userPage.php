<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit;
}

// Get user data from session
$currentUser = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-green-300 to-blue-300 h-screen">
    <main class="max-w-4xl mx-auto pt-8 pb-8">
        <!-- Navbar -->
        <nav class="bg-white shadow-lg rounded-lg px-6 py-4 mb-6">
            <div class="flex justify-between items-center">
                <div class="text-lg font-bold text-gray-800">Welcome, <?php echo htmlspecialchars($currentUser['username']); ?>!</div>
                <div class="space-x-4">
                    <a href="index.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition duration-200">Logout</a>
                </div>
            </div>
        </nav>

        <!-- Content -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">User Dashboard</h2>
            <p class="text-gray-600">You are logged in as <span class="text-gray-800 font-semibold"><?php echo htmlspecialchars($currentUser['role']); ?></span>.</p>
            <p class="mt-4 text-gray-600">This is your user dashboard. Here, you can view your profile information, update your settings, and explore user-specific features.</p>
        </div>
    </main>
</body>
</html>
