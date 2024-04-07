<?php
// Database connection
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

// Create table for uploaded files if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file is a actual text file
    if(isset($_POST["submit"])) {
        $check = filesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is a document - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not a document.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Here you would call a sentiment analysis API or function on the file
            // For simplicity, we're just going to simulate it
            $simulatedSentiment = "Positive"; // This should be replaced by real sentiment analysis

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO uploaded_files (filename, sentiment) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $sentiment);

            // set parameters and execute
            $filename = htmlspecialchars(basename( $_FILES["fileToUpload"]["name"]));
            $sentiment = $simulatedSentiment;
            $stmt->execute();

            echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
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
    <title>Upload Document for Sentiment Analysis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            color: lime;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
        }
        input[type="file"], input[type="submit"] {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Your Document for Sentiment Analysis</h2>
        <p>Please upload a Text (.txt) file for sentiment analysis.</p>
        <form action="" method="post" enctype="multipart/form-data">
            Select document to upload:
            <input type="file" name="fileToUpload" id="fileToUpload">
            <input type="submit" value="Upload Document" name="submit">
        </form>
    </div>
</body>
</html>
