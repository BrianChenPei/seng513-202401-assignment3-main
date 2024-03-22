<?php

$servername = "db";
$username = "user";
$password = "password";
$database = "my_db";
$port = 3306;

try
{
    // Create connection
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$database", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}

// Function to close database connection
function closeDatabaseConnection()
{
    global $conn;
    if ($conn !== null)
    {
        $conn = null;
    }
}

// Register the shutdown function
register_shutdown_function('closeDatabaseConnection');

?>
