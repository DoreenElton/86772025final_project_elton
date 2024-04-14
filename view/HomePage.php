<?php
session_start();

// Check if the user ID is set in the session
if (isset($_SESSION['user_id'])) {
    // echo "User ID: " . $_SESSION['user_id'];

} else {
    // Optionally handle the case where the session does not have a user ID
   //  echo "User ID not set in session.";
}
?>
<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ContentCraze is the ultimate platform for creating, uploading, and interacting with various types of content such as articles, media, and art.">
    <title>ContentCraze| Home Page</title>

    
    <link rel ="stylesheet" href="../css/HomePage.css">

</head>
<body>
    <header>
        <div class="header-background">
            <div class="carousel" style="z-index: 1000;">
                <div class="slides fade">
                    <img  src="../images/DSG.jpg" style="width:100%">
                </div>
                <div class="slides fade">
                    <img src="../images/interact.jpeg" style="width:100%">
                </div>
                <div class="slides fade">
                    <img src="../images/words.jpeg" style="width:100%">
                </div>
            </div>
        </div>
            
            
            <div class="header-content">
                <div class="logo">
                    <img src="../images/logo2.png" alt="ContentCraze Logo">
                <span>ContentCraze</span>
                </div>
                <nav>
                    <li class="dropdown">
                        <a href="#" class="dropbtn">Categories</a>
                        <div class="dropdown-content">
                            <a href="../view/Media.php">Media</a>
                            <a href="../admin/admin_control.php">Admin</a>
                            <a href="../view/ArticlesBlogs.php">Articles/Blogs</a>
                        </div>
                    </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="../view/profile.php">Profile</a></li>
                </nav>
                <a href="../login/logout.php" class="btn">Log Out</a>
                
            </div>
   
    </header>
    

    <div class="container">
        <div class="s-bar">
            <form id="search-form">
                <input type="text" id="search_query" name="search_query" placeholder="Search for articles, media, etc...">
                <button type="submit" class="btn">Search</button>
            </form>
            
        </div>

        

                <!-- Container for displaying search results -->
        <div class="search-display">
        <div  id="search-results">
            <center><h1 style="margin-top: 175px;">Search Results Will Appear here</h1></center>
        </div>
        </div>
        <center><h1>Popular Content</h1></center>
        <div class="gallery">
            <?php

                error_reporting(E_ALL);
                ini_set("display_errors", 1);

                // Include the database connection file
                include '../settings/connection.php';

                // Prepare the SQL statement to select all image entries and their details from the Media table
                $sql = "SELECT file_path, caption, creator_name, date_posted FROM Media WHERE media_type = 'image'";

                // Execute the query
                $result = $conn->query($sql);

                // Check if there are results
                if ($result->num_rows > 0) {
                    
                    // Output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "<div style='margin-bottom: 20px;'>";
                        echo "<img src='../media_uploads/" . htmlspecialchars($row['file_path']) . "' alt='Image' style='width:200px;'><br>";
                        echo "<strong>Caption:</strong> " . htmlspecialchars($row['caption']) . "<br>";
                        echo "<strong>Creator Name:</strong> " . htmlspecialchars($row['creator_name']) . "<br>";
                        echo "<strong>Date Posted:</strong> " . htmlspecialchars($row['date_posted']) . "<br>";
                        echo "</div>";
                    }
                    
                } else {
                    echo "0 results";
                }

             
            ?>
        </div>

    </div> 
    <div class="a-container">
            <center><h1 style="margin-bottom: 20px;">Articles List</h1></center>

            <?php

                // Prepare the SQL statement to select all articles
                $sql = "SELECT title, body, status, creator_name FROM ArticlesBlogs";
                $result = $conn->query($sql);

                // Check if there are results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='article-container'>";
                        echo "<div class='title'>" . htmlspecialchars($row['title']) . "</div>";
                        echo "<div class='body'>" . nl2br(htmlspecialchars($row['body'])) . "</div>"; // nl2br will convert newlines to <br>
                        echo "<div class='status'>" . htmlspecialchars($row['status']) . "</div>";
                        echo "<div class='creator'>Created by: " . htmlspecialchars($row['creator_name']) . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "No articles found.";
                }



            ?>

    </div>

    <footer>
        © 2024 ContentCraze | Created by Elton Fafali Gamor
    </footer>



    

    <script>
        document.getElementById('search-form').addEventListener('submit', function(e) {
            e.preventDefault();
            var searchQuery = document.getElementById('search_query').value.trim();
            if (!searchQuery) {
                document.getElementById('search-results').innerHTML = '<p>Please enter a search term.</p>';
                return;
            }

            document.getElementById('search-results').innerHTML = '<p>Loading...</p>';

            var xhr = new XMLHttpRequest();
            xhr.onload = function() {
                if (xhr.status === 200) {
                    document.getElementById('search-results').innerHTML = xhr.responseText;
                } else {
                    document.getElementById('search-results').innerHTML = `<p>Error loading results: ${xhr.statusText}</p>`;
                }
            };
            xhr.onerror = function() {
                document.getElementById('search-results').innerHTML = '<p>Error loading results.</p>';
            };
            xhr.open('GET', `../action/search_results_action.php?search_query=${encodeURIComponent(searchQuery)}`, true);
            xhr.send();
        });
    </script>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    var index = 0;
    var slides = document.getElementsByClassName("slides");
    var changeSlide = function() {
        for (var i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        index++;
        if (index > slides.length) {index = 1}    
        slides[index-1].style.display = "block";  
        setTimeout(changeSlide, 3000); // Change image every 3 seconds
    }
    changeSlide();
});
</script>


</body>
</html>