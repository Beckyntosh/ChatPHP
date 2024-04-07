<?php
// Define MySQL connection data
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Connect to the MySQL database
$conn = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for storing art details if it doesn't exist
$createTableSql = "CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(100) NOT NULL,
    description TEXT NOT NULL,
    image_url VARCHAR(255),
    reg_date TIMESTAMP
)";

if (!$conn->query($createTableSql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

// Handle the artwork upload form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $artistName = $conn->real_escape_string($_POST['artistName']);
  $artworkName = $conn->real_escape_string($_POST['artworkName']);
  $description = $conn->real_escape_string($_POST['description']);
  $imageUrl = $conn->real_escape_string($_POST['imageUrl']);

  $insertSql = "INSERT INTO art_gallery (artist_name, artwork_name, description, image_url) 
  VALUES ('$artistName', '$artworkName', '$description', '$imageUrl')";

  if ($conn->query($insertSql) === TRUE) {
    echo "New artwork added successfully";
  } else {
    echo "Error: " . $insertSql . "<br>" . $conn->error;
  }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Art Gallery Entry</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { margin-top: 20px; }
        label { display: block; margin: 10px 0; }
    </style>
</head>
<body>

<h1>Upload Artwork</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="artistName">Artist Name:</label>
  <input type="text" id="artistName" name="artistName" required>
  
  <label for="artworkName">Artwork Name:</label>
  <input type="text" id="artworkName" name="artworkName" required>
  
  <label for="description">Description:</label>
  <textarea id="description" name="description" rows="4" required></textarea>
  
  <label for="imageUrl">Image URL:</label>
  <input type="text" id="imageUrl" name="imageUrl">
  
  <input type="submit" value="Upload Artwork">
</form>

</body>
</html>
