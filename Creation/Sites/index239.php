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

// Create table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS cad_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table_sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cadFile"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is a real CAD file
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["cadFile"]["tmp_name"]);
        if($check !== false) {
            echo "File is not a cad - " . $check["mime"] . ".";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["cadFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($fileType != "cad" && $fileType != "stl" ) {
        echo "Sorry, only CAD & STL files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["cadFile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["cadFile"]["name"])). " has been uploaded.";

            $conn = new mysqli($servername, $username, $password, $dbname);
            $sql = "INSERT INTO cad_files (filename) VALUES ('" . basename($_FILES["cadFile"]["name"]) . "')";

            if ($conn->query($sql) === TRUE) {
                echo "File recorded in database.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

            $conn->close();

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

?>

<!DOCTYPE html>
<html>
<body>

<h2>Upload CAD File for 3D Printing</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
  Select CAD file to upload:
  <input type="file" name="cadFile" id="cadFile">
  <input type="submit" value="Upload" name="submit">
</form>

</body>
</html>