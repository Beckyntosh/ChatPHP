<?php
session_start();
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

$sql = "CREATE TABLE IF NOT EXISTS CadFiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["cadFile"])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cadFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if($fileType != "stl" && $fileType != "obj" && $fileType != "f3d" ) {
      echo "Sorry, only STL, OBJ, F3D files are allowed.";
      $uploadOk = 0;
    }

    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["cadFile"]["tmp_name"], $target_file)) {
            $sql = $conn->prepare("INSERT INTO CadFiles (filename) VALUES (?)");
            $sql->bind_param("s", $target_file);
            if($sql->execute()){
                echo "The file ". htmlspecialchars( basename( $_FILES["cadFile"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
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
<title>Upload CAD File for 3D Printing</title>
<style>
body { font-family: 'Courier New', monospace; }
.container { width: 400px; margin: 100px auto; }
input[type='file'] { margin: 20px 0; }
</style>
</head>
<body>

<div class="container">
    <h2>Upload CAD File</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select CAD File to upload for 3D Printing:
        <input type="file" name="cadFile" id="cadFile">
        <input type="submit" value="Upload CAD File" name="submit">
    </form>
</div>

</body>
</html>