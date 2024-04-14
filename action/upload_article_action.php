<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Include the database connection file
require_once '../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture data from form
    $creatorName = $_POST['creator_name'];
    $title = $_POST['title'];
    $body = $_POST['body'];
    $tags = $_POST['tags'] ?? null; // Use null coalescing for optional fields
    $status = $_POST['status'];

    // Prepare the SQL statement
    $sql = "INSERT INTO ArticlesBlogs (creator_name, title, body, tags, status) VALUES (?, ?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $creatorName, $title, $body, $tags, $status);

    // Execute the statement and check for success
    if ($stmt->execute()) {
        header("Location: ../view/HomePage.php");
        echo "New article entered successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();

?>
