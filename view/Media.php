<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContentCraze | Media page</title>
    <link rel="stylesheet" href="../css/Media.css">
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
        <div class="logo-container">
            <img src="../images/logo2.png" alt="ContentCraze Logo" class="logo">
        </div>
        <div class="form-container">
            <h1>Upload Media</h1>
            <form action="../action/upload_media_action.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="content_id" value="123"> <!-- Dynamically set this -->
                <div class="form-group">
                    <label for="creator_name">Your Name:</label>
                    <input type="text" name="creator_name" id="creator_name" required>
                </div>
                <div class="form-group">
                    <label for="caption">Caption:</label>
                    <input type="text" name="caption" id="caption" required>
                </div>
                <div class="form-group">
                    <label for="media_file">Select file to upload:</label>
                    <input type="file" name="media_file" id="media_file" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Upload File" name="submit">
                </div>
            </form>

        </div>


    </div>

    <footer>
        © 2024 ContentCraze | Created by Elton Fafali Gamor
    </footer>

    
        


</body>
</html>