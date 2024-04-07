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
$tableQuery = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(50),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableQuery) === TRUE) {
    echo ""; // Table creation success, silence output for simplicity
} else {
    echo "Error creating table: " . $conn->error;
}

// Check for POST request to insert new artwork
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["artistName"]) && isset($_POST["artworkTitle"]) && isset($_POST["description"])) {
    $artistName = $_POST["artistName"];
    $artworkTitle = $_POST["artworkTitle"];
    $description = $_POST["description"];

    $stmt = $conn->prepare("INSERT INTO artworks (artist_name, artwork_title, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $artistName, $artworkTitle, $description);

    if ($stmt->execute()) {
        echo "<script>alert('Artwork added successfully');</script>";
    } else {
        echo "<script>alert('Error adding artwork');</script>";
    }

    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Art Gallery</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333;}
        .container { max-width: 600px; margin: 20px auto; background: #ffffff; padding: 20px; border-radius: 8px; }
        label, input, textarea { display: block; width: 100%; margin-bottom: 10px; }
        input, textarea { padding: 8px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Submit New Artwork</h2>
        <form action="" method="post">
            <label for="artistName">Artist Name:</label>
            <input type="text" id="artistName" name="artistName" required>
            
            <label for="artworkTitle">Artwork Title:</label>
            <input type="text" id="artworkTitle" name="artworkTitle" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <button type="submit">Submit Artwork</button>
        </form>
    </div>
</body>
</html>
