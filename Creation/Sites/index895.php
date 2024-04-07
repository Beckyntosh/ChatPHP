
<?php
/* Database Connection */
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

// Create table for podcasts if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS podcasts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
description TEXT,
file_path VARCHAR(255)
)";
if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form was submitted for podcast upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["podcastFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["podcastFile"]["tmp_name"], $target_file)) {
            // Insert into database
            $sql = "INSERT INTO podcasts (title, description, file_path) VALUES ('$title', '$description', '$target_file')";
            if ($conn->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            echo "The file ". htmlspecialchars( basename( $_FILES["podcastFile"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// File upload functionality
if(isset($_POST['upload'])){
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    
    $path = 'uploads/'.$fileName;
    move_uploaded_file($fileTmpName,$path);

    $sql = "INSERT INTO users(fileName,path) VALUES('$fileName','$path')";
    if($conn->query($sql) == true){
        echo 'File has been uploaded';
    } else{
        echo 'Failed to upload file';
    }
}

// Handle search functionality
$search_String = $_POST['search'] ?? '';
if (!empty($search_String)){
    // Query
    $sql = "SELECT * FROM hotels WHERE name LIKE'%".$search_String."%'";

    $result = $conn->query($sql);

    // Results
    if ($result->num_rows > 0) {
        echo "<table><tr><th>Hotel Name</th><th>Location</th><th>Price</th></tr>";
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["name"]. "</td><td>" . $row["location"]. "</td><td>" . $row["price"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Integrated Site</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; color: #333; }
        form { margin: auto; width: auto; padding: 20px; background-color: #f2f2f2; color: #000000; border-radius: 8px; }
        input, textarea, select { width: 100%; margin: 10px 0; padding: 8px; }
        .submit-btn { background-color: #4CAF50; color: #ffffff; border: none; cursor: pointer; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .container { width: 50%; margin: 20px auto; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Podcast Upload</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>
            <label for="podcastFile">Select file:</label>
            <input type="file" id="podcastFile" name="podcastFile" required>
            <input type="submit" value="Upload Podcast" name="submit" class="submit-btn">
        </form>

        <h2>File Upload</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" name="upload" value="Upload Portfolio">
        </form>

        <h2>Search Hotels</h2>
        <form action="" method="post">
            <input type="text" name="search" placeholder="Search for hotels...">
            <input type="submit" value="Search">
        </form>
    </div>
</body>
</html>
