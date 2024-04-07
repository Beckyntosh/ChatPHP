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

// Create table if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(50) NOT NULL,
    archive_name VARCHAR(50) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($tableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = "";
$projectName = "Project Alpha"; // Hardcoded for demonstration purpose, in real application, this might come from a user input

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (!file_exists('archives')) {
        mkdir('archives', 0777, true);
    }

    $target_dir = "archives/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual zip file
    $check = mime_content_type($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        if ($check == "application/zip") {
            $uploadOk = 1;
        } else {
            $message = "File is not a ZIP.";
            $uploadOk = 0;
        }
    } else {
        $message = "File is not a ZIP.";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }
  
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= " Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Insert into database
            $stmt = $conn->prepare("INSERT INTO project_archives (project_name, archive_name) VALUES (?, ?)");
            $stmt->bind_param("ss", $projectName, basename($_FILES["fileToUpload"]["name"]));
            $stmt->execute();
            $stmt->close();

            $message = "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>ZIP File Upload for Archiving</h2>
<p><?php echo $message; ?></p>
<form action="" method="post" enctype="multipart/form-data">
  Select ZIP file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>
