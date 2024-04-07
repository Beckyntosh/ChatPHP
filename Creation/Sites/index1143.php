<?php

$MYSQL_ROOT_PSWD = 'root';
$servername = 'db';
$database = 'my_database';

// Connect to database
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they don't exist
$createJobsTableSQL = "CREATE TABLE IF NOT EXISTS jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100),
    is_remote BOOLEAN DEFAULT FALSE,
    category VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createJobsTableSQL)) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $searchKeyword = $_POST['search'] ?? '';
    $location = $_POST['location'] ?? '';
    $isRemote = isset($_POST['is_remote']) ? 1 : 0;

    $searchSQL = "SELECT * FROM jobs WHERE title LIKE ? AND (location LIKE ? OR is_remote=?)";
    $stmt = $conn->prepare($searchSQL);
    $likeSearchKeyword = "%$searchKeyword%";
    $likeLocation = "%$location%";
    $stmt->bind_param("ssi", $likeSearchKeyword, $likeLocation, $isRemote);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query("SELECT * FROM jobs");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Job Listings</title>
</head>
<body>
<h2>Search for Job Listings</h2>
<form action="" method="post">
    <input type="text" name="search" placeholder="Job title or keyword">
    <input type="text" name="location" placeholder="Location">
    <label><input type="checkbox" name="is_remote"> Remote only</label>
    <button type="submit">Search</button>
</form>

<h3>Job Results</h3>
<div>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<h4>" . $row["title"] . "</h4>";
            echo "<p>" . $row["description"] . "</p>";
            echo "<p><strong>Location:</strong> " . ($row["is_remote"] ? "Remote" : $row["location"]) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No job listings found.</p>";
    }
    $conn->close();
    ?>
</div>
</body>
</html>
