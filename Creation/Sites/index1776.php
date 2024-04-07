

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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS invoices (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["invoiceFile"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    $msg = "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($fileType != "pdf" && $fileType != "jpg" && $fileType != "png" ) {
    $msg = "Sorry, only PDF, JPG & PNG files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    $msg .= " Your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $target_file)) {
      $msg = "The file ". htmlspecialchars( basename( $_FILES["invoiceFile"]["name"])). " has been uploaded.";
      
      // Insert file name into the database
      $sql = "INSERT INTO invoices (filename) VALUES ('".basename($_FILES["invoiceFile"]["name"])."')";
      
      if ($conn->query($sql) === TRUE) {
        $msg .= " And saved to database successfully.";
      } else {
        $msg .= " But there was an error saving to database: " . $conn->error;
      }
      
    } else {
      $msg = "Sorry, there was an error uploading your file.";
    }
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Invoice Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light happy style background */
            color: #333;
            text-align: center;
        }

        form {
            margin-top: 20px;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
        }

        input[type="file"], input[type="submit"] {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Upload Your Invoice</h2>

    <form action="upload_invoice.php" method="post" enctype="multipart/form-data">
        Select invoice to upload:
        <input type="file" name="invoiceFile" id="invoiceFile">
        <input type="submit" value="Upload Invoice" name="submit">
    </form>

    <div><?php echo $msg; ?></div>
</body>
</html>

This script creates an HTML form for file uploads and uses PHP for handling the upload process while storing file names in a MySQL database. Ensure the `uploads/` directory exists and is writable. 

Remember, this is a simplified example meant for educational purposes. In a real-world application, more sophisticated error handling, security measures (like prepared statements), and file validation mechanisms should be implemented.