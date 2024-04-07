<?php
// Connect to the database
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if it doesn't exist
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    document_name VARCHAR(255) NOT NULL,
    document_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
if (!$conn->query($tableCreationQuery)) {
  die("Error creating table: " . $conn->error);
}

$message = '';

// Upload document
if (isset($_FILES['document']) && $_FILES['document']['error'] == 0) {
  $allowedMimeTypes = ['image/jpeg', 'image/png', 'application/pdf'];
  if (in_array($_FILES['document']['type'], $allowedMimeTypes)) {
    $filePath = 'uploads/' . basename($_FILES['document']['name']);
    if (move_uploaded_file($_FILES['document']['tmp_name'], $filePath)) {
      // Assuming user_id is passed alongside files, in a real application user_id should be from session or authentication token
      $userId = $_POST['user_id'] ?? 1; // Default to 1 for demonstration
      $documentName = $_FILES['document']['name'];
      $stmt = $conn->prepare("INSERT INTO uploaded_documents (user_id, document_name, document_path) VALUES (?, ?, ?)");
      $stmt->bind_param("iss", $userId, $documentName, $filePath);
      if ($stmt->execute()) {
        $message = 'Document uploaded successfully!';
      } else {
        $message = 'Failed to save document info in the database.';
      }
    } else {
      $message = 'Failed to upload document.';
    }
  } else {
    $message = 'Invalid file type.';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload Scanned Driver's License</title>
</head>
<body>
    <h2>Upload Scanned Document</h2>
    <p><?php echo $message; ?></p>
    <form method="post" enctype="multipart/form-data">
        <label for="document">Select document to upload (JPG, PNG, PDF):</label>
        <input type="file" name="document" id="document" required>
Assuming user_id will be collected in a real application scenario
        <input type="hidden" name="user_id" value="1"> 
        <input type="submit" value="Upload Document">
    </form>
</body>
</html>

<?php
$conn->close();
?>
