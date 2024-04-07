<?php
// Simple music instruments website code upload and review system
// Warning: This example is for educational purposes. 
// Please ensure to add proper security measures and validations for production use.

// Database configuration
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
  feature_name VARCHAR(50) NOT NULL,
  code_text TEXT NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['feature_name'])) {
  $featureName = $_POST['feature_name'];
  $codeText = $_POST['code_text'];

  $sql = "INSERT INTO code_reviews (feature_name, code_text) VALUES ('$featureName', '$codeText')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Music Instruments - Code Review System</title>
</head>
<body>
<h2>Feature Code Upload for Review</h2>
<form action="" method="post">
  Feature Name:<br>
  <input type="text" name="feature_name">
  <br>
  Feature Code (Paste your code here):<br>
  <textarea name="code_text" rows="10" cols="30"></textarea>
  <br><br>
  <input type="submit" value="Upload">
</form>

<h2>Code Reviews</h2>
<?php
$sql = "SELECT id, feature_name, code_text, upload_time FROM code_reviews ORDER BY upload_time DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>Feature:</strong> " . $row["feature_name"]. " - <strong>Review Time:</strong> " . $row["upload_time"]. "<br><pre>" . htmlentities($row["code_text"]). "</pre></p>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>
</body>
</html>
