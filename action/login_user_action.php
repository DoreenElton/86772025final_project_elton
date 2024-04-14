<?php
session_start();  // Start or resume the session at the top of the script

include '../settings/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT user_id, password_hash, role_id FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password_hash'])) {
                // Correct credentials; set session variables and redirect
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['role_id'] = $user['role_id'];  // Store role ID in session
                header("Location: ../view/HomePage.php");
                exit();
            } else {
                // Incorrect password
                header("Location: ../login/Login.php?login=failed");
                exit();
            }
        } else {
            // No user found
            header("Location: ../login/Login.php?login=failed");
            exit();
        }
        $stmt->close();
    } else {
        // SQL error
        header("Location: ../login/Login.php?error=sqlerror");
        exit();
    }
}
 else {
    // Submit not set
    header("Location: ../login/Login.php?error=invalidaccess");
    exit();
}
?>
