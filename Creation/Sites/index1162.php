<?php
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

// Query to create table if it doesn't exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS job_listings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(250) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(100),
type VARCHAR(50),
remote VARCHAR(20),
posted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sqlCreateTable)) {
  echo "Error creating table: " . $conn->error;
}

// Fetch jobs
$fetchJobs = "SELECT * FROM job_listings WHERE type='software creator' AND remote='yes'";
$result = $conn->query($fetchJobs);

// Handle the search query
$search = isset($_GET['search']) ? $_GET['search'] : '';
$searchQuery = "SELECT * FROM job_listings WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
if ($search) {
  $result = $conn->query($searchQuery);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gardening Tools Job Listings</title>
  </head>
  <body>
    <h1>Gardening Tools Job Listings</h1>
    <form action="" method="GET">
      <input type="text" name="search" placeholder="Search job titles or descriptions">
      <button type="submit">Search</button>
    </form>
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>" . $row["title"]. "</h2>";
        echo "<p>" . $row["description"]. "</p>";
        echo "<p> Location: " . $row["location"]. "</p>";
        echo "<p> Type: " . $row["type"]. " | Remote: " . $row["remote"]. "</p>";
        echo "</div>";
      }
    } else {
      echo "0 results found";
    }
    $conn->close();
    ?>
  </body>
</html>
