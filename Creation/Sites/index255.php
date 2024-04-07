<?php
// Handle connection to database
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

// Check and create table for storing configuration files info
$tableCheckQuery = "SHOW TABLES LIKE 'config_files'";
$result = $conn->query($tableCheckQuery);
if($result->num_rows == 0) {
    $createTableQuery = "CREATE TABLE config_files (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if(!$conn->query($createTableQuery)) {
        die("Error creating table: " . $conn->error);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['configFile'])) {
    $errors = [];
    $file_name = $_FILES['configFile']['name'];
    $file_size = $_FILES['configFile']['size'];
    $file_tmp = $_FILES['configFile']['tmp_name'];
    $file_type = $_FILES['configFile']['type'];
    $tmp = explode('.', $_FILES['configFile']['name']);
    $file_ext = strtolower(end($tmp));

    $extensions = array("txt", "json");

    if (in_array($file_ext, $extensions) === false) {
        $errors[] = "Extension not allowed, please choose a TXT or JSON file.";
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size must not exceed 2 MB';
    }

    if (empty($errors) == true) {
        move_uploaded_file($file_tmp, "configFiles/" . $file_name);

        $stmt = $conn->prepare("INSERT INTO config_files (filename) VALUES (?)");
        $stmt->bind_param("s", $file_name);

        if ($stmt->execute()) {
            echo "Success: Configuration file uploaded";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        foreach ($errors as $error) {
            echo $error . '<br/>';
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Configuration File</title>
</head>
<body>

<form action="" method="POST" enctype="multipart/form-data">
    <div>
        <label for="configFile">Upload Configuration File:</label>
        <input type="file" name="configFile" id="configFile" required>
    </div>

    <button type="submit">Upload</button>
</form>

</body>
</html>