<?php
// Connection and setup
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

// Create table if not exists for uploaded documents
$sql = "CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    filepath VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["document"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
        echo "Sorry, only PDF, DOC & DOCX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["document"]["name"]);
            $sql = "INSERT INTO uploaded_docs (filename, filepath) VALUES ('$filename', '$target_file')";
            if ($conn->query($sql) === TRUE) {
                echo "The document has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Upload Showcase</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #121212;
            color: #fff;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #333;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #0779e4 3px solid;
        }
        input[type="file"] {
            margin: 20px auto;
        }
        input[type="submit"] {
            background-color: #08f;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0077cc;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>School Supplies Photography Showcase - Document Upload</h1>
        </div>
    </header>
    
    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="document" id="document">
            <input type="submit" value="Upload Document">
        </form>
    </div>
</body>
</html>