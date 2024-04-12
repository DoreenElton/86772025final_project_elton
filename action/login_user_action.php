<?php
session_start();
include '../settings/connection.php';

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query1 = "SELECT * FROM Users where email = ?";
    $stmt = mysqli_prepare($conn, $query1);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result) {
            $user = mysqli_fetch_assoc($result);
            
            if ($user && password_verify($password, $user['password_hash'])) {
                
                session_start();
                $_SESSION['user_id'] = $user['user_id'];
                header("location:../view/HomePage.php");
                exit();
            } else {
                
                header("Location: ../login/Login.php#loginsec?login=failed");
                exit();
            }
        } else {
            
            header("Location: ../view/HomePage.phpp#loginsec?error=database_error");
            exit();
        }
        
        mysqli_stmt_close($stmt);
    } 
    else {
        echo "connection failed";
    }
}
