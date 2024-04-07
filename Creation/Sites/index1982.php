<?php
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_HOST', 'db');

// Create database connection
$mysqli = new mysqli(MYSQL_HOST, "root", MYSQL_ROOT_PSWD, MYSQL_DB);
// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Check if table exists, if not create one
$tableExists = $mysqli->query("SHOW TABLES LIKE 'photoshop_files'");
if($tableExists->num_rows == 0) {
    // SQL to create table
    $sql = "CREATE TABLE photoshop_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($mysqli->query($sql) !== TRUE) {
        die("Error creating table: " . $mysqli->error);
    }
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photoFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoFile"]["name"]);
    // Check if file already exists
    if (!file_exists($target_file)) {
        if (move_uploaded_file($_FILES["photoFile"]["tmp_name"], $target_file)) {
            $fileName = basename($_FILES["photoFile"]["name"]);
            $sql = "INSERT INTO photoshop_files (file_name) VALUES ('$fileName')";

            if ($mysqli->query($sql) !== TRUE) {
                echo "Error: " . $sql . "<br>" . $mysqli->error;
            } else {
                echo "The file ". htmlspecialchars( basename( $_FILES["photoFile"]["name"])). " has been uploaded.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, file already exists.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload your Landscape Photo</title>
</head>
<body>
    <h2>Upload Your Landscape Photo for Enhancements</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:
        <input type="file" name="photoFile" id="photoFile">
        <input type="submit" value="Upload Image" name="submit">
    </form>
</body>
</html>

<?php
$mysqli->close();
?>
