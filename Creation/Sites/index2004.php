

<?php
// Error reporting, should be turned off in a production environment
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$table = "CREATE TABLE IF NOT EXISTS code_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
review_status VARCHAR(100) DEFAULT 'pending',
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

$conn->query($table);

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $targetDirectory = "uploads/";
    $file = $targetDirectory . basename($_FILES["sourceCode"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["sourceCode"]["tmp_name"], $file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["sourceCode"]["name"])). " has been uploaded.";
            $sql = "INSERT INTO code_reviews (filename) VALUES ('" . basename($_FILES["sourceCode"]["name"]) . "')";
            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>File Upload for Review</title>
</head>
<body>

<h2>Submit Code for Review</h2>

<form action="?" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="sourceCode" id="sourceCode">
    <input type="submit" value="Upload File" name="submit">
</form>

</body>
</html>

This code provides a simple web application allowing users to upload files (intended to be source code files) into a MySQL database for review. It generates a web page with a form for file upload, processes the upload on the server, and stores file meta information in the database.

Remember, to make the application functional in a real-world scenario, comprehensive enhancements addressing security, user authentication, data validation, error handling, scalability, and user interface design would be necessary.