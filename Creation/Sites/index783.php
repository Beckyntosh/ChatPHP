<?php

// DB connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create audio uploads table if it does not exist
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS audio_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    filepath VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($sqlCreateTable)) {
    die("Error creating table: " . $conn->error);
}

// Handle file upload on POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["audioFile"]["name"]);
    $uploadOk = 1;
    $audioFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file type
    if($audioFileType != "mp3" && $audioFileType != "wav" ) {
        echo "Sorry, only MP3 & WAV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["audioFile"]["tmp_name"], $target_file)) {
            $sqlInsert = "INSERT INTO audio_uploads (filename, filepath) VALUES (?, ?)";
            $stmt = $conn->prepare($sqlInsert);
            $stmt->bind_param("ss", basename($_FILES["audioFile"]["name"]), $target_file);
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars( basename( $_FILES["audioFile"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Audio</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
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
        header h1 {
            text-align: center;
            padding: 5px 0;
        }
        form {
            margin-top: 20px;
            text-align: center;
        }
        footer {
            text-align: center;
            padding: 3px;
            background-color: #333;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Art Deco Delight: Musical Instruments Job Portal</h1>
    </header>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <h2>Upload Audio Sample</h2>
            <input type="file" name="audioFile" id="audioFile">
            <input type="submit" value="Upload Audio" name="submit">
        </form>
    </div>

    <footer>
        <p>Art Deco Delight &copy; <?php echo date("Y"); ?></p>
    </footer>
</body>
</html>