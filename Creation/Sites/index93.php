<?php
// Database Connection
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

// Create Jobs Table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
location VARCHAR(50),
job_type VARCHAR(50),
experience_level VARCHAR(50),
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $location = $_POST['location'];
  $job_type = $_POST['job_type'];
  $experience_level = $_POST['experience_level'];

  $sql = "SELECT * FROM jobs WHERE location LIKE '%$location%' AND job_type LIKE '%$job_type%' AND experience_level LIKE '%$experience_level%'";
  $result = $conn->query($sql);
} else {
  $sql = "SELECT * FROM jobs";
  $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watches Job Listings</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .jobs { margin-top: 20px; }
        .job { margin-bottom: 20px; padding: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .job h4, .job p { margin: 0; }
    </style>
</head>
<body>
    <h1>Watches Job Listings</h1>
    <form method="POST">
        <label for="location">Location:</label>
        <input type="text" name="location" id="location">
        <label for="job_type">Job Type:</label>
        <input type="text" name="job_type" id="job_type">
        <label for="experience_level">Experience Level:</label>
        <input type="text" name="experience_level" id="experience_level">
        <input type="submit" value="Search">
    </form>
    <div class="jobs">
      <?php
      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<div class='job'>";
          echo "<h4>" . $row["title"]. "</h4>";
          echo "<p>Location: " . $row["location"]. "</p>";
          echo "<p>Job Type: " . $row["job_type"]. "</p>";
          echo "<p>Experience Level: " . $row["experience_level"]. "</p>";
          echo "<p>Description: " . $row["description"]. "</p>";
          echo "</div>";
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div>
</body>
</html>