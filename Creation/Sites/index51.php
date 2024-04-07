<?php

// Define MySQL connection parameters
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

// Create jobs table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(50),
is_remote BOOLEAN DEFAULT false,
technology VARCHAR(50),
posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = $_POST['search'] ?? '';
    $location = $_POST['location'] ?? '';
    $isRemote = isset($_POST['is_remote']) ? 1 : 0;
    $technology = $_POST['technology'] ?? '';

    $sql = "SELECT * FROM jobs WHERE title LIKE ? AND (location LIKE ? OR is_remote=?) AND technology LIKE ?";

    // Prepare statement
    $stmt = $conn->prepare($sql);
    $searchTerm = '%' . $search . '%';
    $locationTerm = '%' . $location . '%';
    $technologyTerm = '%' . $technology . '%';
    $stmt->bind_param("ssis", $searchTerm, $locationTerm, $isRemote, $technologyTerm);

    // Execute query
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Fetch all jobs on GET request
    $sql = "SELECT * FROM jobs";
    $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job { margin-bottom: 20px; padding: 10px; border: 1px solid #ddd; }
    </style>
</head>
<body>

<h2>Search for Job Listings</h2>

<form method="POST" action="">
    <input type="text" name="search" placeholder="Job title">
    <input type="text" name="location" placeholder="Location">
    <label>
        <input type="checkbox" name="is_remote" value="1"> Remote
    </label>
    <input type="text" name="technology" placeholder="Technology (PHP, JavaScript, etc.)">
    <input type="submit" value="Search">
</form>

<h3>Job Listings</h3>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='job'>";
        echo "<h4>" . htmlspecialchars($row["title"]) . "</h4>";
        echo "<p>" . nl2br(htmlspecialchars($row["description"])) . "</p>";
        echo "<p><strong>Location:</strong> " . htmlspecialchars($row["location"]) . "</p>";
        echo "<p><strong>Remote:</strong> " . ($row["is_remote"] ? "Yes" : "No") . "</p>";
        echo "<p><strong>Technology:</strong> " . htmlspecialchars($row["technology"]) . "</p>";
        echo "</div>";
    }
} else {
    echo "<p>No job listings found.</p>";
}
?>

</body>
</html>

<?php
$conn->close();
?>
