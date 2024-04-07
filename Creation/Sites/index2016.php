<?php
// Define connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table for storing uploaded files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS vector_designs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is uploaded
    if (isset($_FILES["vectorFile"]) && $_FILES["vectorFile"]["error"] == 0) {
        $allowedExts = array("svg", "eps");
        $extension = pathinfo($_FILES["vectorFile"]["name"], PATHINFO_EXTENSION);

        // Validate file extension
        if (in_array($extension, $allowedExts)) {
            $filename = $_FILES["vectorFile"]["name"];
            $newFileName = time() . '_' . $filename;
            move_uploaded_file($_FILES["vectorFile"]["tmp_name"], "uploads/" . $newFileName);

            // Insert filename into database
            $sql = "INSERT INTO vector_designs (filename) VALUES ('$newFileName')";
        
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file: " . $conn->error;
            }
        } else {
            echo "Invalid file type, only SVG and EPS files are allowed.";
        }
    } else {
        echo "No file selected or upload error.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vector File Upload Form</title>
</head>
<body>
    <h2>Upload Vector File</h2>
    <form action="?" method="post" enctype="multipart/form-data">
        Select vector file to upload:
        <input type="file" name="vectorFile" id="vectorFile">
        <input type="submit" value="Upload File" name="submit">
    </form>
    <hr>
    <h2>Uploaded Designs</h2>
    <?php
    $sql = "SELECT * FROM vector_designs ORDER BY upload_time DESC";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>" . htmlspecialchars($row["filename"]) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No designs found";
    }
    $conn->close();
    ?>
</body>
</html>
