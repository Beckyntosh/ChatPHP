<?php
$servername = "db";
$username = "root"; // Default username is usually 'root'
$password = "root"; // Your MySQL password
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Creating table if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS Artworks (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artist_name VARCHAR(50) NOT NULL,
artwork_title VARCHAR(100) NOT NULL,
artwork_description TEXT NOT NULL,
filename VARCHAR(100) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($createTable) === TRUE) {
  // Table "Artworks" created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling the form data and file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artist_name = $_POST["artist_name"];
    $artwork_title = $_POST["artwork_title"];
    $artwork_description = $_POST["artwork_description"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $filename = $_FILES["fileToUpload"]["name"];
    
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $insertSQL = "INSERT INTO Artworks (artist_name, artwork_title, artwork_description, filename)
        VALUES ('$artist_name', '$artwork_title', '$artwork_description', '$filename')";
        
        if ($conn->query($insertSQL) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $insertSQL . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Artwork</title>
</head>
<body style="background-color: #f0e4d7; font-family: Arial, sans-serif;">
<h2>Upload Your Artwork</h2>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
    Artist Name: <input type="text" name="artist_name" required><br><br>
    Artwork Title: <input type="text" name="artwork_title" required><br><br>
    Artwork Description:<br> <textarea name="artwork_description" rows="5" cols="40" required></textarea><br><br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
    <input type="submit" value="Upload Artwork" name="submit">
</form>

</body>
</html>
