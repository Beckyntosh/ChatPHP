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

// Create artwork table if not exists
$createTableSql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(100) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableSql)) {
    echo "Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkName = $_POST['artworkName'];
    $description = $_POST['description'];

    $insertSql = "INSERT INTO artworks (artist_name, artwork_name, description)
    VALUES (?, ?, ?)";

    // Prepare statement
    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("sss", $artistName, $artworkName, $description);

    // Execute statement
    if ($stmt->execute()) {
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
  <title>Online Art Gallery Entry</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #fff3e0;
      color: #555;
    }
    .container {
      max-width: 600px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fefbd8;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    input[type=text], textarea {
      width: 100%;
      padding: 10px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }
    input[type=submit] {
      width: 100%;
      background-color: #ffcc5c;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    input[type=submit]:hover {
      background-color: #ffeb99;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Upload Artwork</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <label for="artistName">Artist Name:</label>
    <input type="text" id="artistName" name="artistName" required>
    
    <label for="artworkName">Artwork Name:</label>
    <input type="text" id="artworkName" name="artworkName" required>
    
    <label for="description">Description:</label>
    <textarea id="description" name="description" rows="4"></textarea>
    
    <input type="submit" value="Submit">
  </form>
</div>

</body>
</html>
