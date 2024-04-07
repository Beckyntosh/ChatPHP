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

// Create gallery table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS gallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(50) NOT NULL,
art_title VARCHAR(50),
art_description TEXT,
creation_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table gallery created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST['artist_name'];
    $art_title = $_POST['art_title'];
    $art_description = $_POST['art_description'];

    // Insert into database
    $sql = "INSERT INTO gallery (artist_name, art_title, art_description)
    VALUES ('$artist_name', '$art_title', '$art_description')";

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
    <title>Online Art Gallery</title>
    <style>
        body { background: #f8f9fa; font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; background: #fff; margin-top: 50px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 20px; padding: 10px; }
        input[type="submit"] { background: #007bff; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background: #0056b3; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Artwork</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="artist_name">Artist Name:</label>
        <input type="text" id="artist_name" name="artist_name" required>

        <label for="art_title">Art Title:</label>
        <input type="text" id="art_title" name="art_title" required>

        <label for="art_description">Art Description:</label>
        <textarea id="art_description" name="art_description" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
