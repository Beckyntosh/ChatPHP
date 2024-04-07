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

// Create table if it doesn't exist
$tableSql = "CREATE TABLE IF NOT EXISTS art_gallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(30) NOT NULL,
art_title VARCHAR(50),
art_description TEXT,
image_url VARCHAR(100),
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST['artistName'];
    $artTitle = $_POST['artTitle'];
    $artDescription = $_POST['artDescription'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"]) && move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // Prepare and bind
        $stmt = $conn->prepare("INSERT INTO art_gallery (artist_name, art_title, art_description, image_url) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $artistName, $artTitle, $artDescription, $target_file);
        
        // Execute
        $stmt->execute();
        
        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Art Gallery Entry</title>
</head>
<body>

<h2>Artwork Submission Form</h2>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Artist Name: <input type="text" name="artistName" required><br>
    Artwork Title: <input type="text" name="artTitle" required><br>
    Artwork Description:<br> <textarea name="artDescription" rows="5" cols="40" required></textarea><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required><br>
    <input type="submit" value="Upload Art" name="submit">
</form>

</body>
</html>