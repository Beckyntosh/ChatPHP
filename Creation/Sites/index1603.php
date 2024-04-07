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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS ArtGallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(30) NOT NULL,
artworkName VARCHAR(50),
description TEXT,
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table ArtGallery created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkName = $_POST['artworkName'];
    $description = $_POST['description'];

    $sql = "INSERT INTO ArtGallery (artistName, artworkName, description)
    VALUES ('$artistName', '$artworkName', '$description')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Online Art Gallery Entry</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 20px;
    }
    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    input[type=text], textarea {
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
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>

<h2>Online Art Gallery Submission Form</h2>

<div class="container">
  <form action="" method="post">
    <label for="artistName">Artist Name</label>
    <input type="text" id="artistName" name="artistName" placeholder="Your name..">

    <label for="artworkName">Artwork Name</label>
    <input type="text" id="artworkName" name="artworkName" placeholder="Artwork name..">

    <label for="description">Description</label>
    <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
