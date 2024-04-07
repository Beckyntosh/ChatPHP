<?php

// Database connection
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS art_gallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(100) NOT NULL,
    artwork_title VARCHAR(100) NOT NULL,
    artwork_image VARCHAR(200),
    reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    echo "Table art_gallery created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];
    $artwork_title = $_POST['artwork_title'];
    $artwork_image = $_POST['artwork_image']; // For simplicity, assuming it's a link to an image

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO art_gallery (artist_name, artwork_title, artwork_image) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $artist_name, $artwork_title, $artwork_image);
    
    // Execute statement
    if ($stmt->execute() === TRUE) {
        echo "New artwork record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Art Gallery Entry</title>
</head>
<body>

<h2>Upload Artwork</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Artist Name: <input type="text" name="artist_name" required><br>
  Artwork Title: <input type="text" name="artwork_title" required><br>
  Artwork Image Link: <input type="text" name="artwork_image" required><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
