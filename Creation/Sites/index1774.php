<?php

// Connection Variables
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

// Create table if it doesn't exists
$tableSql = "CREATE TABLE IF NOT EXISTS Invoices (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
invoice_name VARCHAR(50) NOT NULL,
file_name VARCHAR(100) NOT NULL,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($tableSql) === TRUE) {
    // echo "Table Invoices created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["invoiceFile"])) {

  $targetDirectory = "uploads/";
  $targetFile = $targetDirectory . basename($_FILES["invoiceFile"]["name"]);
  $uploadOk = 1;
  $fileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));

  // Check file size
  if ($_FILES["invoiceFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($fileType != "pdf" ) {
    echo "Sorry, only PDF files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["invoiceFile"]["tmp_name"], $targetFile)) {
      $fileName = basename($_FILES["invoiceFile"]["name"]);
      $invoiceName = mysqli_real_escape_string($conn, $_POST['invoiceName']);
      
      // Insert into Database
      $sql = "INSERT INTO Invoices (invoice_name, file_name) VALUES ('$invoiceName', '$fileName')";
      
      if ($conn->query($sql) === TRUE) {
        echo "The file ". htmlspecialchars( basename( $_FILES["invoiceFile"]["name"])). " has been uploaded.";
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
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Upload Invoice</title>
<style>
body{font-family:Arial, sans-serif; margin:0; padding:20px; background-color:#f4f4f4;}
.container{max-width:700px; background-color:white; padding:20px; margin:20px auto; border-radius:8px; box-shadow:0 0 10px #ccc;}
h2{text-align:center; color:#333;}
form{display:flex; flex-direction:column; gap:20px;}
input[type=file], input[type=text]{padding:10px; border:1px solid #ddd; border-radius:4px;}
input[type=submit]{background-color:#007bff; color:#fff; border:none; padding:10px; border-radius:4px; cursor:pointer;}
input[type=submit]:hover{background-color:#0056b3}
</style>
</head>
<body>
<div class="container">
  <h2>Upload Invoice</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    <input type="text" name="invoiceName" placeholder="Invoice Name" required>
    <input type="file" name="invoiceFile" required>
    <input type="submit" value="Upload Invoice" name="submit">
  </form>
</div>
</body>
</html>
