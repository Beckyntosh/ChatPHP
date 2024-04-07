<?php
// Handle database connection
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

// SQL to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS project_archives (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project_name VARCHAR(500) NOT NULL,
    file_name VARCHAR(500) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle file upload
$message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $projectName = basename($_POST["projectName"]);
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["zipFile"]["name"]);

    // Check if file is a actual zip file
    $zipFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if ($zipFileType != "zip") {
        $message = "Sorry, only ZIP files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["zipFile"]["tmp_name"], $target_file)) {
            // Prepare SQL statement to insert archive info into the database
            $stmt = $conn->prepare("INSERT INTO project_archives (project_name, file_name) VALUES (?, ?)");
            $stmt->bind_param("ss", $projectName, $target_file);

            if ($stmt->execute()) {
                $message = "The file ". htmlspecialchars(basename($_FILES["zipFile"]["name"])). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP Archive</title>
    <style>
        body { font-family: Arial, sans-serif; }
    </style>
</head>
<body>

<h2>Upload Project Archive (ZIP File)</h2>
<form action="" method="post" enctype="multipart/form-data">  
    Project Name: <input type="text" name="projectName" required>
    <br><br>
    Select ZIP file: <input type="file" name="zipFile" required>
    <br><br>
    <input type="submit" value="Upload Archive" name="submit">
</form>

<?php
echo $message;
?>

</body>
</html>
