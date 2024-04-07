<?php
// Simple search application for educational/research purposes.

// Connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for blog posts if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    FULLTEXT(title, content)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
$conn->query($createTableSql);

// Search form
echo '<form method="get">Search: <input type="text" name="search_query"> <button type="submit">Search</button></form>';

// Processing search request
if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
    $searchQuery = $conn->real_escape_string($_GET['search_query']);
    $searchSql = "SELECT *, MATCH(title,content) AGAINST('$searchQuery' IN NATURAL LANGUAGE MODE) AS score FROM blog_posts WHERE MATCH(title,content) AGAINST('$searchQuery' IN NATURAL LANGUAGE MODE) ORDER BY score DESC;";
    $result = $conn->query($searchSql);

    if ($result->num_rows > 0) {
        echo '<h2>Search Results</h2>';
        // Output search results
        while ($row = $result->fetch_assoc()) {
            $highlightedTitle = preg_replace("/($searchQuery)/i", "<span style='background-color:yellow;'>$1</span>", $row['title']);
            $highlightedContent = preg_replace("/($searchQuery)/i", "<span style='background-color:yellow;'>$1</span>", $row['content']);
            echo "<div><h3>$highlightedTitle</h3><p>$highlightedContent</p><p>Relevance Score: {$row['score']}</p></div>";
        }
    } else {
        echo '<p>No results found.</p>';
    }
}

$conn->close();
?>