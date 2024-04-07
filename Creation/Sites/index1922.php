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

// Create submission table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS code_review_submissions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  code TEXT NOT NULL,
  submitted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table 'code_review_submissions' created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["sourceCode"])) {
  $filename = $_FILES["sourceCode"]["name"];
  $code = file_get_contents($_FILES["sourceCode"]["tmp_name"]);

  $stmt = $conn->prepare("INSERT INTO code_review_submissions (filename, code) VALUES (?, ?)");
  $stmt->bind_param("ss", $filename, $code);

  if ($stmt->execute()) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Code Review Upload</title>
</head>
<body>
  <h2>Upload Source Code for Review</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="sourceCode" id="sourceCode">
    <input type="submit" value="Upload Code" name="submit">
  </form>
</body>
</html>
