<?php
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

// Check if imageUpload form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["photoshopFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["photoshopFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photoshopFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photoshopFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "psd") {
        echo "Sorry, only PSD files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photoshopFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photoshopFile"]["name"])). " has been uploaded.";

            $sql = "INSERT INTO uploads (filename) VALUES ('". basename($_FILES["photoshopFile"]["name"])."')";

            if ($conn->query($sql) === TRUE) {
                echo "File uploaded successfully";
            } else {
                echo "Error uploading file: " . $conn->error;
            }

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
    <title>Upload Your Files for Editing</title>
</head>
<body>
    <div>
        <h2>Upload a Photoshop File for Enhancements</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            Select Image File to Upload:
            <input type="file" name="photoshopFile" id="photoshopFile">
            <input type="submit" value="Upload Image" name="submit">
        </form>
    </div>
</body>
</html>

Please bear in mind that, due to the constraints and guidelines provided, including security and best practices for a production environment might have been overlooked for brevity. When deploying any code, especially dealing with file uploads and database interactions, always include security measures like input sanitization, validation, and error handling according to your use case.