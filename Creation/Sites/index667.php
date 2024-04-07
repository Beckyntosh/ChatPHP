<?php
// Database configuration
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Attempt to create additional table for uploaded documents if it doesn't exist.
$createTableSql = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if (!$conn->query($createTableSql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle File Upload
$message = '';
if (isset($_POST['upload'])) {
    $targetDir = "uploads/";
    $fileName = basename($_FILES["document"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    if (!empty($_FILES["document"]["name"])) {
        // Allow certain file formats
        $allowTypes = array('pdf', 'doc', 'docx');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
                // Insert file information into the database
                $insert = $conn->query("INSERT INTO uploaded_documents (user_id, filename) VALUES (1, '$fileName')");
                if ($insert) {
                    $message = "The file " . $fileName . " has been uploaded successfully.";
                } else {
                    $message = "File upload failed, please try again.";
                }
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = 'Sorry, only PDF, DOC, and DOCX files are allowed to upload.';
        }
    } else {
        $message = 'Please select a file to upload.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Opulent Odyssey - Handbags Online Grocery Store</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff4e6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .upload-form {
            background-color: #f0e68c;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .upload-form h2 {
            color: #8b4513;
        }
        .btn-upload {
            background-color: #8b4513;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .msg {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-form">
            <h2>Upload your Document</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="file" name="document">
                <input type="submit" name="upload" value="Upload" class="btn-upload">
            </form>
        </div>
        <?php if ($message): ?>
            <div class="msg">
                <p><?php echo $message; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php
$conn->close();
?>