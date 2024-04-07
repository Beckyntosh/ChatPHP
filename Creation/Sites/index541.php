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

// Create table if it doesn't exist
$tableQuery = "CREATE TABLE IF NOT EXISTS game_saves (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";
if (!$conn->query($tableQuery)) {
    echo "Error creating table: " . $conn->error;
}

// File upload logic
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['gameSaveFile'])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["gameSaveFile"]["name"]);
    $uploadOk = 1;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($fileType != "sav" && $fileType != "save") {
        echo "Sorry, only SAV & SAVE files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["gameSaveFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["gameSaveFile"]["name"])) . " has been uploaded.";

            // Insert file information into the database
            $sql = "INSERT INTO game_saves (filename) VALUES ('" . $target_file . "')";
            if ($conn->query($sql) === TRUE) {
                echo "File record saved successfully.";
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
<html>
<head>
    <title>Game Save File Upload</title>
    <style>
        body {
            font-family: 'Trebuchet MS', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .medieval-style {
            font-family: 'Palatino Linotype', 'Book Antiqua', Palatino, serif;
            background: #a67b5b; /* Old paper background */
            color: #fff;
            border: 1px solid #ccc;
            padding: 15px;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #8c6239;
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container medieval-style">
        <h2>Game Save File Upload</h2>
        <form action="" method="post" enctype="multipart/form-data">
            Select game save file to upload:
            <input type="file" name="gameSaveFile" id="gameSaveFile">
            <input type="submit" value="Upload Save File" name="submit" class="btn">
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
