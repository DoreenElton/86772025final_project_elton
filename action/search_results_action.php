<?php

require_once '../settings/connection.php'; // Adjust the path as needed

if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $searchTerm = "%{$_GET['search_query']}%";

    // Adjust the query to match your database schema and requirements
    $sql = "SELECT title, body FROM ArticlesBlogs WHERE title LIKE ? OR body LIKE ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $searchTerm, $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output the response as HTML
            echo "<div class='search-item'>";
            echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
            echo "<p>" . htmlspecialchars($row['body']) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<div>No results found.</div>";
    }
    
    $stmt->close();
} else {
    echo "<div>Please enter a search term.</div>";
}

$conn->close();

?>
