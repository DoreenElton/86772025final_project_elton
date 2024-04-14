<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContentCraze | Profile Page</title>
    <link rel="stylesheet" href="../css/ArticleBlogs.css">
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

        <div class="form-container">
            <center><h1>Enter a New Article</h1></center>
            <form action="../action/upload_article_action.php" method="post">
                <div class="form-group">
                    <label for="creator_name">Creator Name:</label>
                    <input type="text" name="creator_name" id="creator_name" required>
                </div>
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>
                </div>
                    
                <div class="form-group">
                    <label for="body">Body:</label>
                    <textarea name="body" id="body" rows="10" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="tags">Tags (comma separated):</label>
                    <input type="text" name="tags" id="tags">
                </div>
                    
                <div class="form-group">
                    <label for="status">Status:</label>
                    <select name="status" id="status">
                        <option value="published">Published</option>
                        <option value="draft">Draft</option>
                        <option value="archived">Archived</option>
                    </select>
                </div>

                <div class="form-group">
                    <input type="submit" value="Submit Article">
                </div>
            </form>
        </div>
    </div>


    <footer>
        © 2024 ContentCraze | Created by Elton Fafali Gamor
    </footer>

   
    



</body>
</html>