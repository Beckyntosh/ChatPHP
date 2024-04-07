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

// Check if the 'uploads' table exists, and create it if not
$checkTable = "CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
)";
$conn->query($checkTable);

// File upload handling
$message = '';
if (isset($_FILES['photoshopFile']) && $_FILES['photoshopFile']['error'] == 0) {
    $allowed = ['psd' => 'image/photoshop'];
    $fileName = $_FILES['photoshopFile']['name'];
    $fileTmpName = $_FILES['photoshopFile']['tmp_name'];
    $fileType = $_FILES['photoshopFile']['type'];

    // Verify extension
    $ext = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    if (!array_key_exists($ext, $allowed) || !in_array($fileType, $allowed)) {
        $message = 'Error: Please select a valid Photoshop (.psd) file.';
    } else {
        $uploadPath = 'uploads/' . basename($fileName);
        if (move_uploaded_file($fileTmpName, $uploadPath)) {
            // Insert into database
            $insertSQL = $conn->prepare("INSERT INTO uploads (file_path) VALUES (?)");
            $insertSQL->bind_param("s", $uploadPath);
            $insertSQL->execute();
            if ($insertSQL->affected_rows > 0) {
                $message = "File uploaded successfully.";
            } else {
                $message = "File upload failed.";
            }
        } else {
            $message = 'Error: There was a problem uploading your file.';
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Bicycles Online Counseling and Therapy Service - File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #52b788;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #076aff 3px solid;
        }
        header h1 {
            text-align: center;
            text-transform: uppercase;
            margin: 0;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        .upload-btn-wrapper {
            overflow: hidden;
            display: inline-block;
        }
        .btn {
            border: 2px solid #076aff;
            color: #ffffff;
            background-color: #076aff;
            padding: 8px 20px;
            border-radius: 8px;
            font-size: 15px;
            font-weight: bold;
        }
        .upload-btn-wrapper input[type=file] {
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
    <header>
        <h1>Upload Your Photoshop Files</h1>
    </header>
    <?php if ($message) echo "<p>$message</p>"; ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="photoshopFile">Upload a file:</label>
        <div class="upload-btn-wrapper">
            <button class="btn">Choose a file</button>
            <input type="file" name="photoshopFile" />
        </div>
        <br><br>
        <button class="btn" type="submit">Upload File</button>
    </form>
</div>
</body>
</html>
<?php $conn->close(); ?>