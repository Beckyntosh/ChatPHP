<?php
// Connect to the database
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

// Create table for storing zip file information
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(30) NOT NULL,
    file_name VARCHAR(100) NOT NULL,
    upload_date TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
  echo "Error creating table: " . $conn->error;
}

// Handle the file upload
if($_SERVER['REQUEST_METHOD'] == "POST") {
    if(isset($_FILES['projectZip']) && $_FILES['projectZip']['error'] == 0){
        $allowed = ['zip' => 'application/zip'];
        $fileName = $_FILES['projectZip']['name'];
        $fileType = $_FILES['projectZip']['type'];
        $fileSize = $_FILES['projectZip']['size'];

        // Verify file extension
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify MIME type of the file
        if(in_array($fileType, $allowed)){
            // Move the file to the designated folder
            move_uploaded_file($_FILES['projectZip']['tmp_name'], "uploads/" . $fileName);
            
            // Insert file info into database
            $projectName = $_POST['projectName'];
            $stmt = $conn->prepare("INSERT INTO project_archives (project_name, file_name, upload_date) VALUES (?, ?, NOW())");
            $stmt->bind_param("ss", $projectName, $fileName);
            $stmt->execute();
            echo "Your file was uploaded successfully.";
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES['projectZip']['error'];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP Archive</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="projectName">Project Name:</label><br>
        <input type="text" id="projectName" name="projectName" required><br><br>
        <label for="projectZip">ZIP file:</label><br>
        <input type="file" id="projectZip" name="projectZip" accept=".zip" required><br><br>
        <input type="submit" value="Upload Archive">
    </form>
</body>
</html>
