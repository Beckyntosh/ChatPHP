<?php

// Initialize connection variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    code_content LONGTEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle File Upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["source_code"]["name"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["source_code"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["source_code"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "php" && $fileType != "js" && $fileType != "html" && $fileType != "css" ) {
        echo "Sorry, only PHP, JS, HTML & CSS files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["source_code"]["tmp_name"], $target_file)) {
            $fileName = basename( $_FILES["source_code"]["name"]);
            $fileContent = file_get_contents($target_file);
            $stmt = $conn->prepare("INSERT INTO code_reviews (file_name, code_content) VALUES (?, ?)");
            $stmt->bind_param("ss", $fileName, $fileContent);
            $stmt->execute();
            
            echo "The file ". htmlspecialchars( basename( $_FILES["source_code"]["name"])). " has been uploaded and is under review.";
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
    <title>Source Code Upload for Review</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #222; color: #eee;}
        .container {width: 80%; margin: auto; padding: 20px;}
        form {margin-top: 20px;}
        input, button {padding: 10px;}
        button {background-color: #555; color: white; border: none; cursor: pointer;}
        button:hover {background-color: #666;}
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload Source Code for Review</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
            <input type="file" name="source_code" id="source_code">
            <button type="submit">Upload</button>
        </form>
    </div>
</body>
</html>