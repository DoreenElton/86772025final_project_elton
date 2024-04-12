<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require '../settings/connection.php';

if (isset($_POST['submit'])) {
    // Collecting form data
    $username = $_POST['userName'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $tel = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['retypePassword'];
   

    // Validating password match
    if ($password !== $confirmPassword) {
        echo "Passwords do not match";
        exit(); // Stop execution if passwords do not match
    }

    // Hashing the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepared statement to prevent SQL injection
    $query1 =  "INSERT INTO `Users`(`username`, `first_name`, `last_name`, `gender`, `dob`, `tel`, `email`, `password_hash`) VALUES ('$username','$fname','$lname','$gender','$dob','$tel','$email','$hashedPassword')";
    $stmt = mysqli_prepare($conn, $query1);
    if (!$stmt) {
        die("Query preparation failed: " . mysqli_error($conn));
    }

    // Executing the statement
    $success = mysqli_stmt_execute($stmt);
    if ($success) {
        header("Location: ../login/Login.php");
        exit(); // Ensure no further output after redirection
    } else {
        echo "Insertion failed: " . mysqli_error($conn);
    }

}
?>
