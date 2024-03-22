<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user']))
{
    // If not logged in, redirect to the login page
    header("Location: index.php");
    exit;
}

// Get user data from session
$currentUser = $_SESSION['user'];

// Check if the user is an admin
if ($currentUser['role'] != 'Admin')
{
    // If not an admin, redirect to the login page
    header("Location: index.php");
    exit;
}

include 'databaseConnection.php';

// Fetch users from the database
$sql = "SELECT * FROM users";
$stmt = $conn->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-blue-50">
    <header class="bg-blue-800 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-3xl font-bold">Admin Dashboard</h1>
            <nav>
                <a href="index.php" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded">Logout</a>
            </nav>
        </div>
    </header>
    <main class="container mx-auto my-8">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h2 class="text-lg leading-6 font-medium text-gray-900">User Management</h2>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">Administer users and their access.</p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <?php foreach ($users as $user) : ?>
                    <div class="bg-gray-50 px-4 py-5 grid grid-cols-3 gap-4 sm:grid-cols-3">
                        <dt class="text-sm font-medium text-gray-500">Username</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2"><?php echo htmlspecialchars($user['username']); ?></dd>
                        <dt class="text-sm font-medium text-gray-500">Role</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2"><?php echo htmlspecialchars($user['role']); ?></dd>
                        <?php if ($user['id'] !== $currentUser['id']): ?>
                        <div class="flex justify-end col-span-3">
                            <button onclick="removeUser(<?php echo $user['id']; ?>)" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-red-600 hover:bg-red-700">
                                Remove
                            </button>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>    
                </dl>
            </div>
        </div>
    </main>
    <script>
        function removeUser(userId) {
            if (confirm("Are you sure you want to remove this user?"))
            {
                fetch('removeUser.php',
                {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ userId: userId }),
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    location.reload(); // Refresh the page after user is removed
                })
                .catch(error => {
                    console.error('There was an error removing the user:', error);
                });
            }
        }
    </script>
</body>
</html>
