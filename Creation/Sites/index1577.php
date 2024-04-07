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

// Create table for storing art details if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS gallery (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(255) NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $artist_name = $conn->real_escape_string($_POST['artist_name']);
    $title = $conn->real_escape_string($_POST['title']);
    $description = $conn->real_escape_string($_POST['description']);
    $image_url = $conn->real_escape_string($_POST['image_url']);

    $sql = "INSERT INTO gallery (artist_name, title, description, image_url) VALUES ('$artist_name', '$title', '$description', '$image_url')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Art Gallery Entry</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        form { display: grid; grid-gap: 10px; }
        input, textarea { padding: 8px; }
        button { background-color: #007bff; color: white; padding: 10px; border: none; cursor: pointer; }
        button:hover { background-color: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Artwork</h2>
    <form method="POST" action="">
        <input type="text" name="artist_name" placeholder="Artist Name" required>
        <input type="text" name="title" placeholder="Artwork Title" required>
        <textarea name="description" placeholder="Description about the artwork" rows="4"></textarea>
        <input type="text" name="image_url" placeholder="Image URL" required>
        <button type="submit">Upload Artwork</button>
    </form>
</div>
</body>
</html>
