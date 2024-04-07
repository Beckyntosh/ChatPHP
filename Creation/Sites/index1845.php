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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0) {
        $allowed = array("mp3" => "audio/mp3", "wav" => "audio/wav");
        $filename = $_FILES["audioFile"]["name"];
        $filetype = $_FILES["audioFile"]["type"];
        $filesize = $_FILES["audioFile"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

        // Verify file size - 10MB maximum
        $maxsize = 10 * 1024 * 1024;
        if ($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
        
        // Verify MIME type of the file
        if (in_array($filetype, $allowed)) {
            // Check whether file exists before uploading it
            if (file_exists("upload/" . $filename)) {
                echo $filename . " is already exists.";
            } else {
                move_uploaded_file($_FILES["audioFile"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert into database
                $sql = "INSERT INTO transcriptions (filename, filetype, filesize) VALUES ('$filename', '$filetype', $filesize)";

                if ($conn->query($sql) === TRUE) {
                    echo "File uploaded and database updated successfully.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["audioFile"]["error"];
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Audio Upload for Transcription Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #0a0b0e;
            color: #fff;
            text-align: center;
        }
        .container {
            padding: 20px;
        }
        input[type="file"] {
            display: none;
        }
        .label-file {
            display: inline-block;
            background-color: #ff2079;
            color: #fff;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #1fe1e9;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #17a2b8;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Upload your audio for transcription</h2>
    <form method="post" enctype="multipart/form-data">
        <label for="fileUpload" class="label-file">Choose file</label>
        <input type="file" name="audioFile" id="fileUpload">
        <input type="submit" name="submit" value="Upload">
    </form>
</div>
</body>
</html>
