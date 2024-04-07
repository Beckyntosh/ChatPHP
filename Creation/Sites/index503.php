<?php
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

// Create table for documents if not exists
$sql = "CREATE TABLE IF NOT EXISTS Documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
signature VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Documents created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload and signature generation
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['document']) && $_FILES['document']['error'] == UPLOAD_ERR_OK) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    
    if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
        
        // Generate digital signature (for demonstration, using a hash of the file)
        $signature = hash_file('sha256', $target_file);
        
        // Insert file information and signature into database
        $stmt = $conn->prepare("INSERT INTO Documents (filename, signature) VALUES (?, ?)");
        $stmt->bind_param("ss", $target_file, $signature);
        
        if ($stmt->execute()) {
            echo "The file '". htmlspecialchars(basename($_FILES["document"]["name"])). "' has been uploaded and signed.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        
        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document Upload for Digital Signature Verification</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            text-transform: uppercase;
            text-align: center;
        }
        .upload-btn-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }
        .btn {
            color: white;
            background-color: #4CAF50;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 20px;
        }
        input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Document</h2>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="upload-btn-wrapper">
                <button class="btn">Upload a file</button>
                <input type="file" name="document" />
            </div>
            <br><br>
            <input type="submit" value="Upload Document" name="submit">
        </form>
    </div>
</body>
</html>