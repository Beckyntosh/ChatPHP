<?php
// Connection to the database
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

// Create table for archiving file metadata if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS project_archives (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
project_name VARCHAR(50) NOT NULL,
file_name VARCHAR(100) NOT NULL,
upload_datetime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$conn->close();

// Processing the file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["projectArchive"])) {
    // Connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $projectName = $_POST['projectName'];
    $fileName = basename($_FILES["projectArchive"]["name"]);
    $targetDir = "uploads/";
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if ($fileType !== "zip") {
        echo "Sorry, only ZIP files are allowed.";
        exit();
    }

    // Upload file to server
    if (move_uploaded_file($_FILES["projectArchive"]["tmp_name"], $targetFilePath)) {
        // Insert file info into the database
        $sql = "INSERT INTO project_archives (project_name, file_name) VALUES ('$projectName', '$fileName')";

        if ($conn->query($sql) === TRUE) {
            echo "The file ". htmlspecialchars( basename( $_FILES["projectArchive"]["name"])). " has been uploaded.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Herbal Supplements - Archive Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px 0 rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload ZIP Archive for Project</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="projectName">Project Name:</label>
            <input type="text" name="projectName" id="projectName" required>
        </div>
        <div class="form-group">
            <label for="projectArchive">Upload ZIP File:</label>
            <input type="file" name="projectArchive" id="projectArchive" required>
        </div>
        <button type="submit">Upload Archive</button>
    </form>
</div>

</body>
</html>
