<?php
// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file has been uploaded without errors
    if (isset($_FILES["zipFile"]) && $_FILES["zipFile"]["error"] == 0) {
        $allowed = ["zip" => "application/zip"];
        $filename = $_FILES["zipFile"]["name"];
        $filetype = $_FILES["zipFile"]["type"];
        $filesize = $_FILES["zipFile"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " already exists.";
            } else {
                move_uploaded_file($_FILES["zipFile"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Add to database
                $mysqli = new mysqli("db", "root", "root", "my_database");
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }
                $sql = "INSERT INTO archives (filename, filesize) VALUES (?, ?)";
                if ($stmt = $mysqli->prepare($sql)) {
                    $stmt->bind_param("si", $filename, $filesize);
                    if ($stmt->execute()) {
                        echo " and added to the database.";
                    } else {
                        echo " but there was an error adding the file info to the database.";
                    }
                    $stmt->close();
                }
                $mysqli->close();
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["zipFile"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload ZIP File for Archiving</title>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <h2>Upload ZIP File for 'Project Alpha'</h2>
        <label for="zipFile">ZIP File:</label>
        <input type="file" name="zipFile" id="zipFile">
        <input type="submit" value="Upload Archive" name="submit">
    </form>
</body>
</html>

<?php
// Setup database and table if not exists.
$mysqli = new mysqli("db", "root", "root", "my_database");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS archives (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filesize INT NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($mysqli->query($sql) === TRUE) {
    echo "Table archives created successfully";
} else {
    echo "Error creating table: " . $mysqli->error;
}

$mysqli->close();
?>
