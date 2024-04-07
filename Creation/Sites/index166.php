<?php

// Database configuration
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

// Create Art Gallery table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    art_title VARCHAR(100) NOT NULL,
    art_description TEXT NOT NULL,
    image_url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];
    $art_title = $_POST['art_title'];
    $art_description = $_POST['art_description'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $artist_name, $art_title, $art_description, $image_url);

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
<html lang='en'>
<head>
<meta charset='UTF-8'>
<meta name='viewport' content='width=device-width, initial-scale=1.0'>
<title>Online Art Gallery Entry</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
    .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    form { display: flex; flex-direction: column; }
    input, textarea { margin-top: 10px; margin-bottom: 20px; padding: 10px; font-size: 1em; }
    input[type=submit] { background-color: #333; color: #fff; border: none; cursor: pointer; }
    input[type=submit]:hover { background-color: #555; }
</style>
</head>
<body>
<div class='container'>
    <h1>Add New Artwork</h1>
    <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>'>
        <input type='text' name='artist_name' placeholder='Artist Name' required>
        <input type='text' name='art_title' placeholder='Art Title' required>
        <textarea name='art_description' rows='4' placeholder='Art Description' required></textarea>
        <input type='text' name='image_url' placeholder='Image URL' required>
        <input type='submit' value='Submit'>
    </form>
</div>
</body>
</html>