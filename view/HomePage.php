<!DOCTYPE html>
<html lang= "en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ContentCraze is the ultimate platform for creating, uploading, and interacting with various types of content such as articles, media, and art.">
    <title>ContentCraze| Home Page</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel ="stylesheet" href="../css/HomePage.css">

</head>
<body>
    <header>
        <div class="header-background">
            <div class="carousel">
                <div class="slides fade">
                    <img src="../images/DSG.jpg" style="width:100%">
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
                            <a href="../view/ArticlesBlogs.php">Articles/Blogs</a>
                        </div>
                    </li>
                    <li><a href="#">Home</a></li>
                    <li><a href="../view/profile.php">Profile</a></li>
                </nav>
                <a href="../login/logout.php" class="btn">Log Out</a>
                
            </div>
   
    </header>
    <div class="search-bar">
        <form action="../action/search_results_action.php" method="GET">
            <input type="text" name="search_query" placeholder="Search for audio, video, etc..." required> &nbsp;
            <button type="submit"  id="search-btn"  class="btn">Search</button>
        </form>
    </div>

    <div class="search-results">
        
    </div>



    

    <script src="../js/script.js"></script>
    <script src="../js/Index.js"></script>
</body>
</html>