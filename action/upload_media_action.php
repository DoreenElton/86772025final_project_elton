<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

// Include the database connection file
include '../settings/connection.php';

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file, creator_name, and caption were provided
    if (isset($_FILES["media_file"]) && $_FILES["media_file"]["error"] == 0 && isset($_POST['creator_name'], $_POST['caption'])) {

        // Set the upload directory
        $uploadDir = "../picture_uploads/";

        // Generate a unique filename
        $filename = uniqid() . '_' . basename($_FILES["media_file"]["name"]);

        // Set the file path
        $filePath = $uploadDir . $filename;

        // Determine the media type based on the file extension
        $fileType = strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        $mediaType = '';
        switch ($fileType) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
                $mediaType = 'image';
                break;
            case 'mp4':
            case 'avi':
                $mediaType = 'video';
                break;
            case 'mp3':
            case 'wav':
                $mediaType = 'audio';
                break;
            default:
                echo "Unsupported file type.";
                exit;
        }

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES["media_file"]["tmp_name"], $filePath)) {
            // Prepare SQL statement
            $sql = "INSERT INTO Media (file_path, media_type, caption, creator_name, date_posted) VALUES (?, ?, ?, ?, NOW())";

            // Prepare and bind parameters
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $filePath, $mediaType, $_POST['caption'], $_POST['creator_name']);

            // Execute the statement
            if ($stmt->execute()) {
                header("Location: ../view/HomePage.php");
                echo "File uploaded successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file selected or missing information.";
    }
}

?>
