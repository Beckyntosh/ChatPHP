


<?php
// Assuming you've already created a MySQL database named 'my_database'
// and a table named 'design_uploads' with columns 'id' (INT, AUTO_INCREMENT, PRIMARY KEY), 
// 'file_name' (VARCHAR), and 'upload_time' (DATETIME)

$host = 'db';
$db = 'my_database';
$user = 'root';
$password = 'root';

// Create connection
$conn = new mysqli($host, $user, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["vectorFile"])) {
    $targetDirectory = "uploads/";
    $targetFile = $targetDirectory . basename($_FILES["vectorFile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

    // Check if file is a actual vector or fake
    if($imageFileType != "svg") {
        echo "Sorry, only SVG files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["vectorFile"]["tmp_name"], $targetFile)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["vectorFile"]["name"])). " has been uploaded.";

            // Insert file information into database
            $sql = "INSERT INTO design_uploads (file_name, upload_time) VALUES ('" . basename($_FILES["vectorFile"]["name"]) . "', NOW())";

            if ($conn->query($sql) === TRUE) {
                echo "File metadata stored successfully.";
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

<form action="yourScript.php" method="post" enctype="multipart/form-data">
  Select vector file to upload:
  <input type="file" name="vectorFile" id="vectorFile">
  <input type="submit" value="Upload File" name="submit">
</form>

Please replace `"yourScript.php"` with the actual name of your PHP script or keep it blank to submit to the same script.

Remember, this is a basic demonstration. For a production environment, you'll need to handle security concerns (like prepared statements for database insertion, file upload validations, etc.), work on the user interface, and potentially add more features according to your needs.