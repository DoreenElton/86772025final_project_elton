<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContentCraze | Registration Page</title>
    <link rel="stylesheet" href="../css/Register.css">
</head>
<body>
    <div class="container">
        <div class="logo-section">
            <img src="../images/logo2.png" alt="ContentCraze Logo" class="logo">
        </div>
        
        <div class="form-section">
            <h2 class="logo">Create your account</h2>
            <form action="../action/register_user_action.php" method="post" name="registrationForm" id="registrationForm">
                <div class="input-group">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" name="firstName" placeholder="e.g Elton" required>
                </div>
                <div class="input-group">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" name="lastName" placeholder="e.g Gamor" required>
                </div>
                <div class="input-group">
                    <label for="Username">Username:</label>
                    <input type="text" id="userName" name="userName" placeholder="e.g Elton65" required>
                </div>
                <div class="input-group">
                    <label for="gender"> Gender:</label>
                    <select name="gender" id="gender" required>
                        <option value="3">Select</option>
                        <option value="0">Male</option>
                        <option value="1">Female</option>
                    </select>
                </div>
                <div class="input-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" name="dob" id="dob" placeholder="Select your date of birth" required>
                </div>
                <div class="input-group">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Enter your phone number" required>
                </div>
                <div class="input-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required minlength="6">
                </div>
                <div class="input-group">
                    <label for="retypePassword">Retype Password:</label>
                    <input type="password" id="retypePassword" name="retypePassword" required minlength="6">
                </div>
                <button type="submit" name="submit" class="login-button">Register</button>
            </form>
            <a href="../login/Login.php">Already have an account?</a>
        </div>
    </div>

</body>
</html>