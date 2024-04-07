<?php
// Database Configuration
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('SERVERNAME', 'db');

// Establish database connection
$conn = new mysqli(SERVERNAME, 'root', MYSQL_ROOT_PSWD, MYSQL_DB);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['backupFile'])) {
  $targetDir = "uploads/";
  $fileName = basename($_FILES['backupFile']['name']);
  $targetFilePath = $targetDir . $fileName;
  $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

  // Allow certain file formats
  $allowTypes = array('sql');
  if (in_array($fileType, $allowTypes)) {
    // Upload the file to the server
    if (move_uploaded_file($_FILES['backupFile']['tmp_name'], $targetFilePath)) {
      // Restore the uploaded database file
      $command = "mysql -u root -p" . MYSQL_ROOT_PSWD . " " . MYSQL_DB . " < " . $targetFilePath;
      exec($command, $output, $return);
      if ($return == 0) {
        echo "<p>Database backup restored successfully.</p>";
      } else {
        echo "<p>Error occurred during restoration.</p>";
      }
    } else {
      echo "<p>Error in uploading file.</p>";
    }
  } else {
    echo "<p>Sorry, only SQL files are allowed.</p>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Database Backup Upload</title>
</head>
<body>
  <h2>Upload Database Backup for Restoration</h2>
  <form action="" method="post" enctype="multipart/form-data">
    <label for="backupFile">Select Backup File:</label>
    <input type="file" name="backupFile" id="backupFile" required>
    <button type="submit" name="uploadButton">Upload</button>
  </form>
</body>
</html>