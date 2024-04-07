<?php

// Establish Connection to the Database
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

// Create Job Table if it doesn't exist
$jobTable = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(50),
type VARCHAR(50),
remote TINYINT(1) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($jobTable) === TRUE) {
  echo "Table Jobs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search_keyword = $_POST['search'];
  $location = $_POST['location'];
  $type = $_POST['type'];

  $sql = "SELECT * FROM jobs WHERE (title LIKE '%$search_keyword%' OR description LIKE '%$search_keyword%') AND location='$location' AND type='$type' AND remote=1";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Title</th><th>Description</th><th>Location</th><th>Type</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td>".$row["description"]."</td><td>".$row["location"]."</td><td>".$row["type"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results";
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beauty Product Website - Job Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0c1f3;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #ff85a2;
            color: white;
        }
        form {
            background-color: #fff3f8;
            padding: 20px;
            margin: 20px 0;
        }
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #ff85a2;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #ff5589;
        }
    </style>
</head>
<body>
    
    <h1>Job Search for Beauty Product Website</h1>
    
    <form method="POST">
        <label for="search">Search Keyword:</label>
        <input type="text" id="search" name="search" placeholder="e.g., remote software creator">
        
        <label for="location">Location:</label>
        <select id="location" name="location">
            <option value="remote">Remote</option>
            <option value="office">Office</option>
        </select>
        
        <label for="type">Job Type:</label>
        <select id="type" name="type">
            <option value="fulltime">Full-time</option>
            <option value="parttime">Part-time</option>
            <option value="contract">Contract</option>
            <option value="internship">Internship</option>
        </select>
        
        <input type="submit" value="Search">
    </form>

</body>
</html>
