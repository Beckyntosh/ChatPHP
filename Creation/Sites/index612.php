<?php
// Simplified code for demonstration. Please adjust permissions, and use secure practices for production.
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

// Check if table exists, if not create it
$videoTableSql = "CREATE TABLE IF NOT EXISTS videos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  filename VARCHAR(255),
  uploaded DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($videoTableSql) === TRUE) {
  die("Error creating table: " . $conn->error);
}

$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["videoToUpload"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["videoToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $message = "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "mov") {
        $message = "Sorry, only MP4, AVI & MOV files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $message .= " Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["videoToUpload"]["tmp_name"], $target_file)) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $filename = basename($_FILES["videoToUpload"]["name"]);
            $sql = "INSERT INTO videos (title, description, filename) VALUES ('$title', '$description', '$filename')";

            if ($conn->query($sql) === TRUE) {
                $message = "The file ". htmlspecialchars(basename($_FILES["videoToUpload"]["name"])). " has been uploaded.";
            } else {
                $message = "Sorry, there was an error uploading your file.";
            }
        } else {
            $message = "Sorry, there was an error uploading your file.";
        }
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Stellar Space Video Upload</title>
    <style>
        body {
            background-color: #0a0a23;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            background-color: #f8f8f8;
            color: #000;
        }
        input[type=file] {
            margin: 8px 0;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        .message {
            color: #ff0000;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Video to Stellar Space Tutoring</h2>
    <p class="message"><?php echo $message; ?></p>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="title">Title</label>
        <input type="text" id="title" name="title" placeholder="Video title...">
        
        <label for="description">Description</label>
        <textarea id="description" name="description" placeholder="Write something.." style="height:200px"></textarea>
        
        <input type="file" name="videoToUpload" id="videoToUpload">
        <input type="submit" value="Upload Video" name="submit">
    </form>
</div>

</body>
</html>