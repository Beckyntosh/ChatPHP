<?php
// DB connection settings
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

// Check if table exists, if not create one
$tableCheckSql = "SHOW TABLES LIKE 'uploaded_texts'";
$result = $conn->query($tableCheckSql);
if ($result->num_rows == 0) {
    $createTableSql = "CREATE TABLE uploaded_texts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        analysis TEXT,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";
    
    if ($conn->query($createTableSql) !== TRUE) {
        die("Error creating table: " . $conn->error);
    }
}

// Handle file upload and analysis
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["textFile"])) {
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["textFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "txt") {
        echo "Sorry, only TXT files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["textFile"]["tmp_name"], $targetFile)) {
            $content = file_get_contents($targetFile);
            // Normally here you would call your sentiment analysis function and store its result
            $analysis = "Sample Analysis Result"; // Placeholder for analysis result

            // Insert into database
            $stmt = $conn->prepare("INSERT INTO uploaded_texts (filename, content, analysis) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $filename, $content, $analysis);
            $filename = $_FILES["textFile"]["name"];
            
            if ($stmt->execute()) {
                echo "The file ". basename($_FILES["textFile"]["name"]). " has been uploaded and analyzed.";
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
<html>
<head>
    <title>Upload Text File for Analysis</title>
</head>
<body style="font-family: Courier; background-color: #f0e68c; color: #556b2f;">
<h2>Upload Text Document for Sentiment Analysis</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select file to upload: <br>
    <input type="file" name="textFile" id="textFile">
    <input type="submit" value="Upload & Analyze" name="submit">
</form>
</body>
</html>
