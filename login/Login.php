

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContentCraze | Login Page</title>
    <link rel="stylesheet" href="../css/LogIn.css">
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="../images/logo2.png" alt="ContentCraze Logo" class="logo">
        </div>
        
        <div class="form-section">
            <h2 class="logo">Join Today!</h2>
            <form action="../action/login_user_action.php" method="post" name="loginForm" id="loginForm" onsubmit="return validateForm()">
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required minlength="6">
                </div>
                <button type="submit"  name="submit" class="login-button">Sign In</button>
            </form>
            <a href="forgot_password.html">Forgot your password?</a>
            <a href="../login/Register.php">Don't have an account? Sign up! </a>
        </div>
    </div>
    
<script src="../js/login.js"></script>
</body>
</html>