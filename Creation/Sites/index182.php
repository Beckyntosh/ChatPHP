<?php

// Simplified example: A single-file PHP application for searching and aggregating financial reports.

// Database configuration
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists (for the sake of simplicity, structure is minimal)
$tableQuery = "CREATE TABLE IF NOT EXISTS financial_reports (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  report TEXT NOT NULL,
  period VARCHAR(50) NOT NULL,
  year INT NOT NULL,
  company_sector VARCHAR(100) NOT NULL
)";
$conn->query($tableQuery);

// Search form
echo '<!DOCTYPE html>
<html>
<head>
<title>Search Financial Reports</title>
<style>
  body { font-family: Arial, sans-serif; background-color: #f0e68c; color: #2e8b57; }
  .container { width: 80%; margin: auto; background-color: #f5f5dc; padding: 20px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); }
  input[type="text"], select, button { padding: 10px; margin: 10px 0; border-radius: 4px; border: 1px solid #ddd; }
  button { background-color: #8fbc8f; color: white; cursor: pointer; }
  button:hover { background-color: #728f72; }
</style>
</head>
<body>
<div class="container">
<h2>Search Financial Reports</h2>
<form method="POST">
    <input type="text" name="searchQuery" placeholder="Enter search term...">
    <button type="submit" name="search">Search</button>
</form>';

if (isset($_POST['search'])) {
    $searchQuery = $conn->real_escape_string($_POST['searchQuery']);
    // Example search for 'Q2 earnings reports for tech companies 2023'
    $sql = "SELECT * FROM financial_reports WHERE title LIKE '%$searchQuery%' OR (period='Q2' AND year=2023 AND company_sector LIKE '%tech%')";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row["title"]."<br>".$row["report"]."<br>Period: ".$row["period"].", ".$row["year"]."</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results found.";
    }
}

echo '</div>
</body>
</html>';

$conn->close();
?>
