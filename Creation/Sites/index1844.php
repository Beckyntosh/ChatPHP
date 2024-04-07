<?php
// Configure the database
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

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file was uploaded without errors
    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == 0) {
        $allowed = array("wav" => "audio/wav", "mp3" => "audio/mpeg", "m4a" => "audio/m4a");
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
                echo $filename . " has already been uploaded.";
            } else {
                move_uploaded_file($_FILES["audioFile"]["tmp_name"], "upload/" . $filename);
                echo "Your file was uploaded successfully.";

                // Insert into database
                $sql = "INSERT INTO uploads (filename, filetype, filesize) VALUES ('$filename', '$filetype', $filesize)";
                if ($conn->query($sql) === TRUE) {
                    echo " File saved successfully.";
                } else {
                    echo " Error: " . $sql . "<br>" . $conn->error;
                }
            } 
        } else {
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else {
        echo "Error: " . $_FILES["audioFile"]["error"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audio Upload for Transcription</title>
    <style>
        body { font-family: Arial, sans-serif; font-weight: bold; }
        form { margin: 20px; }
        input, button { margin: 10px; }
    </style>
</head>
<body>
    <h2>Upload Lecture Recording for Transcription</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Select audio file (wav, mp3, or m4a):</label><br>
        <input type="file" name="audioFile" required><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
<?php
// Close database connection
$conn->close();
?>
