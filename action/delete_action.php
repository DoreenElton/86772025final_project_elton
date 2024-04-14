<?php
require_once '../settings/connection.php'; // Ensure the path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['type']) && isset($_POST['id'])) {
    $type = $_POST['type'];
    $id = intval($_POST['id']);

    if ($type === 'article') {
        $sql = "DELETE FROM ArticlesBlogs WHERE article_id = ?";
    } elseif ($type === 'media') {
        $sql = "DELETE FROM Media WHERE media_id = ?";
    } else {
        die("Invalid type specified");
    }

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            header("Location: ../admin/admin_control.php");
            echo "Record deleted successfully.";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
}

$conn->close();
?>
