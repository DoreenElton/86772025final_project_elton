<?php
// Include the database connection
require '../settings/connection.php'; // Adjust the path to where your connection.php file is located

// Check if the search form was submitted
if (isset($_GET['search_query'])) {
    $search_query = $conn->real_escape_string(trim($_GET['search_query']));

    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT * FROM Content WHERE content_type = ? AND status = 'published'");

    // Bind the input parameter
    $stmt->bind_param("s", $search_query);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Check if we have results
    if ($result->num_rows > 0) {
        // Fetch all results
        $results = $result->fetch_all(MYSQLI_ASSOC);
        
        // Iterate over each result and display it
        foreach ($results as $row) {
            $title = htmlspecialchars($row['title']);
            $body = htmlspecialchars($row['body']);
            $date_posted = htmlspecialchars($row['date_posted']);
            
            echo "<div class='content'>";
            echo "<h2>{$title}</h2>";
            echo "<p>{$body}</p>"; // Use nl2br() if you want to convert newlines to HTML <br> tags
            echo "<small>Posted on: {$date_posted}</small>";
            echo "</div>";
        }
    } else {
        echo "<p>No results found for the specified content type.</p>";
    }

    // Close the prepared statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
