<?php
// Connect to database
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

// Create table for storing uploaded files reference if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_on DATETIME NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["document"]) && $_FILES["document"]["error"] == 0) {
        $allowed = array("pdf" => "application/pdf", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        $filename = $_FILES["document"]["name"];
        $filetype = $_FILES["document"]["type"];
        $filesize = $_FILES["document"]["size"];
    
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
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["document"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert file info into the database
                $sql = "INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('$filename', NOW())";

                if ($conn->query($sql) === TRUE) {
                    $message = "File uploaded successfully.";
                } else {
                    $message = "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["document"]["error"];
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload Form</title>
</head>
<body>
    <h2>Upload Document</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <label for="document">Select File to Upload:</label>
        <input type="file" name="document" id="document" required>
        <input type="submit" value="Upload">
    </form>
    <p><?php echo $message; ?></p>
</body>
</html>
