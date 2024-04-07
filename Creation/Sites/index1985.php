


<?php
// DB connection parameters
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
$table = "CREATE TABLE IF NOT EXISTS psd_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "Table psd_uploads created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photo"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);

    // Save file to uploads directory
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
        
        // Insert into database
        $stmt = $conn->prepare("INSERT INTO psd_uploads (filename) VALUES (?)");
        $stmt->bind_param("s", $filename);

        $filename = $_FILES["photo"]["name"];
        $stmt->execute();
        echo "File metadata saved to database.";
        
        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Photoshop File Upload for Image Editing Platform</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="photo" id="photo">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>

This script demonstrates the basic architecture you asked for, with a single PHP file handling both the presentation layer (HTML form) and the application logic (file upload and database interaction). Note that this example does not include any form of authentication, CSRF protection, input validation or sanitization, error handling beyond very basic examples, or PHP extension checks needed to ensure file uploads are safe and effective for use in a production environment.

Remember, in a real application, especially one dealing with file uploads and database interactions, it's crucial to put in place comprehensive security measures to protect against SQL injection, XSS, file upload vulnerabilities, and more. You would also likely implement a much more complex and modular architecture, possibly using a PHP framework such as Laravel or Symfony for better maintainability, security, and scalability.