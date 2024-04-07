<?php
// Set connection variables
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not, create it
$checkTable = "SHOW TABLES LIKE 'game_saves'";
$result = $conn->query($checkTable);
if ($result->num_rows == 0) {
    $sql = "CREATE TABLE game_saves (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        file_path VARCHAR(255) NOT NULL,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["saveFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["saveFile"]["name"]);
    $uploadOk = 1;

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
        if (move_uploaded_file($_FILES["saveFile"]["tmp_name"], $target_file)) {
            // Insert into DB
            $stmt = $conn->prepare("INSERT INTO game_saves (filename, file_path) VALUES (?, ?)");
            $stmt->bind_param("ss", basename($_FILES["saveFile"]["name"]), $target_file);

            if($stmt->execute()){
                echo "The file ". htmlspecialchars(basename($_FILES["saveFile"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Game Save File</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
  Select Game Save File to upload:
  <input type="file" name="saveFile" id="saveFile">
  <input type="submit" value="Upload Save File" name="submit">
</form>

</body>
</html>
<?php $conn->close(); ?>