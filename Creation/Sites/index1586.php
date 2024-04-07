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

// Call this script to setup the table initially
// Uncomment below line to setup the table, rerun script after commenting it out.
// setupTable($conn);

function setupTable($mysqli) {
    $sql = "CREATE TABLE IF NOT EXISTS ArtGallery (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(50) NOT NULL,
    artTitle VARCHAR(100) NOT NULL,
    artDescription TEXT,
    uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($mysqli->query($sql) === TRUE) {
        echo "Table ArtGallery created successfully";
    } else {
        echo "Error creating table: " . $mysqli->error;
    }
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artTitle = $_POST['artTitle'];
    $artDescription = $_POST['artDescription'];

    $sql = "INSERT INTO ArtGallery (artistName, artTitle, artDescription)
    VALUES ('" . $artistName . "', '" . $artTitle . "', '" . $artDescription . "')";

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Art Gallery Entry</title>
</head>
<body>
    <h1>Upload Your Artwork</h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="artistName">Artist Name:</label><br>
        <input type="text" id="artistName" name="artistName" required><br>
        <label for="artTitle">Art Title:</label><br>
        <input type="text" id="artTitle" name="artTitle" required><br>
        <label for="artDescription">Art Description:</label><br>
        <textarea id="artDescription" name="artDescription" rows="4" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>
