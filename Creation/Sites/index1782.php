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

// Create invoice table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
invoice_name VARCHAR(255) NOT NULL,
upload_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoiceFile"])) {
    $target_dir = "uploads/";
    $fileName = basename($_FILES["invoiceFile"]["name"]);
    $target_file = $target_dir . $fileName;
    $uploadOk = 1;
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check file size
    if ($_FILES["invoiceFile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($FileType != "pdf" ) {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO invoices (invoice_name) VALUES ('$fileName')";

            if ($conn->query($sql) === TRUE) {
                echo "The file ". htmlspecialchars(basename( $_FILES["invoiceFile"]["name"])). " has been uploaded.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<body>

<h2>Invoice Upload</h2>
<form action="" method="post" enctype="multipart/form-data">
  Select Invoice to upload:
  <input type="file" name="invoiceFile" id="invoiceFile">
  <input type="submit" value="Upload Invoice" name="submit">
</form>

</body>
</html>
<?php
$conn->close();
?>
