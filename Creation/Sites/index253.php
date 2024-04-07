<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS clothing_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(30) NOT NULL,
    category VARCHAR(30) NOT NULL,
    size VARCHAR(10) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table clothing_items created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"])) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  if($imageFileType != "csv") {
    echo "Sorry, only CSV files are allowed.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }

    if (($handle = fopen($target_file, "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $sql = "INSERT INTO clothing_items (item_name, category, size, price) VALUES ('$data[0]', '$data[1]', '$data[2]', '$data[3]')";
        if ($conn->query($sql) === TRUE) {
          echo "New record created successfully\n";
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
      }
      fclose($handle);
    }
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload CSV for Children's Clothing Website</title>
</head>
<body>
<h2>Upload a Clothing Items CSV File</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
  Select CSV file to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload CSV" name="submit">
</form>
</body>
</html>