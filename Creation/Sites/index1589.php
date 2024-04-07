<?php
// Define server and database information
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

// Create Artwork Table if it does not exist
$createArtworkTable = "CREATE TABLE IF NOT EXISTS Artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(30) NOT NULL,
    artworkTitle VARCHAR(50),
    description TEXT,
    uploadDate TIMESTAMP
);";

if ($conn->query($createArtworkTable) === TRUE) {
  echo "Table Artwork created successfully<br>";
} else {
  echo "Error creating table: " . $conn->error . "<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artworkTitle = $_POST['artworkTitle'];
    $description = $_POST['description'];

    $sql = "INSERT INTO Artwork (artistName, artworkTitle, description)
    VALUES ('".$artistName."', '".$artworkTitle."' , '".$description."')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully.<br>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
    }
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Art Gallery Entry</title>
    <style>
      body { background-color: #fafad2; font-family: Comic Sans MS, cursive, sans-serif; color: #2e4c7d; }
      .container { margin: auto; width: 50%; padding: 10px; }
      .submit-btn { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; }
      .submit-btn:hover { background-color: #45a049; }
      input[type=text], textarea { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Your Artwork</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            Artist Name: <input type="text" name="artistName" required><br>
            Artwork Title: <input type="text" name="artworkTitle" required><br>
            Description: <textarea name="description" required></textarea><br>
            <input type="submit" value="Upload Artwork" class="submit-btn">
        </form>
    </div>
</body>
</html>
