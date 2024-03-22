<?php

include 'databaseConnection.php';

// Check for login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Retrieve user from the database based on email
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    // Check if user exists and password is correct
    if ($user && password_verify($password, $user['password']))
    {
        // Start session and store user data
        session_start();
        $_SESSION['user'] = $user;

        // Redirect to user page after login
        if ($user['role'] == 'Admin')
        {
            header("Location: adminPage.php");
        }
        else
        {
            header("Location: userPage.php");
        }
        exit;
    }
    else
    {
        // Invalid credentials, redirect back to login page with error
        header("Location: index.php?login_error=true");
        exit;
    }
}

?>
