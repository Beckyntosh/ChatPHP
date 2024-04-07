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

// Create table for uploaded documents if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if file has been uploaded without errors
    if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
        $fileName = $_FILES['document']['name'];
        $fileTmpName = $_FILES['document']['tmp_name'];
        $fileSize = $_FILES['document']['size'];
        $fileType = $_FILES['document']['type'];

        // Define the allowed file types
        $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
        if (in_array($fileType, $allowedTypes)) {
            // Move the file to the desired location (e.g., uploads directory)
            $uploadPath = 'uploads/' . $fileName;
            if (move_uploaded_file($fileTmpName, $uploadPath)) {
                // Insert file information into the database
                $stmt = $conn->prepare("INSERT INTO uploaded_documents (file_name) VALUES (?)");
                $stmt->bind_param("s", $fileName);
                if ($stmt->execute()) {
                    $message = 'File uploaded successfully!';
                } else {
                    $message = 'Database error: Unable to save the file information.';
                }
                $stmt->close();
            } else {
                $message = 'There was an error uploading the file.';
            }
        } else {
            $message = 'Invalid file type. Only JPG, PNG, and PDF files are allowed.';
        }
    } else {
        $message = 'There was an error uploading the file.';
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f9f9f9; color: #333; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,.1); }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 10px; }
        input[type="file"] { display: block; }
        button { background-color: #007bff; color: #fff; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
        .message { margin-top: 20px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload Scanned Document</h2>
    <p>Please upload a scanned copy of your Driver's License for verification.</p>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="document">Select Document:</label>
            <input type="file" name="document" id="document" required>
        </div>
        <button type="submit">Upload Document</button>
    </form>
    <?php if (!empty($message)): ?>
        <div class="message">
            <?= htmlspecialchars($message) ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
