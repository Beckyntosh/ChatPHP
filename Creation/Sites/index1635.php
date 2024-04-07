<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Custom Exercise</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: auto; }
        form { margin-top: 20px; }
        input, textarea { width: 100%; margin-bottom: 10px; padding: 10px; }
        button { padding: 10px 15px; cursor: pointer; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Add Custom Exercise</h1>
        <form method="post" enctype="multipart/form-data">
            <input type="text" name="exercise_name" placeholder="Exercise Name" required>
            <textarea name="instructions" placeholder="Instructions" required></textarea>
            <input type="file" name="video" accept="video/*" required>
            <button type="submit" name="submit">Add Exercise</button>
        </form>
    </div>

<?php

$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS custom_exercises (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    exercise_name VARCHAR(50) NOT NULL,
    instructions TEXT NOT NULL,
    video_path VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql)) {
    echo "Error creating table: " . $conn->error;
}

if (isset($_POST["submit"])) {
    $exerciseName = $conn->real_escape_string($_POST['exercise_name']);
    $instructions = $conn->real_escape_string($_POST['instructions']);

    // Handle file upload
    $targetDir = "uploads/";
    $targetFile = $targetDir . basename($_FILES["video"]["name"]);
    $uploadOk = 1;
    $videoFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["video"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($videoFileType != "mp4" && $videoFileType != "avi" && $videoFileType != "mov"
    && $videoFileType != "3gp" && $videoFileType != "mpeg" ) {
        echo "Sorry, only MP4, AVI, MOV, 3GP, & MPEG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["video"]["tmp_name"], $targetFile)) {
            $stmt = $conn->prepare("INSERT INTO custom_exercises (exercise_name, instructions, video_path) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $exerciseName, $instructions, $targetFile);
            if ($stmt->execute()) {
                echo "<p>New exercise added successfully.</p>";
            } else {
                echo "Error: " . $stmt . "<br>" . $conn->error;
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();

?>
</body>
</html>
