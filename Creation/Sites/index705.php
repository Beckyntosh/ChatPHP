<!DOCTYPE html>
<html>
<body>

<h2>Upload PDF</h2>
<form action="" method="post" enctype="multipart/form-data">
    Select PDF to upload: 
    <input type="file" name="myfile" id="myfile">
    <input type="submit" value="Upload PDF" name="submit">
</form>

</body>
</html>

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

if(isset($_POST["submit"])){
    $filename = $_FILES["myfile"]["name"];
    $destination = 'uploads/' . $filename;
    // the physical file on a temporary uploads directory on the server
    $file = $_FILES["myfile"]["tmp_name"];
    $size = $_FILES["myfile"]["size"];

    if (!in_array($ext, ['pdf'])) {
        echo "You file extension must be .pdf";
    } 
    else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', $size, 0)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
?>