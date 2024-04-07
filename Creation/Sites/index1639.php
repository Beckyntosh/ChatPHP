<?php
// Set database connection
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

// Create table for code uploads if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(255) NOT NULL,
  code LONGTEXT NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $featureName = $_POST['featureName'];
  $code = file_get_contents($_FILES['sourceCode']['tmp_name']);

  $stmt = $conn->prepare("INSERT INTO code_reviews (feature_name, code) VALUES (?, ?)");
  $stmt->bind_param("ss", $featureName, $code);
  
  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Source Code Upload for Review</title>
</head>
<body>
  <h2>Upload Source Code for Feature Review</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Feature Name: <input type="text" name="featureName" required>
    <br><br>
    Source Code: <input type="file" name="sourceCode" accept=".php,.html,.js,.css" required>
    <br><br>
    <input type="submit" value="Upload Code">
  </form>
</body>
</html>
