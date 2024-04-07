<?php
// Establish database connection
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

// Create table for artwork if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS artwork (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(30) NOT NULL,
artworkTitle VARCHAR(50),
artworkDescription TEXT,
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTable)) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["artworkFile"])) {
    $artistName = $_POST['artistName'];
    $artworkTitle = $_POST['artworkTitle'];
    $artworkDescription = $_POST['artworkDescription'];
    
    $insertSQL = $conn->prepare("INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES (?, ?, ?)");
    $insertSQL->bind_param("sss", $artistName, $artworkTitle, $artworkDescription);
    
    if (!$insertSQL->execute()) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    echo "Artwork uploaded successfully!";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Art Gallery Entry Form</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 50%; margin: auto; padding-top: 20px; }
        form { display: flex; flex-direction: column; }
        label, input, textarea, button { margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Artwork</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="artistName">Artist Name:</label>
            <input type="text" id="artistName" name="artistName" required>
            
            <label for="artworkTitle">Artwork Title:</label>
            <input type="text" id="artworkTitle" name="artworkTitle" required>
            
            <label for="artworkDescription">Artwork Description:</label>
            <textarea id="artworkDescription" name="artworkDescription" rows="4" required></textarea>
            
            <label for="artworkFile">Upload File:</label>
            <input type="file" id="artworkFile" name="artworkFile" required>
            
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
