<?php
// Simple Gallery Entry Script for an Art Website

// Define database connection
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

// Create artworks table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_title VARCHAR(50) NOT NULL,
    artwork_description TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form data submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];
    $artwork_title = $_POST['artwork_title'];
    $artwork_description = $_POST['artwork_description'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO artworks (artist_name, artwork_title, artwork_description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $artist_name, $artwork_title, $artwork_description);

    // Execute
    if ($stmt->execute() === TRUE) {
        echo "New artwork created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Art Gallery Entry</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type=text], textarea {
            margin: 8px 0;
            padding: 12px;
        }

        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 4px 0;
            border: none;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

    </style>
</head>
<body>

<div class="container">
    <h2>Upload Artwork</h2>
    <form action="" method="post">
        <label for="artist_name">Artist Name:</label>
        <input type="text" id="artist_name" name="artist_name" required>

        <label for="artwork_title">Artwork Title:</label>
        <input type="text" id="artwork_title" name="artwork_title" required>

        <label for="artwork_description">Artwork Description:</label>
        <textarea id="artwork_description" name="artwork_description" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
