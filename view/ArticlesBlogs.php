<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContentCraze | Profile Page</title>
    <link rel="stylesheet" href="../css/profile.css">
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
            <img src="<?php echo $userProfileImagePath; ?>" class="profile-pic" alt="Profile Image">
            <div class="search-bar">
                <form action="/search" method="get">
                    <input type="text" id="search_box" name="q" placeholder="Search for people">
                </form> 
            </div> 
           
            
        </div>   
        
    </header>
    





</body>
</html>