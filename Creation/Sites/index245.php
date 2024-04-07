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

// Create table for files if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS vector_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
    // Table created successfully or already exists
} else {
    echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["vectorFile"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a real SVG
    if($imageFileType != "svg") {
      echo "Sorry, only SVG files are allowed.";
    } else {
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["vectorFile"]["name"]);

            // Save file information to database
            $stmt = $conn->prepare("INSERT INTO vector_files (filename) VALUES (?)");
            $stmt->bind_param("s", $filename);
            
            if ($stmt->execute()) {
                echo "The file ". htmlspecialchars($filename). " has been uploaded and saved.";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vector File Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #eee;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        input[type='file'] {
            margin-top: 20px;
        }
        input[type='submit'] {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #444;
            border: none;
            color: white;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload a Vector File</h1>
        <form action="" method="post" enctype="multipart/form-data">
            Select vector file to upload:
            <input type="file" name="vectorFile" id="vectorFile">
            <input type="submit" value="Upload File" name="submit">
        </form>
    </div>
</body>
</html>