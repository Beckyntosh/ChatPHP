<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["document"])) {
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

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($_FILES["document"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = ['jpg', 'png', 'jpeg', 'gif', 'pdf'];
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($_FILES["document"]["tmp_name"], $targetFilePath)) {
            // Insert image file name into database
            $insert = $conn->query("INSERT into documents (file_name, uploaded_on) VALUES ('".$fileName."', NOW())");
            if ($insert) {
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            } else {
                $statusMsg = "File upload failed, please try again.";
            }
        } else {
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    } else {
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }

    echo $statusMsg;
}

// Close database connection
if (isset($conn)) {
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <h2>Upload Scanned Document - Driver's License</h2>
        <label for="document">Select Document to Upload:</label>
        <input type="file" name="document" id="document" required>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
