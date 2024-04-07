<?php
// Define connection parameters
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

// Check if the video_uploads table exists if not create it
$checkVideoUploadsTable = "CREATE TABLE IF NOT EXISTS video_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_title VARCHAR(100),
    video_description TEXT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";

// Execute query
if (!$conn->query($checkVideoUploadsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Check for file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['videoFile'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES['videoFile']["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a actual video or fake video
    $check = getimagesize($_FILES['videoFile']["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not a video.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES['videoFile']["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES['videoFile']["name"])). " has been uploaded.";
            $sql = "INSERT INTO video_uploads (video_title, video_description) VALUES ('" . $_POST['title'] . "', '" . $_POST['description'] . "')";
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
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
    <title>Desert Dazzle Video Upload</title>
    <style>
        body {
            background-color: #f4a261;
            font-family: Arial, sans-serif;
            color: #264653;
        }
        .container {
            padding: 20px;
            background-color: #2a9d8f;
            max-width: 600px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        input[type=text], input[type=file] {
            width: 100%;
            padding: 12px;
            margin: 5px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #e76f51;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #e9c46a;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Your Desert Dazzle Videos</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="text" name="title" placeholder="Video Title" required>
        <textarea name="description" placeholder="Video Description" required></textarea>
        <input type="file" name="videoFile" required>
        <input type="submit" value="Upload Video">
    </form>
</div>

</body>
</html>