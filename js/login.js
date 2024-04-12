function validateForm() {
    // Get the value of the input field with id="email"
    var email = document.forms["loginForm"]["email"].value;
    // Get the value of the input field with id="password"
    var password = document.forms["loginForm"]["password"].value;
    
    // Check if the email field is empty
    if (email == null || email == "") {
        alert("Email must be filled out");
        return false;
    }
    
    // Check if the email is in the correct format (simple validation)
    if (!email.includes("@") || !email.includes(".")) {
        alert("Please enter a valid email address");
        return false;
    }
    
    // Check if the password field is empty
    if (password == null || password == "") {
        alert("Password must be filled out");
        return false;
    }
    
    // Check if the password is long enough (e.g., more than 6 characters)
    if (password.length < 6) {
        alert("Password must be at least 6 characters long");
        return false;
    }
    
    // If all checks pass, allow form submission
    return true;
}
