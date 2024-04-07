<?php

// Define connection parameters
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

// Create tables if not exists
$tables_sql = [
  "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
  );",
  "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
  );",
  "CREATE TABLE IF NOT EXISTS licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    file_path VARCHAR(255),
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
  );"
];

foreach ($tables_sql as $sql) {
  if ($conn->query($sql) === TRUE) {
    echo "Table checked/created successfully<br>";
  } else {
    echo "Error creating table: " . $conn->error;
  }
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["licenseFile"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["licenseFile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "txt") {
    echo "Sorry, only TXT files are allowed.";
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["licenseFile"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["licenseFile"]["name"])). " has been uploaded.";

      // Assuming $conn is the database connection
      $stmt = $conn->prepare("INSERT INTO licenses (user_id, file_path) VALUES (?, ?)");
      $stmt->bind_param("is", $userId, $target_file); // Assuming $userId is fetched based on session or application logic

      // Execute and check
      if ($stmt->execute()) {
        echo "Record uploaded successfully";
      } else {
        echo "Error: " . $stmt->error;
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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Board Games Digital Marketing Services Site</title>
<style>
    body { background-color: #FFC0CB; }
    .container { text-align: center; margin-top: 50px; }
    form { display: inline-block; }
</style>
</head>
<body>

<div class="container">
    <h2>Upload License File</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="licenseFile" id="licenseFile" required>
        <input type="submit" value="Upload License" name="submit">
    </form>
</div>

</body>
</html>