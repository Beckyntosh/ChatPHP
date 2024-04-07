<?php
// Connect to the database
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

// Create tables if they don't exist
$jobTable = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50) NOT NULL,
location VARCHAR(50) NOT NULL,
type VARCHAR(50) NOT NULL,
experience INT(10),
description TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($jobTable) === TRUE) {
  echo "Table Jobs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $location = $_POST['location'];
  $type = $_POST['type'];
  $experience = $_POST['experience'];

  $sql = "INSERT INTO jobs (title, location, type, experience, description)
  VALUES ('$title', '$location', '$type', '$experience', '...')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Job Listings</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .filter-section {margin-bottom: 20px;}
        .job {margin-bottom: 30px; padding: 10px; border: 1px solid #ddd;}
    </style>
</head>
<body>
<h2>Search for a Job</h2>

<form action="" method="post">
    <div class="filter-section">
        <label for="title">Job Title:</label>
        <input type="text" id="title" name="title">
    </div>
    <div class="filter-section">
        <label for="location">Location:</label>
        <input type="text" id="location" name="location">
    </div>
    <div class="filter-section">
        <label for="type">Job Type:</label>
        <input type="text" id="type" name="type">
    </div>
    <div class="filter-section">
        <label for="experience">Experience Level:</label>
        <input type="number" id="experience" name="experience">
    </div>
    <div class="filter-section">
        <input type="submit" value="Submit">
    </div>
</form>

<h2>Job Listings</h2>
<?php
$sql = "SELECT * FROM jobs";
if (isset($_GET['search'])) {
    $sql .= " WHERE location LIKE '%" . $_GET['location'] . "%' 
                AND type LIKE '%" . $_GET['type'] ."%' 
                AND experience >= " . intval($_GET['experience']);
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div class='job'>";
        echo "<h3>" . $row["title"]. "</h3>";
        echo "<p>Location: " . $row["location"]. " - Type: " .$row["type"]. "</p>";
        echo "<p>Experience Level: " . $row["experience"]. "</p>";
        echo "<p>" . $row["description"]. "</p>";
        echo "</div>";
    }
} else {
    echo "0 results found";
}
$conn->close();
?>
</body>
</html>