<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);


include '../settings/connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    if (isset($_FILES["media_file"]) && $_FILES["media_file"]["error"] == 0 && isset($_POST['creator_name'], $_POST['caption'])) {

        
        $uploadDir = "../picture_uploads/";

        
        $filename = uniqid() . '_' . basename($_FILES["media_file"]["name"]);

       
        $filePath = $uploadDir . $filename;

       
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

       
        if (move_uploaded_file($_FILES["media_file"]["tmp_name"], $filePath)) {
           
            $sql = "INSERT INTO Media (file_path, media_type, caption, creator_name, date_posted) VALUES (?, ?, ?, ?, NOW())";

           
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $filePath, $mediaType, $_POST['caption'], $_POST['creator_name']);

            
            if ($stmt->execute()) {
                header("Location: ../view/HomePage.php");
                echo "File uploaded successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

           
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file selected or missing information.";
    }
}

?>
