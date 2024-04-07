<?php

// Database connection settings
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

// Run initial SQL setup if tables don't exist
$sql = file_get_contents('init.sql');
if ($conn->multi_query($sql)) {
    do {
        /* store first result set */
        if ($result = $conn->store_result()) {
            while ($row = $result->fetch_row()) {
                // Handle results as needed
            }
            $result->free();
        }
        /* print divider */
        if ($conn->more_results()) {
            // Prepare for next result set
        }
    } while ($conn->next_result());
}

// Additional Table for Document Uploads
$sql = "CREATE TABLE IF NOT EXISTS document_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255),
    file_path VARCHAR(255),
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// File upload logic
if (isset($_POST['upload'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["document"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = ['pdf', 'doc', 'docx', 'ppt', 'pptx'];
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $insert = $conn->query("INSERT INTO document_uploads (file_name, file_path) VALUES ('$fileName','$targetFilePath')");
            if ($insert) {
                echo "<p>Upload successful</p>";
            } else {
                echo "<p>Upload failed, please try again.</p>";
            }
        } else {
            echo "<p>Sorry, there was an error uploading your file.</p>";
        }
    } else {
        echo "<p>Sorry, only PDF, DOC, DOCX, PPT, & PPTX files are allowed to upload.</p>";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Office Supplies Blog - Document Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="file"] {
            display: inline-block;
        }
        .form-group input[type="submit"] {
            background-color: #5c946e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group input[type="submit"]:hover {
            background-color: #427a5b;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload a Document</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="document">Choose document:</label>
            <input type="file" name="document" id="document" required>
        </div>
        <div class="form-group">
            <input type="submit" name="upload" value="Upload Document">
        </div>
    </form>
</div>
</body>
</html>