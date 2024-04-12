<?php
session_start();
include '../settings/connection.php';

// Check if the form has been submitted and the file has been uploaded.
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profileImage"])) {
    // Handling the file upload...
    $errors = [];
    $file_name = $_FILES['profileImage']['name'];
    $file_size = $_FILES['profileImage']['size'];
    $file_tmp = $_FILES['profileImage']['tmp_name'];
    $file_type = $_FILES['profileImage']['type'];
    $file_ext = strtolower(end(explode('.', $file_name)));
    
    $extensions = array("jpeg", "jpg", "png");

    if (!in_array($file_ext, $extensions)) {
        $errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must not exceed 2 MB';
    }

    if (empty($errors)) {
        // Generate a unique name for the file before saving it.
        $new_file_name = md5(time() . $file_name) . '.' . $file_ext;
        $file_path = "uploads/" . $new_file_name; // Ensure you have an "uploads" folder and it's writable.

        if (move_uploaded_file($file_tmp, $file_path)) {
            // Update the database with the new profile picture path.
            $sql = "UPDATE Users SET profile_picture = :profile_picture WHERE user_id = :user_id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':profile_picture', $file_path, PDO::PARAM_STR);
            $stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT); // Replace with actual user ID.
            $stmt->execute();

            echo "Profile image uploaded successfully.";
        } else {
            $errors[] = "There was a problem uploading the image.";
        }
    }

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
    }
}
?>