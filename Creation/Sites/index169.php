<?php
// Set up connection variables
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

// Create artwork table if it doesn't exist 
$sql = "CREATE TABLE IF NOT EXISTS artworks (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artist_name VARCHAR(50) NOT NULL,
    artwork_name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(100) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif');
    if(in_array($fileType, $allowTypes)){
        // Upload file to the server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $stmt = $conn->prepare("INSERT INTO artworks (artist_name, artwork_name, description, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $_POST['artist_name'], $_POST['artwork_name'], $_POST['description'], $fileName);
            if($stmt->execute()){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
    }
} else {
    $statusMsg = 'Please select a file to upload.';
}

// Close statement
if (isset($stmt)) {
    $stmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Online Art Gallery Entry</title>
    <style>
        body {font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f0f0f0;}
        .container {max-width: 700px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
        h2 {text-align: center; margin-bottom: 20px;}
        .form-group {margin-bottom: 15px;}
        .form-group label {display: block; margin-bottom: 5px;}
        .form-group input, .form-group textarea, .form-group button {width: 100%; padding: 10px; box-sizing: border-box;}
        .messages {margin: 20px 0; padding: 15px; color: #fff; background-color: #e91e63;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Artwork</h2>
        <?php if(!empty($statusMsg)){ ?>
            <div class="messages"><?php echo $statusMsg; ?></div>
        <?php } ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="artist_name">Artist Name:</label>
                <input type="text" name="artist_name" id="artist_name" required>
            </div>
            <div class="form-group">
                <label for="artwork_name">Artwork Name:</label>
                <input type="text" name="artwork_name" id="artwork_name" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" rows="5" required></textarea>
            </div>
            <div class="form-group">
                <label for="file">Upload Image:</label>
                <input type="file" name="file" id="file" required>
            </div>
            <div class="form-group">
                <button type="submit" name="submit">Upload</button>
            </div>
        </form>
    </div>
</body>
</html>