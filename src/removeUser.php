<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['user']))
{
    include 'databaseConnection.php';

    // Get user ID from the POST data
    $data = json_decode(file_get_contents("php://input"));
    $userId = $data->userId;

    // Prepare and execute SQL query to delete the user
    $sql = "DELETE FROM users WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $userId);
    
    // Check if deletion was successful
    if ($stmt->execute())
    {
        // Return success response
        http_response_code(200);
        echo json_encode(array("message" => "User successfully removed."));
    }
    else
    {
        // Return error response
        http_response_code(500);
        echo json_encode(array("message" => "Unable to remove user."));
    }
}
else
{
    // Return error response if the request method is not POST or user is not logged in
    http_response_code(403);
    echo json_encode(array("message" => "Unauthorized access."));
}
?>