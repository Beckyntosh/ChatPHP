<?php

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

// Create table if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS artworks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(30) NOT NULL,
title VARCHAR(50),
description TEXT,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($table_sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle artwork upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $artist_name = $_POST['artist_name'];
  $title = $_POST['title'];
  $description = $_POST['description'];

  $insert_sql = "INSERT INTO artworks (artist_name, title, description) VALUES (?, ?, ?)";

  $stmt = $conn->prepare($insert_sql);
  $stmt->bind_param("sss", $artist_name, $title, $description);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Upload Artwork</title>
</head>
<body>

<h2>Artwork Upload for Online Art Gallery</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Artist Name: <input type="text" name="artist_name" required><br>
  Title: <input type="text" name="title" required><br>
  Description:<br>
  <textarea name="description" rows="5" cols="40" required></textarea><br>
  <input type="submit" name="submit" value="Submit">
</form>

</body>
</html>
