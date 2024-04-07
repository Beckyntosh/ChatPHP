<?php
// db.php
function connectDB() {
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    } catch(PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
}

function prepareDB() {
    $conn = connectDB();
    $initSql = file_get_contents("init.sql");
    try {
        $conn->exec($initSql);
        // Additional tables needed
        $sql = "CREATE TABLE IF NOT EXISTS game_saves (
            id INT AUTO_INCREMENT PRIMARY KEY,
            userid INT,
            filename VARCHAR(255),
            filepath VARCHAR(255),
            upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $conn->exec($sql);
    } catch(PDOException $e) {
        die("DB preparation failed: " . $e->getMessage());
    }
}

prepareDB();

// upload.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $targetDir = __DIR__ . "/uploads/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $targetFile = $targetDir . basename($_FILES["gameSave"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "sav") {
        echo "Sorry, only .sav files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["gameSave"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["gameSave"]["name"])). " has been uploaded.";
            // Save the upload info into the database
            $conn = connectDB();
            $stmt = $conn->prepare("INSERT INTO game_saves (userid, filename, filepath) VALUES (?, ?, ?)");
            $stmt->execute([1, basename($_FILES["gameSave"]["name"]), $targetFile]); // Assuming user with ID 1
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Exotic Escape - Game Save Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eee;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #0066CC;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Upload Game Save File</h1>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select game save file to upload:
            <input type="file" name="gameSave" id="gameSave">
            <input type="submit" value="Upload Game Save" name="submit">
        </form>
    </div>
</body>
</html>