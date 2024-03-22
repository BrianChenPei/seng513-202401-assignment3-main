<?php

include 'databaseConnection.php';

// Check for create account form
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordConfirm = $_POST["passwordConfirm"];

    // Check if passwords match
    if ($password != $passwordConfirm)
    {
        header("Location: registerPage.php?password_mismatch=true");
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert new user in the database
    try
    {
        $sql = "INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username, $email, $hashedPassword, 'User']);

        // Redirect to login page
        header("Location: index.php?registration_success=true");
        exit;
    }
    catch (PDOException $e)
    {
        header("Location: registerPage.php?user_exists=true");
        exit;
    }
}

?>
