<?php 
session_start();

//echo $_SESSION['role_id'];

// Function to check if the user is an admin
function checkIfAdmin() {
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['role_id'])) {
        // Redirect if the user is not logged in or the session variables are not set
        header('Location: ../login/login.php');
        exit();
    }
    
    if ($_SESSION['role_id'] != 1) {
        // Redirect if the user is not an admin
        header('Location: ../login/login.php');
        exit();
    }

    return true; // User is an admin
}

// Call the function to check if the user is an admin
checkIfAdmin(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management</title>
    <link rel ="stylesheet" href="../css/admin.css">
</head>
<body>
    <header>
        <div class="header-background"></div>
            
            <div class="header-content">
                <div class="logo">
                    <img src="../images/logo2.png" alt="ContentCraze Logo">
                <span>ContentCraze</span>
                </div>
                <nav>
                    <ul>
                        <li><a href="../view/HomePage.php">Home</a></li>
                        <li><a href="../view/profile.php">Profile</a></li>
                    </ul>
                </nav>
                <a href="../login/logout.php" class="btn">Log Out</a>
        </div>   
       
    </header>
    
    <div class="container">
        <!-- List of Articles -->
        <div class="articles-list">
        <h2>Articles</h2>
            <?php
            require_once '../settings/connection.php';
            $query = "SELECT article_id, title, creator_name, date_posted FROM ArticlesBlogs";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>" . htmlspecialchars($row['title']) . " by " . htmlspecialchars($row['creator_name']) . 
                         " on " . $row['date_posted'] .
                         "<form method='post' action='../action/delete_action.php'>
                            <input type='hidden' name='type' value='article'>
                            <input type='hidden' name='id' value='{$row['article_id']}'>
                            <button type='submit'>Delete</button>
                         </form>
                         </div>";
                }
            } else {
                echo "No articles found.";
            }
            ?>
        </div>

        <!-- List of Media -->
        <div class="media-list">
            <h2>Media Items</h2>
            <?php
            $query = "SELECT media_id, caption, creator_name, date_posted FROM Media";
            $result = $conn->query($query);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='item'>" . htmlspecialchars($row['caption']) . " by " . htmlspecialchars($row['creator_name']) .
                         " on " . $row['date_posted'] .
                         "<form method='post' action='../action/delete_action.php'>
                            <input type='hidden' name='type' value='media'>
                            <input type='hidden' name='id' value='{$row['media_id']}'>
                            <button type='submit'>Delete</button>
                         </form>
                         </div>";
                }
            } else {
                echo "No media found.";
            }
            ?>
        </div>
    </div>

    <footer>
        © 2024 Content Management System
    </footer>
</body>
</html>
