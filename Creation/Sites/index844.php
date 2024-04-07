<?php
// Connection parameters
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

// Create presentations table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS presentations (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
file_path VARCHAR(255),
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$uploadSuccess = false;

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["presentation"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["presentation"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "ppt" && $imageFileType != "pptx" ) {
        echo "Sorry, only PPT & PPTX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["presentation"]["tmp_name"], $target_file)) {
            $uploadSuccess = true;
            $title = basename($_FILES["presentation"]["name"]);
            $sql = "INSERT INTO presentations (title, file_path) VALUES ('$title', '$target_file')";

            if ($conn->query($sql) === FALSE) {
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
    <title>Upload Presentation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F8F9FA;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, .1);
        }
        .form-upload {
            margin-top: 20px;
        }
        .submit-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
        .easter-theme {
            background-color: #FFC107;
        }
    </style>
</head>
<body>
    <div class="container easter-theme">
        <h2>Upload Your Presentation</h2>
        <?php if ($uploadSuccess): ?>
        <p>File has been uploaded successfully!</p>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" class="form-upload">
            Select presentation to upload:
            <input type="file" name="presentation" id="presentation">
            <input type="submit" value="Upload Presentation" name="submit" class="submit-btn">
        </form>
    </div>
</body>
</html>