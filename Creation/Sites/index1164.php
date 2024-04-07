<?php

// Database connection
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

// Create jobs table if it does not exist
$jobsTable = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(250) NOT NULL,
description TEXT NOT NULL,
location ENUM('remote', 'onsite') NOT NULL,
type ENUM('full-time', 'part-time') NOT NULL,
category VARCHAR(100) NOT NULL,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($jobsTable) === TRUE) {
  echo "Table 'jobs' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .job-listing { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>

<h2>Job Search</h2>

<form action="" method="GET">
    <input type="text" name="search" placeholder="Job title, keywords" />
    <select name="location">
        <option value="">Any Location</option>
        <option value="remote">Remote</option>
        <option value="onsite">On-Site</option>
    </select>
    <input type="submit" value="Search" />
</form>

<?php
if (isset($_GET['search']) || isset($_GET['location'])) {
    $search = isset($_GET['search']) ? "%" . $conn->real_escape_string($_GET['search']) . "%" : "%";
    $location = isset($_GET['location']) ? $conn->real_escape_string($_GET['location']) : "";

    $sql = "SELECT * FROM jobs WHERE title LIKE ? ".(!empty($location) ? "AND location = '$location'" : "")." ORDER BY created_at DESC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<div class="job-listing">';
            echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
            echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
            echo '<b>Location: </b>' . htmlspecialchars($row["location"]) . '<br>';
            echo '<b>Type: </b>' . htmlspecialchars($row["type"]) . '<br>';
            echo '</div>';
        }
    } else {
        echo "<p>No jobs found.</p>";
    }
}
?>

</body>
</html>

<?php
$conn->close();
?>
