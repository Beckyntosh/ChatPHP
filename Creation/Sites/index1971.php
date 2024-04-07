<?php
// Database connection
define("MYSQL_ROOT_PSWD", "root");
$conn = new mysqli("db", "root", MYSQL_ROOT_PSWD, "my_database");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists if not create it
$checkTable = "SELECT 1 FROM `print_jobs` LIMIT 1";
if (!$conn->query($checkTable)) {
    $createTable = "CREATE TABLE print_jobs (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        file_name VARCHAR(255) NOT NULL,
        original_name VARCHAR(255) NOT NULL,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
    if (!$conn->query($createTable)) {
        die("Error creating table: " . $conn->error);
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["fileToUpload"]["name"])) {
    $target_dir = "uploads/";
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Only PDF, JPG, JPEG, PNG files are allowed
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" &&
         $imageFileType != "pdf" ) {
        echo "Sorry, only JPG, JPEG, PNG & PDF files are allowed.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";

            // Save file information to the database
            $sql = "INSERT INTO print_jobs (file_name, original_name) VALUES ('".$conn->real_escape_string($target_file)."', '".$conn->real_escape_string($_FILES["fileToUpload"]["name"])."')";

            if ($conn->query($sql) === TRUE) {
                echo "The file info saved to database successfully";
            } else {
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
    <title>Upload your Wedding Invitation Design</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            height: 100vh;
            background-color: #f0eae1;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        input[type=file], input[type=submit] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload your Wedding Invitation Design</h2>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Design" name="submit">
    </form>
</body>
</html>
